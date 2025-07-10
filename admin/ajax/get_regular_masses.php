<?php

    require_once __DIR__.'/../../config/dbconfig.php';
    require_once __DIR__.'/../../middleware/adminMiddleware.php';

    header('Content-Type: text/html');

    error_log("Accès à ".basename(__FILE__)." depuis ".$_SERVER['REMOTE_ADDR']);

    // Debug
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $query = "SELECT id, `type`, day_of_week, `time`, notes, occasion FROM messe WHERE `type` = 'regular' ORDER BY day_of_week, `time`";
    $result = mysqli_query($con, $query);

    if(!$result) {
        echo '<tr><td colspan="4" class="text-center">Erreur SQL: '.mysqli_error($con).'</td></tr>';
        exit();
    }
    
    if(mysqli_num_rows($result) > 0) {
        while($mass = mysqli_fetch_assoc($result)) {
            $day_name = getDayName($mass['day_of_week']);
            echo '
            <tr>
                <td>'.ucfirst($day_name).' à '.substr($mass['time'], 0, 5).'</td>
                <td>Messe hebdomadaire</td>
                <td>'.htmlspecialchars($mass['type']).'</td>
                <td>
                    <button class="btn btn-sm btn-primary edit-mass" data-id="'.$mass['id'].'">
                        <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger delete-mass" data-id="'.$mass['id'].'">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>';
        }
    } else {
        echo '<tr><td colspan="4" class="text-center">Aucune messe régulière programmée</td></tr>';
    }

    // Fonction pour obtenir le nom du jour
    function getDayName($day_number) {
        $days = [
            1 => 'lundi',
            2 => 'mardi',
            3 => 'mercredi',
            4 => 'jeudi',
            5 => 'vendredi',
            6 => 'samedi',
            7 => 'dimanche'
        ];
        return $days[$day_number] ?? '';
    }
?>