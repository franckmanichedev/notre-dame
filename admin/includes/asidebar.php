<?php

    $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1);

?>

<div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="" class="simple-text">
                ZONE TRAVEL
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item <?= $page == "index.php" ? "active":"";?>">
                <a class="nav-link" href="index.php"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                    <i class="fa fa-home"></i>
                    <p>Tableau de bord</p>
                </a>
            </li>
            <li class="nav-item <?= $page == "announce.php" ? "active":"";?>">
                <a class="nav-link" href="announce.php">
                    <i class="fa fa-newspaper-o"></i>
                    <p>Annonces</p>
                </a>
            </li>
            <li class="nav-item <?= $page == "mass.php" ? "active":"";?>">
                <a class="nav-link" href="mass.php">
                    <i class="fa fa-calendar"></i>
                    <p>Messes</p>
                </a>
            </li>
            <li class="nav-item <?= $page == "add-product.php" ? "active":"";?>">
                <a class="nav-link" href="add-product.php">
                    <i class="fa fa-search"></i>
                    <p>Evenements</p>
                </a>
            </li>
            <li class="nav-item <?= $page == "product.php" ? "active":"";?>">
                <a class="nav-link" href="product.php">
                    <i class="fa fa-handshake-o"></i>
                    <p>Communaute</p>
                </a>
            </li>
            <li class="nav-item <?= $page == "product.php" ? "active":"";?>">
                <a class="nav-link" href="product.php">
                    <i class="fa fa-cart-plus"></i>
                    <p>Boutique</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../index.php">
                    <i class="fa fa-globe"></i>
                    <p>Site web</p>
                </a>
            </li>
            <li class="nav-item active active-pro">
                <a class="nav-link active" href="../logout.php">
                    <i class="fa fa-sign-out"></i>
                    <p>Se deconnecter</p>
                </a>
            </li>
        </ul>
    </div>
</div>