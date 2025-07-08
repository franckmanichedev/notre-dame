<?php
    $servername = "localhost";
    $dbname = "notre-dame";
    $username = "root";
    $password = "";

    $con = new MySqli ($servername,$username,$password,$dbname);
    if($con->connect_error ){
        die("ERREUR: Oops, il y'a eu une erreur de connexion." .$conn->connect_error);
    } else {
        // echo "Connecion db reussit";
    }
?>