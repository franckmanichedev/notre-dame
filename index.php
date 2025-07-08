<?php 
    session_start();
    include("includes/header.php");
?>

        <!-- ***** Main Banner Area Start ***** -->
        <div class="main-banner">
            <div class="counter-content">
                <ul>
                    <li>Heure<span id="hours"></span></li>
                    <li>Minutes<span id="minutes"></span></li>
                    <li>Secondes<span id="seconds"></span></li>
                </ul>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-content">
                            <div class="next-mass">
                                <i class="fa fa-arrow-up"></i>
                                <span>Prochaine messe</span>
                            </div>
                            <h2>Bienvenue à la paroisse<br>Notre Dame du Rosaire de Mabanda</h2>
                            <p style="color: #fff; font-size: 1.2rem; margin-top: 20px;">
                                Une communauté vivante, fraternelle et ouverte à tous.<br>
                                Venez partager la foi, la joie et l’espérance avec nous !
                            </p>
                            <div class="main-white-button">
                                <a href="ticket-details.php" class="main-dark">Découvrir la paroisse</a>
                                <a href="ticket-details.php" class="main-white">Horaires des messes</a>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Main Banner Area End ***** -->

        <!-- ***** Lectures du Jour ***** -->
        <div class="liturgy-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center mb-5">
                        <h2 class="display-5"><i class="fas fa-scroll me-2"></i>Lectures du Jour</h2>
                        <p class="liturgy-date text-muted"><?= date('d F Y') ?></p>
                    </div>
                    
                    <div class="col-lg-10 mx-auto">
                        <!-- Carrousel -->
                        <div id="liturgyCarousel" class="carousel slide" data-bs-ride="carousel">
                            <!-- Indicateurs -->
                            <div class="carousel-indicators liturgy-indicators">
                                <!-- Généré dynamiquement -->
                            </div>
                            
                            <!-- Contenu -->
                            <div class="carousel-inner rounded-4 shadow-lg">
                                <!-- Généré dynamiquement -->
                            </div>
                            
                            <!-- Contrôles -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#liturgyCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon bg-dark rounded-circle p-3"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#liturgyCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon bg-dark rounded-circle p-3"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- *** Amazing Venus ***-->
        <div class="amazing-venues">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <h4 class="text-center">Que voulez-vous ?</h4>
                    <div class="col-lg-12">
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="our-offer row col-lg-6 col-sm-12">
                                <img src="assets/images/about_bg.jpg" class="col-md-3 col-sm-3" alt="">
                                <div class="col-md-9 col-sm-9">
                                    <h5>Accompagnement aux sacrements</h5>
                                    <p>La participation à la nature divine, donnée aux hommes par la grâce du Christ, comporte une certaine analogie avec l’origine, la croissance et le soutien de la vie naturelle...</p>
                                    <a href="#">Details<i class="fa fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                            <div class="our-offer row col-lg-6 col-sm-12">
                                <img src="assets/images/about_bg.jpg" class="col-md-3 col-sm-3" alt="">
                                <div class="col-md-9 col-sm-9">
                                    <h5>Intention de Messe</h5>
                                    <p>Offrir une messe (on dit aussi couramment "demander une messe", ou encore "offrir une intention de messe"), c’est entrer dans la prière de l’Eglise, confier à Dieu les intentions...</p>
                                    <a href="#">Details<i class="fa fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="our-offer row col-lg-6 col-sm-12">
                                <img src="assets/images/about_bg.jpg" class="col-md-3 col-sm-3" alt="">
                                <div class="col-md-9 col-sm-9">
                                    <h5>Publication des bans</h5>
                                    <p>La publication des bans est une procédure ayant pour utilité de rendre publique l'imminence d'un mariage, et ainsi de veiller à ce que toute personne soit à même de s'y opposer...</p>
                                    <a href="#">Details<i class="fa fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                            <div class="our-offer row col-lg-6 col-sm-12">
                                <img src="assets/images/about_bg.jpg" class="col-md-3 col-sm-3" alt="">
                                <div class="col-md-9 col-sm-9">
                                    <h5>Participer à la construction</h5>
                                    <p>Le seigneur a mis dans notre coeur, enfant de Mabanda le meme desire de lui batire une demeure. Datant de plus de dix ans aujourd'hui nous continuons à participer activement à la finalisation de ce projet. </p>
                                    <a href="#">Details<i class="fa fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- *** Map ***-->
        <div class="map-image">
            <img src="assets/images/map-image.jpg" alt="Maps of 3 Venues">
        </div>

<?php include("includes/footer.php") ?>