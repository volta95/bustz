@extends('layouts.page')
@section('content')
<div class="forum-main-content">
    <section id="forum-main-section">
            <div id="container-fluid">
                    <div id="navbar">
                               
                                 
                                     <ul class="navs-list">
                            <span id="logo"><a href=""><img src="{{asset('images/logo.jpg')}}" id="logo-image"></a></span>
                            <div class="list">
                        <li><a href="#" class="toggle-nav"><ion-icon name="menu"></ion-icon></a></li>

                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/#about') }}">About us</a></li>
                        <li><a href="{{ url('/#testimonial') }}">Testimonial</a></li>
                        <li><a href="{{ url('/#team') }}">Team</a></li>
                        <li><a href="{{ url('/#footer') }}">Contact</a></li>
                        <li><a href="/forum">Forums</a></li>
                        <li><a href="companies/create">Application</a></li>

                        <li>
                                <a  href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            </div>
                  </ul>
                           
                        </div>
                    </div>
            <div class="forum-block">        
        <p class="forum-header">This is the right place to discuss any ideas, critics,feature request and all 
            ideas regarding our website.Please follow the forum rules and always check FAQ before posting to prevent duplicate
            posts
        </p>
    </div>
    </section>
    <div class="container">
<div class="forum-content">
       <div class="row">
           <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="forum-pages">
                    
            <a href="">1</a> <a href="">2</a> <a href="">3</a>
                </div>
                <div class="forum-head">
                    <div class="forum-head-content">
                    <div class="row" style="padding-top:10px;padding-left:10px;">
                    <div class="col-lg-8 col-md-8">
                        TITLE
                            </div>
                            <div class="col-lg-2 col-md-2">
                                VIEWS
                                </div>
                                <div class="col-lg-2 col-md-2">
                                    REPLIES
                                    </div>
                                 
                    </div>
                    </div>
                </div>
                            <div class="forum-thread">
                    
                                    <div class="row" style="padding-top:10px;padding-left:10px;padding-top:20px;">
                                            <div class="col-lg-8 col-md-8">
                                                <div class="row" >
                                                    <div class="col-lg-1 col-md-1" style="margin-right:20px;"><img src="{{ asset('images/humud.jpg') }}" class="forum-img-circle" ></div>   
                                                    <div class="col-lg-10 col-md-10" >
                                                  Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                                                    </div>  
                                                </div>
                                                    
                                                    </div>
                                                    <div class="col-lg-2 col-md-2" style="padding-left:30px;">
                                                        14
                                                        </div>
                                                        <div class="col-lg-2 col-md-2" style="padding-left:30px;">
                                                            10
                                                            </div>
                                                        
                                            </div>        
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12"><div class="forum-social">
    <div class="forum-facebook"><ion-icon class="forum-icon facebook-color" name="logo-facebook"></ion-icon></div> 
    <div class="forum-twitter"><ion-icon class="forum-icon twitter-color" name="logo-twitter"></ion-icon></div> 
    <div class="forum-instagram"><ion-icon class="forum-icon instagram-color" name="logo-instagram"></ion-icon></div> 
    <div class="forum-pinterest"><ion-icon class="forum-icon pinterest-color" name="logo-pinterest"></ion-icon></div>    
    </div></div>
       </div>
</div>
</div>
<br>
<br>
</div>

@endsection