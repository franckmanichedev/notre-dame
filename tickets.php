<?php 
    session_start();
    include("includes/header.php");
?>

    <!-- ***** About Us Page ***** -->
    <div class="page-heading-shows-events">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Tickets On Sale Now!</h2>
                    <span>Check out upcoming and past shows & events and grab your ticket right now.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="tickets-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="search-box">
                        <form id="subscribe" action="" method="get">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="search-heading">
                                        <h4>Sort The Upcoming Shows & Events By:</h4>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <select value="month">
                                                <option value="month">Month</option>
                                                <option name="June" id="June">June</option>
                                                <option name="July" id="July">July</option>
                                                <option name="August" id="August">August</option>
                                                <option name="September" id="September">September</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <select value="location">
                                                <option value="location">Location</option>
                                                <option name="Brazil" id="Brazil">Brazil</option>
                                                <option name="Europe" id="Europe">Europe</option>
                                                <option name="US" id="US">US</option>
                                                <option name="Asia" id="Asia">Asia</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <select value="month">
                                                <option value="month">Price</option>
                                                <option name="min" id="min">$0 - $50</option>
                                                <option name="standard" id="standard">$50 - $100</option>
                                                <option name="hight" id="hight">$100 - $200</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <fieldset>
                                            <button type="submit" id="form-submit" class="main-dark-button">Submit</button>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="heading">
                        <h2>Tickets Page</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ticket-item">
                        <div class="thumb">
                            <img src="assets/images/ticket-01.jpg" alt="">
                            <div class="price">
                                <span>1 ticket<br>from <em>$25</em></span>
                            </div>
                        </div>
                        <div class="down-content">
                            <span>There Are 150 Tickets Left For This Show</span>
                            <h4>Wonderful Festival</h4>
                            <ul>
                                <li><i class="fa fa-clock-o"></i> Thursday: 05:00 PM to 10:00 PM</li>
                                <li><i class="fa fa-map-marker"></i>908 Copacabana Beach, Rio de Janeiro</li>
                            </ul>
                            <div class="main-dark-button">
                                <a href="ticket-details.php">Purchase Tickets</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ticket-item">
                        <div class="thumb">
                            <img src="assets/images/ticket-02.jpg" alt="">
                            <div class="price">
                                <span>1 ticket<br>from <em>$45</em></span>
                            </div>
                        </div>
                        <div class="down-content">
                            <span>There Are 200 Tickets Left For This Show</span>
                            <h4>Golden Festival</h4>
                            <ul>
                                <li><i class="fa fa-clock-o"></i> Sunday: 06:00 PM to 09:00 PM</li>
                                <li><i class="fa fa-map-marker"></i>789 Copacabana Beach, Rio de Janeiro</li>
                            </ul>
                            <div class="main-dark-button">
                                <a href="ticket-details.php">Purchase Tickets</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ticket-item">
                        <div class="thumb">
                            <img src="assets/images/ticket-03.jpg" alt="">
                            <div class="price">
                                <span>1 ticket<br>from <em>$65</em></span>
                            </div>
                        </div>
                        <div class="down-content">
                            <span>There Are 260 Tickets Left For This Show</span>
                            <h4>Water Splash Festival</h4>
                            <ul>
                                <li><i class="fa fa-clock-o"></i> Tuesday: 07:00 PM to 11:00 PM</li>
                                <li><i class="fa fa-map-marker"></i>456 Copacabana Beach, Rio de Janeiro</li>
                            </ul>
                            <div class="main-dark-button">
                                <a href="ticket-details.php">Purchase Tickets</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ticket-item">
                        <div class="thumb">
                            <img src="assets/images/ticket-04.jpg" alt="">
                            <div class="price">
                                <span>1 ticket<br>from <em>$20</em></span>
                            </div>
                        </div>
                        <div class="down-content">
                            <span>There Are 340 Tickets Left For This Show</span>
                            <h4>Tiger Festival</h4>
                            <ul>
                                <li><i class="fa fa-clock-o"></i> Thursday: 06:40 PM to 11:40 PM</li>
                                <li><i class="fa fa-map-marker"></i>123 Copacabana Beach, Rio de Janeiro</li>
                            </ul>
                            <div class="main-dark-button">
                                <a href="ticket-details.php">Purchase Tickets</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ticket-item">
                        <div class="thumb">
                            <img src="assets/images/ticket-05.jpg" alt="">
                            <div class="price">
                                <span>1 ticket<br>from <em>$30</em></span>
                            </div>
                        </div>
                        <div class="down-content">
                            <span>There Are 420 Tickets Left For This Show</span>
                            <h4>Woodland Festival</h4>
                            <ul>
                                <li><i class="fa fa-clock-o"></i> Wednesday: 06:00 PM to 09:00 PM</li>
                                <li><i class="fa fa-map-marker"></i>1122 Copacabana Beach, Rio de Janeiro</li>
                            </ul>
                            <div class="main-dark-button">
                                <a href="ticket-details.php">Purchase Tickets</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ticket-item">
                        <div class="thumb">
                            <img src="assets/images/ticket-06.jpg" alt="">
                            <div class="price">
                                <span>1 ticket<br>from <em>$40</em></span>
                            </div>
                        </div>
                        <div class="down-content">
                            <span>There Are 520 Tickets Left For This Show</span>
                            <h4>Winter Festival</h4>
                            <ul>
                                <li><i class="fa fa-clock-o"></i> Saturday: 06:00 PM to 09:00 PM</li>
                                <li><i class="fa fa-map-marker"></i>220 Copacabana Beach, Rio de Janeiro</li>
                            </ul>
                            <div class="main-dark-button">
                                <a href="ticket-details.php">Purchase Tickets</a>
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


    <!-- *** Subscribe *** -->
    <div class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h4>Subscribe Our Newsletter:</h4>
                </div>
                <div class="col-lg-8">
                    <form id="subscribe" action="" method="get">
                        <div class="row">
                          <div class="col-lg-9">
                            <fieldset>
                              <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" required="">
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
            </div>
        </div>
    </div>

<?php include("includes/footer.php") ?>