<?php

    session_start();
    include("../config/dbconfig.php");
    include("../functions/myfunctions.php");

    // Ajoutez en tête de code.php
    function logAction($action, $details) {
        $log = date('[Y-m-d H:i:s]') . " - $action - $details\n";
        file_put_contents('../logs/actions.log', $log, FILE_APPEND);
    }

    // Exemple d'utilisation
    logAction("ADD_ANNOUNCE", "Nouvelle annonce: ".$_POST['libelle']);
    logAction('DELETE_ANNOUNCE', "ID: $announce_id, User: ".$_SESSION['auth_user']['user_id']);

    // Announces part
    if (isset($_POST['add_announce_btn'])){
        $libelle = $con->real_escape_string(($_POST["libelle"]));
        $date_announce = $con->real_escape_string(($_POST["date_announce"]));
        $author = $_SESSION['auth_user']['user_id'];

        $document = $_FILES['content']['name'];
        $path = "../uploads";
        
        $document_ext = strtolower(pathinfo($document, PATHINFO_EXTENSION));
        if($document_ext != 'pdf'){
            redirect("add-announce.php", "Seuls les fichiers PDF sont accepté");
        } else {
            $filename = time().".".$document_ext;

            // Préparez la requête pour insérer une nouvelle catégorie
            $announce_query = $con->prepare("INSERT INTO announce (libelle, content, author_id, from_date) VALUES(?, ?, ?, ?)");
            $announce_query->bind_param("ssss", $libelle, $filename, $author, $date_announce);
            
            // Vérifiez si l'insertion dans la base de données a réussi
            if($announce_query->execute()){
                // Verifier si le fichier est charge avec success
                if(move_uploaded_file($_FILES['content']['tmp_name'], $path ."/". $filename)){
                    redirect("announce.php", "Announce ajoute avec succes !");
                } else {
                    // Affichez des erreurs détaillées
                    $error_message = "Erreur lors du telechargement du fichier !";
                    switch ($_FILES['content']['error']) {
                        case UPLOAD_ERR_INI_SIZE:
                            $error_message .= " Le fichier téléchargé est trop lourd 2Mo maximum";
                            break;
                        case UPLOAD_ERR_FORM_SIZE:
                            $error_message .= " Le fichier téléchargé dépasse la directive (2Mo maximum)";
                            break;
                        case UPLOAD_ERR_PARTIAL:
                            $error_message .= " Le fichier n'a été que partiellement téléchargé.";
                            break;
                        case UPLOAD_ERR_NO_FILE:
                            $error_message .= " Aucun fichier n'a été téléchargé.";
                            break;
                        case UPLOAD_ERR_NO_TMP_DIR:
                            $error_message .= " Il manque un dossier temporaire.";
                            break;
                        case UPLOAD_ERR_CANT_WRITE:
                            $error_message .= " Échec de l'écriture du fichier sur le disque.";
                            break;
                        case UPLOAD_ERR_EXTENSION:
                            $error_message .= " Une extension PHP a arrêté le téléchargement du fichier.";
                            break;
                        default:
                            $error_message .= " Erreur inconnue.";
                            break;
                    }
                    redirect("announce.php",$error_message);
                }
            } else {
                redirect("announce.php", "Erreur d'ajout d ela Announce !" . $announce_query->error);
            }
            $announce_query->close();
        }
    } else if(isset($_POST['update_announce_btn'])){
        $announce_id = $_POST['announce_id'];
        $libelle = $con->real_escape_string(($_POST["libelle"]));
        $date_announce = $con->real_escape_string(($_POST["date_announce"]));

        $new_document = $_FILES['document']['name'];
        $old_document = $_POST['old_document'];
        
        $path = "../uploads";

        if($new_document != ""){
            $update_filename = time().".".strtolower(pathinfo($new_document, PATHINFO_EXTENSION));
            // Validation du PDF
            if(strtolower(pathinfo($new_document, PATHINFO_EXTENSION)) != 'pdf'){
                redirect("edit-announce.php?id=$announce_id", "Seuls les fichiers PDF sont acceptés");
            }
        } else {
            $update_filename = $old_document;
        }

        $update_query = $con->prepare("UPDATE announce SET libelle=?, content=?, from_date=? WHERE id=?");
        $update_query->bind_param("sssi", $libelle, $update_filename, $date_announce, $announce_id);
        
        if($update_query->execute()){
            if($new_document != ""){
                if(move_uploaded_file($_FILES['document']['tmp_name'], $path."/".$update_filename)){
                    if(file_exists('../uploads/'.$old_document)){
                        unlink('../uploads/'.$old_document);
                    }
                }
            }
            redirect("announce.php", "Annonce mise à jour avec succès !");
        } else {
            redirect("edit-announce.php?id=$announce_id", "Erreur: ".$update_query->error);
        }
        $update_query->close();
    } else if(isset($_POST['delete_announce_btn'])){
        $announce_id = $_POST['announce_id'];
        
        // Initialiser la réponse JSON
        $response = [
            'status' => 0,
            'message' => ''
        ];

        try {
            // Récupérer les infos de l'annonce
            $announce_query = $con->prepare("SELECT content FROM announce WHERE id=?");
            $announce_query->bind_param("i", $announce_id);
            $announce_query->execute();
            $result = $announce_query->get_result();
            
            if($result->num_rows > 0) {
                // Vérifiez si l'annonce est utilisée ailleurs avant suppression
                $check_query = $con->prepare("SELECT COUNT(*) FROM announce WHERE announce_id=?");
                $check_query->bind_param("i", $announce_id);
                $check_query->execute();
                $count = $check_query->get_result()->fetch_row()[0];

                if($count > 0) {
                    $response = [
                        'status' => 409,
                        'message' => 'Cette annonce est utilisée par des utilisateur et ne peut être supprimée'
                    ];
                } else {
                    $announce_data = $result->fetch_assoc();
                    $document = $announce_data['content'];

                    // Supprimer de la base
                    $delete_query = $con->prepare("DELETE FROM announce WHERE id=?");
                    $delete_query->bind_param("i", $announce_id);
                    
                    if($delete_query->execute()) {
                        // Supprimer le fichier PDF si existe
                        if(!empty($document) && file_exists('../uploads/'.$document)) {
                            unlink('../uploads/'.$document);
                        }
                        
                        $response = [
                            'status' => 200,
                            'message' => 'Annonce supprimée avec succès'
                        ];
                    } else {
                        $response = [
                            'status' => 500,
                            'message' => 'Erreur lors de la suppression en base de données'
                        ];
                    }
                }
            } else {
                $response = [
                    'status' => 404,
                    'message' => 'Annonce non trouvée'
                ];
            }
        } catch(Exception $e) {
            $response = [
                'status' => 500,
                'message' => 'Erreur serveur: ' . $e->getMessage()
            ];
        }
        
        // Retourner la réponse JSON
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    } else {
        header("Location: index.php");
    }
?>