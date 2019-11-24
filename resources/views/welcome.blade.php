<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>e-tIcKet Tanzania Limited</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!--Bootstrap------>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          <!--animated css for animation------>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
          <!--owl carousel for slides------>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
        <!--font awesome for fonts------>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <!---default style----->

         <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <!-- script -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    </head>
    <body>

    <section id="home" class="bg-parralax">
    <div id="container-fluid">
     <div id="navbar">


                    <ul class="navs-list">
                            <span id="logo"><a href=""><img src="{{asset('images/logo.png')}}" id="logo-image"></a></span>
                            <div class="list">
                        <li><a href="#" class="toggle-nav"><ion-icon name="menu"></ion-icon></a></li>

                        <li><a class="navi-link" href="#home">Home</a></li>
                        <li><a class="navi-link" href="#about">About us</a></li>
                        <li><a class="navi-link" href="#testimonial">Testimonial</a></li>
                        <li><a class="navi-link" href="#team">Team</a></li>
                        <li><a class="navi-link" href="#footer">Contact</a></li>
                        <li><a class="navi-link" href="/ticket">My Ticket</a></li>
                        <li><a class="navi-link" href="companies/create">Application</a></li>

                        <li>
                            <!-- Button trigger modal -->
<a class="navi-link" href="{{ route('login') }}" >
        {{ __('Login') }}
</a>
                            </li>
                            </div>
                  </ul>

         </div>
</div>
                    <div class="social-media-icons">
                        <ul>
                        <li><a href=""><ion-icon class="social-icons" name="logo-facebook"></ion-icon></a></li>
                        <li><a href=""><ion-icon class="social-icons" name="logo-twitter"></ion-icon></a></li>
                        <li><a href=""><ion-icon class="social-icons" name="logo-instagram"></ion-icon></a></li>
                        <li><a href=""><ion-icon class="social-icons" name="mail"></ion-icon></a></li>
                        <li><a href=""><ion-icon class="social-icons" name="logo-pinterest"></ion-icon></ion-icon></a></li>
                        </ul>
                    </div>
                    <div class="container">
                     <div class="home-block">
                   <div class="home-content">
                  <p class="search-title"> Search for trip </p>
                            <form action="search" method="get" role="search" class="trip-form">
                             {{ csrf_field() }}
                                    <div class="row" class="trip-info">
                                      <div class="col">

                                        <select name="q" class="form-control" >
                                                <option value="">leaving from</option>
                                                    <option value="Arusha">Arusha</option>
                                                    <option value="Dar-es-Salaam">Dar-es-Salaam</option>
                                                    <option value="Dodoma">Dodoma</option>
                                                    <option value="Mbeya">Mbeya</option>
                                                    <option value="Mwanza">Mwanza</option>
                                                    <option value="Moshi">Moshi</option>
                                                    <option value="Morogoro">Morogoro</option>
                                                    <option value="Iringa">Iringa</option>
                                                    <option value="Mtwara">Mtwara</option>
                                                    <option value="Ruvuma">Ruvuma</option>

                                          </select>

                                      </div>
                                      <div class="col">
                                            <select name="d" class="form-control" >
                                                    <option value="">Destination</option>
                                                    <option value="Arusha">Arusha</option>
                                                    <option value="Dar-es-Salaam">Dar-es-Salaam</option>
                                                    <option value="Dodoma">Dodoma</option>
                                                    <option value="Mbeya">Mbeya</option>
                                                    <option value="Mwanza">Mwanza</option>
                                                    <option value="Moshi">Moshi</option>
                                                    <option value="Morogoro">Morogoro</option>
                                                    <option value="Iringa">Iringa</option>
                                                    <option value="Mtwara">Mtwara</option>
                                                    <option value="Ruvuma">Ruvuma</option>

                                              </select>
                                      </div>
                                    </div>
                                    <br>
                                    <div class="row" class="trip-date">
                                      <div class="col">
                                            <input type="date" class="form-control calender" name="date">
                                            <i class="fa fa-calendar-alt"></i>
                                          </div>
                                    </div>
                                    <br>
                                    <input type="submit" class="btn-check-trip" value="check available buses">

                                  </form>


                   </div>

                     </div>
                    </div>
                    </div>
    </section>
<div data-spy="scroll" data-target="#navbar" data-offset="0">
    <section id="about">
            <!--about right side diagona bg image-->
            <div id="about-bg-diagonal" class="bg-parralax"></div>
            <!--about content-->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div id="about-content-box">
                            <div id="about-content-box-outer">
                                <div id="about-content-box-inner">
                                    <div class="content-title wow fadeInUpBig" data-wow-duration="1s" data-wow-delay=".5s">
                                        <h3>About Us</h3>
                                    </div>
                                    <div class="content-title-underline wow slideInRight" data-wow-duration="1s" data-wow-delay=".5s">
                                    </div>

                                    <div id="about-desc" class="wow zoomInDown" data-wow-duration="1s" data-wow-delay=".5s">
                                        <p> Electronic Bus Ticketing System was driven by the passionate team who believe travelling is more of adventure.
                                            The ideology come to its implementation in order to transform the transport system in Tanzania.
                                             We aim to risen people life experience and connect them to more opportunities.
                                             Through the flexibility and speed of the system its our belief that you will be delighted to choose us as your service provider. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section  id="testimonial" class="bg-parralax wow fadeIn" data-wow-duration="1s" data-wow-delay=".5s">

            <div class="content-box">
                <div class="content-title content-title-white wow fadeInDown" data-wow-duration="1s" data-wow-delay=".5s">
                    <h3>What customers say</h3>
                </div>
                <div class="content-title-underline wow slideInRight" data-wow-duration="1s" data-wow-delay=".5s">
                </div>
                <div class="container">

                    <div class="row  wow bounceInDown" data-wow-duration="1s" data-wow-delay=".5s">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div id="customers-testimonials" class="text-center owl-carousel owl-theme">
                                <div class="testimonial">
                                    <div class="testimg">
                                        <img src="{{ asset('images/humud.jpg') }}" class="img-responsive img-circle test" alt="testimonial">
                                    </div>
                                    <div class="testdesc">
                                        <blockquote>
                                            <p>It has been such a pleasure working wth you.You always manage to follow up at all times and we
                                                relly apreciate it.Your company has shown such professionalism and it comes highly recommendable
                                                to anyone interested
                                            </p>
                                        </blockquote>
                                        <div class="testimonial-author">
                                            <p>
                                                <strong>
                                                    Humudi abdulhussein
                                                </strong>
                                                <span>
                                                    C.E.O & co-founder Huper tanzania
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial">
                                    <div class="testimg ">
                                        <img src="{{ asset('images/humud.jpg') }}" class="img-responsive img-circle test" alt="testimonial">
                                    </div>
                                    <div class="testdesc">
                                        <blockquote>
                                            <p> Thank you for the services. I had a lifetime experience.
                                            </p>
                                        </blockquote>
                                        <div class="testimonial-author">
                                            <p>
                                                <strong>
                                                    Humudi abdulhussein
                                                </strong>
                                                <span>
                                                    C.E.O & co-founder Huper tanzania
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="testimonial">
                                    <div class="testimg">
                                        <img src="{{ asset('images/humud.jpg') }}" class="img-responsive img-circle test" alt="testimonial">
                                    </div>
                                    <div class="testdesc">
                                        <blockquote>
                                            <p>Asanteni kwa huduma nzuri, nimefurahi kutumia huduma zetu.
                                            </p>
                                        </blockquote>
                                        <div class="testimonial-author">
                                            <p>
                                                <strong>
                                                    Humudi abdulhussein
                                                </strong>
                                                <span>
                                                    C.E.O & co-founder Huper tanzania
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

</section>
<section id="team" class="bg-parralax">
    <div class="content-box">
            <div class="content-title wow fadeInDown" data-wow-duration="1s" data-wow-delay=".5s">
                <h3 style="color:white;">Meet our amaizing team</h3>
            </div>
            <div class="content-title-underline wow slideInRight" data-wow-duration="1s" data-wow-delay=".5s">
            </div>
            <div class="container wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">

                <div class="row">
                    <div class="col-md-12">
                        <div id="team-members" class="owl-carousel owl-theme">
                            <div class="team-member">
                            <div class="team_pic">
                                <img src="{{ asset('images/user.png') }}"  alt="team-member">
                                </div>
                                <div class="team-member-info text-center">
                                    <h4 class="team-member-name">Masenu K Msuya</h4>
                                    <h4 class="team-member-designation">Co-Founder & </h4>

                                </div>
                            </div>
                            <div class="team-member">
                                <img src="{{ asset('images/user.png') }}" alt="team-member">
                                <div class="team-member-info text-center">
                                    <h4 class="team-member-name">Richard Mmari</h4>
                                    <h4 class="team-member-designation">Operation Manager & Co-Founder</h4>

                                </div>
                            </div>

                            <div class="team-member">
                                <img src="{{ asset('images/user.png') }}" alt="team-member">
                                <div class="team-member-info text-center">
                                    <h4 class="team-member-name">Editha P Mtema</h4>
                                    <h4 class="team-member-designation">Content Manager & Co-Founder</h4>

                                </div>
                            </div>
                            <div class="team-member">
                                <img src="{{ asset('images/user.png') }}" alt="team-member">
                                <div class="team-member-info text-center">
                                    <h4 class="team-member-name">Ebenezer C Mlay</h4>
                                    <h4 class="team-member-designation">Head of ict & Co-Founder</h4>

                                </div>
                            </div>
                            <div class="team-member">
                                <img src="{{ asset('images/user.png') }}" alt="team-member">
                                <div class="team-member-info text-center">
                                    <h4 class="team-member-name">Emmanuel Lema</h4>
                                    <h4 class="team-member-designation">Customer services & End-User</h4>

                                </div>
                            </div>
                            <div class="team-member">
                                <img src="{{ asset('images/user.png') }}" alt="team-member">
                                <div class="team-member-info text-center">
                                    <h4 class="team-member-name">Gastone E Malembo</h4>
                                    <h4 class="team-member-designation">Head of sales & Co-Founder</h4>

                                </div>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
</section>
<footer id="footer" class="section section-grey">
        <!-- container -->
        <div class="contain">
          <!-- row -->
          <div class="row">
            <!-- footer widget -->
            <div class="col-md-3 col-sm-6 col-xs-6">
              <div class="footer">
                <!-- footer logo -->
                <div class="footer-logo">
                  <a class="logo" href="#">
                    <img src="./img/logo.png" alt="">
                  </a>
                </div>
                <!-- /footer logo -->

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>

                <!-- footer social -->
                <ul class="footer-social">
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                </ul>
                <!-- /footer social -->
              </div>
            </div>
            <!-- /footer widget -->

            <!-- footer widget -->
            <div class="col-md-3 col-sm-6 col-xs-6">
              <div class="footer">
                <h3 class="footer-header">useful link</h3>
                <ul class="list-links">
                    <li><a href="https://www.sumatra.go.tz/">Surface and Marine Transport Regulatory Authority (SUMATRA)</a></li>
                    <li><a href="#">Login</a></li>
                </ul>
              </div>
            </div>
            <!-- /footer widget -->

            <div class="clearfix visible-sm visible-xs"></div>

            <!-- footer widget -->
            <div class="col-md-3 col-sm-6 col-xs-6">
              <div class="footer">
                <h3 class="footer-header">Customer Service</h3>
                <ul class="list-links">
                    <li><i class="fa fa-building" aria-hidden="true"></i>&nbsp;Shabaan Robert Street</li>
                    <li><i class="fa fa-bed" aria-hidden="true"></i>&nbsp;Opposite National Museum</li>
                    <li><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp; P. O. Box 3918, Dar-es-Salaam,</li><li> <i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Tanzania</li>
                    <li><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;mail:<a href="mailto:info@ticket.co.tz">info@ticket.co.tz</a></li>
                    <li><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;Mobile:<a href="tel:+255784843475">&nbsp;+255(0) 784 843 475</a></li>
                    <li style="margin-left:60px;"><a href="tel:+255713123138">+255(0) 713 123 138</a></li>
                  <li><a href="#">FAQ</a></li>
                </ul>
              </div>
            </div>
            <!-- /footer widget -->

            <!-- footer subscribe -->
            <div class="col-md-3 col-sm-6 col-xs-6">
              <div class="footer">
                <h3 class="footer-header">Stay Connected</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                <form>
                  <div class="form-group">
                    <input class="input" placeholder="Enter Email Address">
                  </div>
                  <button class="primary-btn">Join Newslatter</button>
                </form>
              </div>
            </div>
            <!-- /footer subscribe -->
          </div>
          <!-- /row -->
          <hr>
          <!-- row -->
          <div class="row">
                <div class="col-md-12 col-md-offset-12 text-center">
              <!-- footer copyright -->
              <div class="footer-copyright">

              <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |Bustz|powered by BIT</p>
                  </div>
              <!-- /footer copyright -->
            </div>
          </div>
          <!-- /row -->
        </div>
        <!-- /container -->
      </footer>
      <!-- /FOOTER -->

      <!-- jQuery Plugins -->

        <!--<div class="container">
            <div style="text-align:left;" class="row">
                    <div style="text-align:left;text-transform:uppercase;" class="col-sm-3 myCols">
                            <div id="logo-footer"><a href=""><img src="{{asset('images/logo.png')}}" id="logo-image"></a></div>
                        </div>
                <div style="text-align:left;text-transform:uppercase;" class="col-sm-3 myCols">
                    <h5>Address</h5>
                    <ul style="font-size:12px;" > <li>Head office,</li>

                    </ul>
                </div>
                <div  style="text-align:left;" class="col-sm-3 myCols">
                    <h5 style="text-transform:uppercase;">USEFUL LINKS</h5>
                    <ul>
                        <li><a href="https://www.sumatra.go.tz/">Surface and Marine Transport Regulatory Authority (SUMATRA)</a></li>
                    </ul>
                </div>
                <div style="text-align:left;text-transform:uppercase;" class="col-sm-3 myCols">
                    <h5>Subscribe</h5>
                    <ul >

                    </ul>
                </div>


            </div>
        </div>
            <div class="social-networks">
                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="www.facebook.com/mastech" class="facebook"><i class="fa fa-facebook-official"></i></a>
                <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
            </div>
        <div class="footer-copyright">
            <p>©Copyright <?php echo date('Y')?> ® online bus ticket  |   All Rights Reserved   |   Powered by BIT student</p>
        </div>-->
    </footer>
</div>


<script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="{{ asset('js/script.js') }}" defer></script>
    </body>
</html>

