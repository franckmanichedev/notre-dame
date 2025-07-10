<?php
    include("../../config/dbconfig.php");
    include("../../middleware/adminMiddleware.php");

    header('Content-Type: application/json');

    $response = [
        'status' => 500,
        'message' => 'Erreur inconnue'
    ];

    if(isset($_POST['id'])) {
        $massId = intval($_POST['id']);
        
        try {
            // Vérifier d'abord si la messe existe
            $check_query = $con->prepare("SELECT id FROM messe WHERE id=?");
            $check_query->bind_param("i", $massId);
            $check_query->execute();
            $result = $check_query->get_result();
            
            if($result->num_rows === 0) {
                $response = [
                    'status' => 404,
                    'message' => 'Messe non trouvée'
                ];
            } else {
                // Supprimer de la base
                $delete_query = $con->prepare("DELETE FROM messe WHERE id=?");
                $delete_query->bind_param("i", $massId);
                
                if($delete_query->execute()) {
                    logAction('DELETE_MASS', "ID: $massId", $_SESSION['auth_user']['user_id']);
                    $response = [
                        'status' => 200,
                        'message' => 'Messe supprimée avec succès'
                    ];
                } else {
                    $response = [
                        'status' => 500,
                        'message' => 'Erreur lors de la suppression'
                    ];
                }
            }
        } catch(Exception $e) {
            $response = [
                'status' => 500,
                'message' => 'Erreur: ' . $e->getMessage()
            ];
        }
    } else {
        $response = [
            'status' => 400,
            'message' => 'ID manquant'
        ];
    }

    echo json_encode($response);
?>