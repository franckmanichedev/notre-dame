<?php 
    session_start();
    include("includes/header.php");
?>
    <!-- ***** About Us Page ***** -->
    <div class="page-heading-shows-events">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Nos Annonces</h2>
                    <span>Naviguez des annonces les plus récents aux plus anciens</span>
                </div>
            </div>
        </div>
    </div>

    <div class="shows-events-tabs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="tabs">
                        <div class="col-lg-12">
                            <div class="heading-tabs">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <ul>
                                          <li><a href='#tabs-1'>Informations générales</a></li>
                                          <li><a href='#tabs-2'>Informations complémentaire</a></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                          <div class="main-dark-button">
                                              <a href="ticket-details.php">Purchase Tickets</a>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <section class='tabs-content'>
                                <article id='tabs-1'>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="heading"><h2>Informations générales</h2></div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="sidebar">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="heading-sidebar">
                                                            <h4>Trier les annonces selon vos recherche :</h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="month">
                                                            <h6>Mois</h6>
                                                            <ul>
                                                                <li><a href="#" class="active">Juillet</a></li>
                                                                <li><a href="#">Juin</a></li>
                                                                <li><a href="#">Mai</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="category">
                                                            <h6>Categories</h6>
                                                            <ul>
                                                                <li><a href="#">Paroissiale</a></li>
                                                                <li><a href="#">Zonale</a></li>
                                                                <li><a href="#">Diocesaine</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-lg-12">
                                                        <div class="venues">
                                                            <h6>Venues</h6>
                                                            <ul>
                                                                <li><a href="#">Radio City Musical Hall</a></li>
                                                                <li><a href="#">Madison Square Garden</a></li>
                                                                <li><a href="#">Royce Hall</a></li>
                                                            </ul>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="event-item">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="left-content">
                                                                    <h4>Water Splash Festival</h4>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur do adipiscing eliterirt sed eiusmod alori...</p>
                                                                    <div class="main-dark-button"><a href="event-details.php">Discover More</a></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="thumb">
                                                                    <img src="assets/images/event-page-04.jpg" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="right-content">
                                                                    <ul>
                                                                        <li>
                                                                            <i class="fa fa-clock-o"></i>
                                                                            <h6>April 24 Friday<br>12:00 AM - 12:00 PM</h6>
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-map-marker"></i>
                                                                            <span>Copacabana Beach, Rio de Janeiro</span>
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-users"></i>
                                                                            <span>528 Total Guests Attending</span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="event-item">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="left-content">
                                                                    <h4>Sunny Hill Festival</h4>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur do adipiscing eliterirt sed eiusmod alori...</p>
                                                                    <div class="main-dark-button"><a href="event-details.php">Discover More</a></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="thumb">
                                                                    <img src="assets/images/event-page-03.jpg" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="right-content">
                                                                    <ul>
                                                                        <li>
                                                                            <i class="fa fa-clock-o"></i>
                                                                            <h6>May 31 Friday<br>10:00 AM - 11:00 PM</h6>
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-map-marker"></i>
                                                                            <span>Copacabana Beach, Rio de Janeiro</span>
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-users"></i>
                                                                            <span>240 Total Guests Attending</span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="event-item">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="left-content">
                                                                    <h4>New Rock Festival</h4>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur do adipiscing eliterirt sed eiusmod alori...</p>
                                                                    <div class="main-dark-button"><a href="event-details.php">Discover More</a></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="thumb">
                                                                    <img src="assets/images/event-page-02.jpg" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="right-content">
                                                                    <ul>
                                                                        <li>
                                                                            <i class="fa fa-clock-o"></i>
                                                                            <h6>June 12 Friday<br>09:00 AM - 09:00 PM</h6>
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-map-marker"></i>
                                                                            <span>Copacabana Beach, Rio de Janeiro</span>
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-users"></i>
                                                                            <span>360 Total Guests Attending</span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="event-item">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="left-content">
                                                                    <h4>Monkey Dance Festival</h4>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur do adipiscing eliterirt sed eiusmod alori...</p>
                                                                    <div class="main-dark-button"><a href="event-details.php">Discover More</a></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="thumb">
                                                                    <img src="assets/images/event-page-01.jpg" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="right-content">
                                                                    <ul>
                                                                        <li>
                                                                            <i class="fa fa-clock-o"></i>
                                                                            <h6>July 14 Friday<br>08:30 AM - 09:30 PM</h6>
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-map-marker"></i>
                                                                            <span>Copacabana Beach, Rio de Janeiro</span>
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-users"></i>
                                                                            <span>450 Total Guests Attending</span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="pagination">
                                                        <ul>
                                                            <li><a href="#">Prev</a></li>
                                                            <li><a href="#">1</a></li>
                                                            <li class="active"><a href="#">2</a></li>
                                                            <li><a href="#">3</a></li>
                                                            <li><a href="#">Next</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>                            
                                <article id='tabs-2'>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="heading"><h2>Informations générales</h2></div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="sidebar">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="heading-sidebar">
                                                            <h4>Trier les annonces selon vos recherche :</h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="month">
                                                            <h6>Mois</h6>
                                                            <ul>
                                                                <li><a href="#">Juillet</a></li>
                                                                <li><a href="#">Juin</a></li>
                                                                <li><a href="#">Mai</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="category">
                                                            <h6>Categories</h6>
                                                            <ul>
                                                                <li><a href="#">Paroissiale</a></li>
                                                                <li><a href="#">Zonale</a></li>
                                                                <li><a href="#">Diocesaine</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-lg-12">
                                                        <div class="venues">
                                                            <h6>Venues</h6>
                                                            <ul>
                                                                <li><a href="#">Radio City Musical Hall</a></li>
                                                                <li><a href="#">Madison Square Garden</a></li>
                                                                <li><a href="#">Royce Hall</a></li>
                                                            </ul>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="event-item">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="left-content">
                                                                    <h4>Water Splash Festival</h4>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur do adipiscing eliterirt sed eiusmod alori...</p>
                                                                    <div class="main-dark-button"><a href="event-details.php">Discover More</a></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="thumb">
                                                                    <img src="assets/images/event-page-04.jpg" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="right-content">
                                                                    <ul>
                                                                        <li>
                                                                            <i class="fa fa-clock-o"></i>
                                                                            <h6>April 24 Friday<br>12:00 AM - 12:00 PM</h6>
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-map-marker"></i>
                                                                            <span>Copacabana Beach, Rio de Janeiro</span>
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-users"></i>
                                                                            <span>528 Total Guests Attending</span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="event-item">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="left-content">
                                                                    <h4>Sunny Hill Festival</h4>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur do adipiscing eliterirt sed eiusmod alori...</p>
                                                                    <div class="main-dark-button"><a href="event-details.php">Discover More</a></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="thumb">
                                                                    <img src="assets/images/event-page-03.jpg" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="right-content">
                                                                    <ul>
                                                                        <li>
                                                                            <i class="fa fa-clock-o"></i>
                                                                            <h6>May 31 Friday<br>10:00 AM - 11:00 PM</h6>
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-map-marker"></i>
                                                                            <span>Copacabana Beach, Rio de Janeiro</span>
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-users"></i>
                                                                            <span>240 Total Guests Attending</span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="event-item">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="left-content">
                                                                    <h4>New Rock Festival</h4>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur do adipiscing eliterirt sed eiusmod alori...</p>
                                                                    <div class="main-dark-button"><a href="event-details.php">Discover More</a></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="thumb">
                                                                    <img src="assets/images/event-page-02.jpg" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="right-content">
                                                                    <ul>
                                                                        <li>
                                                                            <i class="fa fa-clock-o"></i>
                                                                            <h6>June 12 Friday<br>09:00 AM - 09:00 PM</h6>
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-map-marker"></i>
                                                                            <span>Copacabana Beach, Rio de Janeiro</span>
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-users"></i>
                                                                            <span>360 Total Guests Attending</span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="event-item">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="left-content">
                                                                    <h4>Monkey Dance Festival</h4>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur do adipiscing eliterirt sed eiusmod alori...</p>
                                                                    <div class="main-dark-button"><a href="event-details.php">Discover More</a></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="thumb">
                                                                    <img src="assets/images/event-page-01.jpg" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="right-content">
                                                                    <ul>
                                                                        <li>
                                                                            <i class="fa fa-clock-o"></i>
                                                                            <h6>July 14 Friday<br>08:30 AM - 09:30 PM</h6>
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-map-marker"></i>
                                                                            <span>Copacabana Beach, Rio de Janeiro</span>
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-users"></i>
                                                                            <span>450 Total Guests Attending</span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="pagination">
                                                        <ul>
                                                            <li><a href="#">Prev</a></li>
                                                            <li><a href="#">1</a></li>
                                                            <li class="active"><a href="#">2</a></li>
                                                            <li><a href="#">3</a></li>
                                                            <li><a href="#">Next</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>    
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include("includes/footer.php") ?>