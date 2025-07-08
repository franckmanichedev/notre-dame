
        <!-- *** Subscribe *** -->
        <div class="subscribe">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Restez informé(e) s:</h4>
                        <form id="subscribe" action="" method="get">
                            <div class="row">
                            <div class="col-lg-9">
                                <fieldset>
                                <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Votre adresse email" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-3">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="main-dark-button">Submit</button>
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

        <!-- *** Footer *** -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="address">
                            <h4>Sunny Hill Festival Address</h4>
                            <span>5 College St NW, <br>Norcross, GA 30071<br>United States</span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="links">
                            <h4>Useful Links</h4>
                            <ul>
                                <li><a href="index.php" class="active">Accueil</a></li>
                                <li><a href="about.php">A propos</a></li>
                                <li><a href="rent-venue.php">Notre communauté</a></li>
                                <li><a href="announcements.php">Evénements</a></li> 
                                <li><a href="tickets.php">Annonces</a></li> 
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="hours">
                            <h4>Open Hours</h4>
                            <ul>
                                <li>Mon to Fri: 10:00 AM to 8:00 PM</li>
                                <li>Sat - Sun: 11:00 AM to 4:00 PM</li>
                                <li>Holidays: Closed</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="sub-footer">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="logo"><img src="assets/images/logo/logo.png" alt="parish-logo"></div>
                                </div>
                                <div class="col-lg-6 align-content-center">
                                    <p class="text-center text-white">Tout droit reserve &copy; 2025 By <a href="#" class="text-white" target="_blank" rel="noopener noreferrer">Skills For Modernity</a></p>
                                </div>
                                <div class="col-lg-3">
                                    <div class="social-links">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- jQuery -->
        <script src="assets/js/jquery-2.1.0.min.js"></script>

        <!-- Bootstrap -->
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>

        <!-- Plugins -->
        <script src="assets/js/scrollreveal.min.js"></script>
        <script src="assets/js/waypoints.min.js"></script>
        <script src="assets/js/jquery.counterup.min.js"></script>
        <script src="assets/js/imgfix.min.js"></script> 
        <script src="assets/js/mixitup.js"></script> 
        <script src="assets/js/accordions.js"></script>
        <script src="assets/js/owl-carousel.js"></script>
        
        <!-- Global Init -->
        <script src="assets/js/custom.js"></script>
        <script src="assets/js/aelf.api.js"></script>

        <!-- ALERTIFY -->
        <script src="assets/js/alertify.min.js"></script>
        <script>
            <?php 
                if(isset($_SESSION['message'])){
                    ?>
                        alertify.set('notifier','position', 'top-right');
                        alertify.success('<?= addslashes($_SESSION['message']); ?>');
                    <?php
                    unset($_SESSION['message']);
                }
            ?>
        </script>
    </body>
</html>