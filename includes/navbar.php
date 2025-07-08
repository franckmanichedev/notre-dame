<?php
    $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1);
?>

<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
        <span></span>
        <span></span>
        <span></span>
        </div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- ***** Pre HEader ***** -->
<div class="pre-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <span>Hey! The Show is Starting in 15 Days.</span>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="text-button">
                    <a href="rent-venue.php">Contact Us Now! <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo"><img src="assets/images/logo/logo.png" alt="parish-logo"></em></a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="index.php" class="parent <?= $page == "index.php" ? "active":"";?>">Accueil</a></li>
                        <li class="nav-item dropdown">
                            <a href="announcements.php" class="parent <?= $page == "announcements.php" ? "active":"";?> nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">A propos</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="stories.php" class="<?= $page == "stories.php" ? "active":"";?>">Historique</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="announcements.php" class="<?= $page == "announcements.php" ? "active":"";?>">Annonces</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="rent-venue.php" class="<?= $page == "rent-venue.php" ? "active":"";?>">Notre communauté</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="about.php" class="parent <?= $page == "about.php" ? "active":"";?>">Evénements</a></li> 
                        <li><a href="tickets.php" class="parent <?= $page == "tickets.php" ? "active":"";?>">Annonces</a></li> 
                        <li><a href="ticket-details.php" class="parent <?= $page == "ticket-details.php" ? "active":"";?>">Coin de vente</a></li>
                        <?php
                            if(isset($_SESSION['auth'])){
                        ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle parent" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?= $_SESSION['auth_user']['username']; ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../my-order.php">Mes Commandes</a></li>
                                    <li><a class="dropdown-item" href="../logout.php">Se deconnecter</a></li>
                                    <?php 
                                        if($_SESSION['role'] == 1){
                                            ?> 
                                                <li><a class="dropdown-item" href="admin/index.php">Dashboard</a></li>
                                            <?php
                                        }
                                    ?>
                                </ul>
                            </li>
                        <?php 
                            } else {
                        ?>
                            <li><a href="register.php" class="<?= $page == "register.php" ? "active":"";?>">S'inscrire</a></li>
                        <?php
                            }
                        ?>
                    </ul>        
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>

<!-- ***** Header Area End ***** -->