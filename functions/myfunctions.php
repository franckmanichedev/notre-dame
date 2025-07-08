<?php
    include __DIR__ . '/../config/dbconfig.php';
    // include("../config/dbconfig.php");

    // Fonction pour recuperer tout les elements dans une table quelquonque de la base de donnee
    if (!function_exists('getAll')){
        function getAll($table){
            global $con;
            $query = "SELECT * FROM $table";
            $query_run = mysqli_query($con, $query);
            return $query_run;
        }
    }

    // Fonction pour recuperer un element en fonction de son id
    if (!function_exists('getById')){
        function getById($table, $id){
            global $con;
            $query = "SELECT * FROM $table WHERE id = ?";
            $stmt = $con->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        }
    }

    // Fonction pour recuperer les textes du jours
    function fetchAelfData($endpoint) {
        $url = "https://api.aelf.org/v1/" . $endpoint;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // à activer si j'ai le bon certificat
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, true);
    }

    // Fonction pour enregistrer les actions dans un fichier log
    if (!function_exists('logAction')){
        function logAction($action, $details) {
            $logDir = '../logs';
            if (!is_dir($logDir)) {
                mkdir($logDir, 0777, true);
            }
            file_put_contents($logDir.'/announce.log', date('[Y-m-d H:i:s]')." - $action - $details\n", FILE_APPEND);
        }
    }

    // Fonction pour rediriger les utilisateur
    if (!function_exists('redirect')){
        function redirect($url, $message){
            $_SESSION['message'] = $message;
            header('Location: ' . $url);
            exit();
        }
    } 
      
?>