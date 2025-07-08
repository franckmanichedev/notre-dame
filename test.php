<?php 
    session_start();
    include("includes/header.php");
?>

<!-- ***** Bannière d'accueil ***** -->
<div class="main-banner" style="background: linear-gradient(rgba(0,40,80,0.5),rgba(0,40,80,0.5)), url('assets/images/paroisse-mabanda.jpg') center/cover no-repeat;">
    <div class="container text-center" style="padding: 60px 0;">
        <h1 style="color: #fff; font-weight: 700; font-size: 2.5rem;">Bienvenue à la paroisse<br>Notre Dame du Rosaire de Mabanda</h1>
        <p style="color: #fff; font-size: 1.2rem; margin-top: 20px;">
            Une communauté vivante, fraternelle et ouverte à tous.<br>
            Venez partager la foi, la joie et l’espérance avec nous !
        </p>
        <div class="main-white-button" style="margin-top: 30px;">
            <a href="#decouvrir" style="margin-right: 10px;">Découvrir la paroisse</a>
            <a href="#horaires" class="main-dark-button" style="margin-left: 10px;">Horaires des messes</a>
        </div>
    </div>
</div>

<!-- ***** Section Découvrir ***** -->
<div class="amazing-venues" id="decouvrir">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="left-content">
                    <h2>Qui sommes-nous ?</h2>
                    <p>
                        Fondée dans la foi et l’amour, la paroisse Notre Dame du Rosaire de Mabanda accompagne les fidèles de tous âges dans leur cheminement spirituel.<br>
                        <strong>Notre mission :</strong> accueillir, écouter, célébrer et servir chaque personne, dans la joie de l’Évangile.
                    </p>
                    <ul style="margin-bottom: 1rem;">
                        <li>🕊️ <a href="about.php"><strong>Notre histoire et nos valeurs</strong></a></li>
                        <li>👨‍👩‍👧‍👦 <a href="rent-venue.php"><strong>Vie de la communauté</strong></a></li>
                        <li>🎶 <a href="shows-events.php"><strong>Événements et célébrations</strong></a></li>
                        <li>🤝 <a href="#contact" onclick="window.scrollTo({top:document.body.scrollHeight,behavior:'smooth'});return false;"><strong>Contact & entraide</strong></a></li>
                    </ul>
                    <div class="main-white-button">
                        <a href="shows-events.php">Voir le calendrier paroissial</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <img src="assets/images/eglise-mabanda-accueil.jpg" alt="Église Notre Dame du Rosaire de Mabanda" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</div>

<!-- ***** Section Horaires ***** -->
<div class="venue-tickets" id="horaires" style="background: #f8f9fa;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3>Horaires des messes</h3>
                <ul style="font-size: 1.1em; padding-left: 1em;">
                    <li><strong>Dimanche :</strong> 9h00</li>
                    <li><strong>Mercredi :</strong> 18h00</li>
                    <li><strong>Vendredi :</strong> 18h00</li>
                </ul>
                <p>
                    <i class="fa fa-info-circle"></i> D’autres célébrations et activités sont annoncées chaque semaine.
                </p>
            </div>
            <div class="col-lg-6">
                <h3>Nous rendre visite</h3>
                <p>
                    <i class="fa fa-map-marker"></i> Mabanda, Burundi<br>
                    <a href="show-events-details.php" class="text-button">Besoin d’indications ? <i class="fa fa-arrow-right"></i></a>
                </p>
                <img src="assets/images/map-image.jpg" alt="Carte de la paroisse" class="img-fluid rounded">
            </div>
        </div>
    </div>
</div>

<!-- ***** Section Annonces & Newsletter ***** -->
<div class="subscribe" id="contact">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h4>Restez informé(e) :</h4>
                <form id="subscribe" action="" method="get">
                    <div class="row">
                        <div class="col-lg-8">
                            <fieldset>
                                <input name="email" type="email" id="email" placeholder="Votre adresse email" required="">
                            </fieldset>
                        </div>
                        <div class="col-lg-4">
                            <fieldset>
                                <button type="submit" id="form-submit" class="main-dark-button">S’abonner</button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <h4>Contact rapide :</h4>
                <p>
                    Pour toute question, intention de prière ou demande d’information, <a href="mailto:paroisse.mabanda@email.com">écrivez-nous</a> ou passez nous voir après la messe !
                </p>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>