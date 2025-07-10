<?php    session_start();
    include("../config/dbconfig.php");
    include("../functions/myfunctions.php");

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    function logAction($action, $details, $userId) {
        $logDir = dirname(__FILE__) . '/../logs/';
        if (!file_exists($logDir)) {
            mkdir($logDir, 0755, true);
        }
        
        $logFile = $logDir . 'actions.log';
        $logMessage = date('[Y-m-d H:i:s]') . " | USER:$userId | $action | $details\n";
        
        // Vérifier si le fichier est accessible en écriture
        if (file_exists($logFile) && !is_writable($logFile)) {
            chmod($logFile, 0644);
        }
        
        file_put_contents($logFile, $logMessage, FILE_APPEND | LOCK_EX);
    }

    // Announces part
    if (isset($_POST['add_announce_btn'])){
        header('Content-Type: application/json');
        // Initialiser la réponse JSON
        $response = [
            'status' => 0,
            'message' => ''
        ];

        // Récupération des données
        $libelle = $con->real_escape_string(($_POST["libelle"]));
        $date_announce = $con->real_escape_string(($_POST["date_announce"]));
        $author = $_SESSION['auth_user']['user_id'];
        $document = $_FILES['content']['name'] ?? '';
        $path = "../uploads";

        // Validation des données
        if (empty($libelle)) {
            $response['errors']['libelle'] = "L'intitulé est requis";
        }
        if (empty($date_announce)) {
            $response['errors']['date_announce'] = "La date est requise";
        }
        if (empty($document)) {
            $response['errors']['content'] = "Veuillez sélectionner un fichier";
        }

        // Si des erreurs, retourner immédiatement
        if (!empty($response['errors'])) {
            $response['status'] = 400;
            $response['message'] = "Validation failed";
            echo json_encode($response);
            exit();
        }
        
        // Vérification de l'extension du fichier
        $document_ext = strtolower(pathinfo($document, PATHINFO_EXTENSION));
        if ($document_ext != 'pdf') {
            $response['status'] = 415;
            $response['errors']['content'] = "Seuls les fichiers PDF sont acceptés";
            echo json_encode($response);
            exit();
        } 
        try {
            $filename = time().".".$document_ext;

            // Préparez la requête pour insérer une nouvelle catégorie
            $announce_query = $con->prepare("INSERT INTO announce (libelle, content, author_id, from_date) VALUES(?, ?, ?, ?)");
            $announce_query->bind_param("ssss", $libelle, $filename, $author, $date_announce);
            
            // Vérifiez si l'insertion dans la base de données a réussi
            if($announce_query->execute()){
                $newId = $con->insert_id;
                if (move_uploaded_file($_FILES['content']['tmp_name'], $path . "/" . $filename)) {
                    logAction('ADD_ANNOUNCE', "ID: " . $newId, $_SESSION['auth_user']['user_id']);
                    $response['status'] = 201;
                    $response['message'] = "Annonce ajoutée avec succès";
                    $response['redirect'] = "announce.php";
                } else {
                    $response['status'] = 500;
                    $response['message'] = "Erreur lors du téléchargement du fichier";
                }
                    } else {
                $response['status'] = 500;
                $response['message'] = "Erreur d'ajout: " . $announce_query->error;
            }
        } catch (Exception $e) {
            $response['status'] = 500;
            $response['message'] = "Erreur serveur: " . $e->getMessage();
        }

        // Retourner la réponse JSON
        echo json_encode($response);
        exit();
    } else if(isset($_POST['update_announce_btn'])){
        header('Content-Type: application/json');
        // Initialisation de la réponse
        $response = [
            'status' => 0,
            'message' => '',
            'errors' => []
        ];

        // Récupération des données
        if(!isset($_POST['announce_id']) || empty($_POST['announce_id'])){
            $response['status'] = 400;
            $response['message'] = "ID de l'annonce manquant";
            echo json_encode($response);
            exit();
        }
        $announce_id = $_POST['announce_id'];
        $libelle = $con->real_escape_string(($_POST["libelle"]));
        $date_announce = $con->real_escape_string(($_POST["date_announce"]));
        $new_document = $_FILES['document']['name'];
        $old_document = $_POST['old_document'];
        $path = "../uploads";

        // Validation des données
        if(!empty($response['errors'])){
            $response['status'] = 400;
            $response['message'] = "Validation failed";
            echo json_encode($response);
            exit();
        }

        // Gestion du fichier
        $update_filename = $old_document;
        if (!empty($new_document)) {
            $document_ext = strtolower(pathinfo($new_document, PATHINFO_EXTENSION));
            if ($document_ext != 'pdf') {
                $response['status'] = 415;
                $response['errors']['document'] = "Seuls les fichiers PDF sont acceptés";
                echo json_encode($response);
                exit();
            }
            $update_filename = time() . ".$document_ext";
        }
        
        // Préparation de la requête de mise à jour
        try {
            $update_query = $con->prepare("UPDATE announce SET libelle=?, content=?, from_date=? WHERE id=?");
            $update_query->bind_param("sssi", $libelle, $update_filename, $date_announce, $announce_id);
            
            if ($update_query->execute()) {
                if (!empty($new_document)) {
                    if (move_uploaded_file($_FILES['document']['tmp_name'], $path . "/" . $update_filename)) {
                        if (file_exists($path . "/" . $old_document)) {
                            unlink($path . "/" . $old_document);
                        }
                    }
                }
                logAction('UPDATE_ANNOUNCE', "ID: $announce_id", $_SESSION['auth_user']['user_id']);
                $response['status'] = 200;
                $response['message'] = "Annonce mise à jour avec succès";
                $response['redirect'] = "announce.php";
            } else {
                $response['status'] = 500;
                $response['message'] = "Erreur de mise à jour: " . $update_query->error;
            }
        } catch (Exception $e) {
            $response['status'] = 500;
            $response['message'] = "Erreur serveur: " . $e->getMessage();
        }

        // Retourner la réponse JSON
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    } else if(isset($_POST['delete_announce_btn'])){

        header('Content-Type: application/json');
        $response = [
            'status' => 500, 
            'message' => 'Erreur inconnue'
        ];
        $announce_id = $_POST['announce_id'] ?? 0;

        try {
            // Vérifier d'abord si l'annonce existe
            $check_query = $con->prepare("SELECT content FROM announce WHERE id=?");
            $check_query->bind_param("i", $announce_id);
            $check_query->execute();
            $result = $check_query->get_result();
            
            if($result->num_rows === 0) {
                $response = [
                    'status' => 404,
                    'message' => 'Annonce non trouvée'
                ];
            } else if($result->num_rows > 0) {
                $data = $result->fetch_assoc();
                $document = $data['content'];

                // Supprimer de la base
                $delete_query = $con->prepare("DELETE FROM announce WHERE id=?");
                $delete_query->bind_param("i", $announce_id);
                
                if($delete_query->execute()) {
                    // Supprimer le fichier PDF si existe
                    if(!empty($document) && file_exists('../uploads/'.$document)) {
                        unlink('../uploads/'.$document);
                    }
                    
                    logAction('DELETE_ANNOUNCE', "ID: $announce_id", $_SESSION['auth_user']['user_id']);

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
        } catch(Exception $e) {
            $response = [
                'status' => 500,
                'message' => 'Erreur serveur: ' . $e->getMessage()
            ];
        }
        
        // Retourner la réponse JSON
        echo json_encode($response);
        exit();
    } if (isset($_POST['add_mass_btn'])) {
        // Réponse JSON par défaut
        header('Content-Type: application/json');
        $response = [
            'status' => 0,
            'message' => 'Requête non reconnue',
            'errors' => []
        ];
        
        // Récupération et sécurisation des données
        $mass_type = $con->real_escape_string(trim($_POST['mass_type'] ?? ''));
        $notes = $con->real_escape_string(trim($_POST['notes'] ?? ''));
        $author_id = $_SESSION['auth_user']['user_id'];
        
        // Validation des champs communs
        if(empty($mass_type)) {
            $response['errors']['mass_type'] = "Type de messe requis";
        }
        
        // Validation selon le type
        if($mass_type == 'regular') {
            $day_of_week = $con->real_escape_string(trim($_POST['day_of_week'] ?? ''));
            $time = $con->real_escape_string(trim($_POST['time'] ?? ''));
            
            if(empty($day_of_week)) {
                $response['errors']['day_of_week'] = "Jour de la semaine requis";
            }
            if(empty($time)) {
                $response['errors']['time'] = "Heure requise";
            }
        } elseif($mass_type == 'special') {
            $mass_date = $con->real_escape_string(trim($_POST['mass_date'] ?? ''));
            $mass_time = $con->real_escape_string(trim($_POST['mass_time'] ?? ''));
            $occasion = $con->real_escape_string(trim($_POST['occasion'] ?? ''));
            
            if(empty($mass_date)) {
                $response['errors']['mass_date'] = "Date requise";
            }
            if(empty($mass_time)) {
                $response['errors']['mass_time'] = "Heure requise";
            }
            if(empty($occasion)) {
                $response['errors']['occasion'] = "Occasion requise";
            }
        }
        
        // Si erreurs de validation
        if(!empty($response['errors'])) {
            $response['status'] = 400;
            $response['message'] = "Erreurs de validation";
            echo json_encode($response);
            exit();
        }
        
        // Préparation de la requête
        try {
            if($mass_type == 'regular') {
                $query = "INSERT INTO messe 
                        (`type`, day_of_week, `time`, notes, author_id) 
                        VALUES 
                        ('$mass_type', '$day_of_week', '$time', '$notes', '$author_id')";
            } 
            else {
                $query = "INSERT INTO messe 
                        (`type`, `date`, `time`, occasion, notes, author_id) 
                        VALUES 
                        ('$mass_type', '$mass_date', '$mass_time', '$occasion', '$notes', '$author_id')";
            }
            
            // Exécution de la requête
            $result = mysqli_query($con, $query);
            
            if($result) {
                $new_id = mysqli_insert_id($con);
                
                // Log l'action
                logAction('ADD_MASS', "ID: $new_id", $author_id);
                
                $response['status'] = 201;
                $response['message'] = "Messe ajoutée avec succès";
                $response['redirect'] = "mass.php"; // Optionnel
            } 
            else {
                $response['status'] = 500;
                $response['message'] = "Erreur base de données: " . mysqli_error($con);
            }
        } 
        catch(Exception $e) {
            $response['status'] = 500;
            $response['message'] = "Erreur: " . $e->getMessage();
        }
        
        echo json_encode($response);
        exit();
    } else {
        header("Location: index.php");
}?>