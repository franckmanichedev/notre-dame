<?php

include("config/dbconfig.php");

// Fonction pour recuperer tout les elements dans une table quelquonque de la base de donnee
if (!function_exists('getAll')){
    function getAll($table){
        global $con;
        $query = "SELECT * FROM $table";
        $query_run = mysqli_query($con, $query);
        return $query_run;
    }
}

?>