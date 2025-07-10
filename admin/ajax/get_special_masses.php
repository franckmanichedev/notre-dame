<?php
    require_once __DIR__.'/../../config/dbconfig.php';
    require_once __DIR__.'/../../middleware/adminMiddleware.php';

    header('Content-Type: text/html');

    error_log("Accès à ".basename(__FILE__)." depuis ".$_SERVER['REMOTE_ADDR']);
    
    // Debug
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $query = "SELECT id, `date`, `time`, occasion, notes FROM messe WHERE `type` = 'special' ORDER BY `date`, `time`";
    $result = mysqli_query($con, $query);

    if(!$result) {
        echo '<tr><td colspan="4" class="text-center">Erreur SQL: '.mysqli_error($con).'</td></tr>';
        exit();
    }

    if(mysqli_num_rows($result) > 0) {
        while($mass = mysqli_fetch_assoc($result)) {
            $date = new DateTime($mass['date']);
            echo '
            <tr>
                <td>'.$date->format('d/m/Y').'</td>
                <td>'.substr($mass['time'], 0, 5).'</td>
                <td>'.$mass['occasion'].'</td>
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
        echo '<tr><td colspan="4" class="text-center">Aucune messe spéciale programmée</td></tr>';
    }
?>