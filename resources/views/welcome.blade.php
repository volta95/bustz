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

                        <li><a class="navi-link" id="navi-link" href="#home">Home</a></li>
                        <li><a class="navi-link" id="navi-link" href="#about">About us</a></li>
                        <li><a class="navi-link" id="navi-link" href="#testimonial">Testimonial</a></li>
                        <li><a class="navi-link" id="navi-link" href="#team">Team</a></li>
                        <li><a class="navi-link" id="navi-link" href="#footer">Contact</a></li>
                        <li><a class="navi-link" id="navi-link" href="/ticket">My Ticket</a></li>
                        <li><a class="navi-link" id="navi-link" href="companies/create">Application</a></li>

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
                        <li><a href=""><ion-icon class="social-icons facebook-color" name="logo-facebook"></ion-icon></a></li>
                        <li><a href=""><ion-icon class="social-icons twitter-color" name="logo-twitter"></ion-icon></a></li>
                        <li><a href=""><ion-icon class="social-icons instagram-color" name="logo-instagram"></ion-icon></a></li>
                        <li><a href=""><ion-icon class="social-icons " name="mail"></ion-icon></a></li>
                        <li><a href=""><ion-icon class="social-icons pinterest-color" name="logo-pinterest"></ion-icon></ion-icon></a></li>
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
                                <img src="{{ asset('images/mase.jpeg') }}"  alt="team-member">
                                </div>
                                <div class="team-member-info text-center">
                                    <h4 class="team-member-name">Masenu K Msuya</h4>
                                    <h4 class="team-member-designation">Co-Founder & Full-stack developer</h4>

                                </div>
                            </div>
                            <div class="team-member">
                                <img src="{{ asset('images/user.png') }}" alt="team-member">
                                <div class="team-member-info text-center">
                                    <h4 class="team-member-name">Richard Mmari</h4>
                                    <h4 class="team-member-designation">Co-Founder & Back-end developer</h4>

                                </div>
                            </div>



                            <div class="team-member">
                                <img src="{{ asset('images/user.png') }}" alt="team-member">
                                <div class="team-member-info text-center">
                                    <h4 class="team-member-name">Emmanuel Lema</h4>
                                    <h4 class="team-member-designation">Co-Founder & Back-end developer</h4>

                                </div>
                            </div>

                        </div>

                        </div>
                    </div>
                </div>
            </div>
</section>
<!--footer starts from here-->
<footer class="footer">
    <div class="container bottom_border">
    <div class="row">
    <div class=" col-sm-4 col-md col-sm-4  col-12 col">
    <h5 class="headin5_amrc col_white_amrc pt2">Find us</h5>
    <!--headin5_amrc-->
    <p class="mb10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
    <p><i class="fa fa-location-arrow"></i> 9878/25 sec 9 rohini 35 </p>
    <p> <i class="fa fa-phone" aria-hidden="true"></i><a  style="color:white" href="tel:+255784843475"> +255784843475</a>
    </p>
    <p><i class="fa fa fa-envelope"></i> info@bustz.co.tz  </p>


    </div>


    <div class=" col-sm-4 col-md  col-6 col">
    <h5 class="headin5_amrc col_white_amrc pt2">Site links</h5>
    <!--headin5_amrc-->
    <ul class="footer_ul_amrc">
        <li><a href="">Application</a></li>
        <li><a href="">Register</a></li>
        <li><a href="">My ticket</a></li>
        <li><a href="#">FAQ</a></li>
        <li><a class="navi-link" href="{{ route('login') }}" >
            {{ __('Login') }}
    </a></li>
    </ul>
    <!--footer_ul_amrc ends here-->
    </div>


    <div class=" col-sm-4 col-md  col-6 col">
    <h5 class="headin5_amrc col_white_amrc pt2">Quick links</h5>
    <!--headin5_amrc-->
    <ul class="footer_ul_amrc">
    <li><a href="https://www.sumatra.go.tz/">Sumatra</a></li>
    <li><a href="">TRA</a></li>
    <li><a href="">Traffic</a></li>


    </ul>
    <!--footer_ul_amrc ends here-->
    </div>


    <div class=" col-sm-4 col-md  col-12 col">
    <h5 class="headin5_amrc col_white_amrc pt2">Subscribe</h5>
    <!--headin5_amrc ends here-->

    <ul class="footer_ul2_amrc">

    </ul>
    <!--footer_ul2_amrc ends here-->
    </div>
    </div>
    </div>


    <div class="container">
    <ul class="foote_bottom_ul_amrc">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About us</a></li>
        <li><a href="#testimonial">Testimonial</a></li>
        <li><a href="#team">Team</a></li>
        <li><a href="#footer">Contact</a></li>
        <li><a href="/ticket">My Ticket</a></li>
        <li><a href="companies/create">Application</a></li>

        <li>
            <!-- Button trigger modal -->
<a  href="{{ route('login') }}" >
{{ __('Login') }}
</a>
            </li>
    </ul>
    <!--foote_bottom_ul_amrc ends here-->
    <p class="text-center">Copyright @ <span id="year"></span> | Designed With by <a href="#">Bustz</a></p>
    <script>
        document.getElementById("year").innerHTML = new Date().getFullYear();
    </script>
    <ul class="social_footer_ul">
    <li><a href="http://webenlance.com"><i class="fab fa-facebook-f"></i></a></li>
    <li><a href="http://webenlance.com"><i class="fab fa-twitter"></i></a></li>
    <li><a href="http://webenlance.com"><i class="fab fa-linkedin"></i></a></li>
    <li><a href="http://webenlance.com"><i class="fab fa-instagram"></i></a></li>
    </ul>
    <!--social_footer_ul ends here-->
    </div>

    </footer>



<script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="{{ asset('js/script.js') }}" defer></script>
    </body>
</html>

