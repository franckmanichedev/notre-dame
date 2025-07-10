<?php 
    if (session_status() === PHP_SESSION_NONE) session_start();
    $base_path = 'http://'.$_SERVER['HTTP_HOST'].'/NOTRE-DAME/admin/';
?>
<script>
    const BASE_PATH = '<?php echo $base_path; ?>';
</script>

<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
        <link rel="icon" type="image/png" href="../assets/fonts/nucleo-icons.svg">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>PHP_Name</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

        <!--     Fonts and icons     -->
        <link href="../../bootstrap-icons-1.11.0/bootstrap-icons.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome.css">

        <!-- CSS Files -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- CSS -->
        <link href="assets/css/demo.css" rel="stylesheet" />
        <link rel="stylesheet" href="assets/css/styles.css" />
        <link href="assets/css/material-dashboard.css" rel="stylesheet" />
        <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet" />

        <!-- FullCalendar CSS -->
        <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.18/main.min.css' rel='stylesheet' />
        <!-- Localisation française -->
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.18/locales/fr.global.min.js'></script>
        <!-- CALENDAR JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.18/index.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.18/index.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.18/index.global.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.18/index.global.min.js"></script>
        <script>
            const BASE_URL = '<?= "http://".$_SERVER['HTTP_HOST']."/"; ?>';
        </script>
        
        <!-- ALERTIFY CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/themes/bootstrap.min.css" />
        <style>
            .form-control, .form-select{
                padding: 8px 10px;
            }
        </style>

        <!-- JQuery -->
        <script src="assets/js/jquery-3.7.1.min.js"></script>
    </head>

    <body>
        <div class="wrapper">

            <?php include 'asidebar.php'; ?>

            <div class="main-panel">

                <?php include 'navbar.php'; ?>