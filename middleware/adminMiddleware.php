<?php
    if (session_status() === PHP_SESSION_NONE) session_start();
    include_once(__DIR__ . '/../functions/myfunctions.php');

    if(isset($_SESSION["auth"])){
        if($_SESSION['role'] == 0){
            redirect("../../index.php", "Vous n'etes pas autorise a avoir acces a cette page");
        }
    }else{
        redirect("/login.php", "Connectez-vous pour continuer");
    }

?>