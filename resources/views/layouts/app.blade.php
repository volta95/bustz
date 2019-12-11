<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">


    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link href="https://unpkg.com/bootstrap-table@1.15.2/dist/bootstrap-table.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <link href="{{ asset('css/panel.css') }}" rel="stylesheet" type="text/css">

 <!-- script -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
</head>
<body id="app">
    <div>
        @if(auth::check())
        <nav class="navbar fixed-top navbar-expand-md navbar-light bg-white shadow-sm">

                <a class="navbar-brand" href="{{ url('/') }}">
                    <img  class="logo" src="{{asset('images/logo.png')}}">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse nav-contents" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <div class="searchbar">
                            <input class="search_input" type="text" name="" placeholder="Search...">
                            <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
                          </div>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->fname }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right account animated flipInY" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        @endguest
                    </ul>

            </div>
        </nav>
        <div id="dash-content">
        <div id="sidenav">
                <div class="user-account">

                        <img class="profile-pic round-pic" src="{{asset('images/'.Auth::user()->image)}}">

                            <div class="profile-name">
                                <span>Welcome,</span><br>
                                <a href="#" class="dropdown-bt user-name" data-toggle="dropdown"><strong>{{Auth::user()->fname.' '.Auth::user()->lname}}<i class="fa fa-caret-down" aria-hidden="true"></i>
                                </strong></a>
                                <ul class="account animated flipInY">
                                    <li><a href="users/{{Auth::user()->id}}"><i class="icon-user"></i>My Profile</a></li>
                                    <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                                    <li><a href="{{ route('logout') }}" aria-haspopup="true" aria-expanded="false" v-pre onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i class="icon-power"></i>Logout</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        <hr>
              @if(Auth::user()->role_id==1)
                        <div class="row">
                            <div class="col-4">
                                <h6>5+</h6>
                                <small>Experience</small>
                            </div>
                            <div class="col-4">
                                <h6>400+</h6>
                                <small>Users</small>
                            </div>
                            <div class="col-4">
                                <h6>80+</h6>
                                <small>Tickets</small>
                            </div>
                        </div>
                    </div>

                    <div class="panel-title row" >
                            <div class="title-panel col-lg-7 col-md-7 col-sm 12">Administrator</div>
                            <div class="panel-border col-lg-9 col-md-9 col-sm 7" ></div>
                        </div>

                        <ul class="main-menu metismenu">
                                <li class="active"><a href="{{ url('home') }}"><i class="fa fa-tachometer-alt icon-menu"></i><span>Dashboard</span></a></li>
                                <li class="submenu">
                                    <a href="#"class="dropdown-btn"><i class="fa fa-mail-bulk icon-menu"></i>Buses Companies
                                        <i class="fa fa-caret-down"></i>
                                    </a>
                                      <ul  class="drop-down">
                                        <li><a href="{{ url('companies') }}">View all companies</a></li>
                                       <!-- <li><a href="{{ url('companies/create') }}">Add new company</a></li>-->

                                    </ul>

                                </li>
                                <li class="submenu">
                                    <a href="#"class="dropdown-btn"><i class="fa fa-bus icon-menu"></i>Buses
                                        <i class="fa fa-caret-down"></i>
                                    </a>
                                      <ul  class="drop-down">
                                        <li><a href="{{ url('buses') }}">View all buses</a></li>
                                        <!--
                                        <li><a href="{{ url('buses/create') }}">Add new bus</a></li>
                                        -->
                                    </ul>

                                </li>

                                <li class="submenu">
                                    <a href="#"class="dropdown-btn"><i class="fa fa-road icon-menu"></i>Route
                                        <i class="fa fa-caret-down"></i>
                                    </a>
                                      <ul  class="drop-down">
                                        <li><a href="{{ url( 'routes') }}">View all routes</a></li>
                                        <li><a href="{{ url('routes/create') }}">Add new route</a></li>

                                    </ul>

                                </li>

                               <!-- <li class="submenu">
                                    <a href="#"class="dropdown-btn"><i class="fa fa-road icon-menu"></i>Boading Points
                                        <i class="fa fa-caret-down"></i>
                                    </a>
                                      <ul  class="drop-down">
                                        <li><a href="{{ url( 'boading') }}">View boading points</a></li>
                                        <li><a href="{{ url('boading/create') }}">Add new boading points</a></li>

                                    </ul>

                                </li>-->

                                <li><a href="{{ url('admin/social') }}"><i class="fa fa-globe icon-menu"></i><span>Social</span></a></li>
                                <li class="submenu">
                                        <a href="#"class="dropdown-btn"><i class="fa fa-user-friends icon-menu"></i><span>Users</span>
                                            <i class="fa fa-caret-down"></i>
                                        </a>

                                        <ul  class="drop-down">
                                        <li><a href="{{ url( 'users') }}">View all users</a></li>

                                    </ul>
                                </li>


                                <li>
                                    <a href="#Report" class="has-arrow"><i class="fa fa-chart-line icon-menu"></i><span>Report</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="report-expense.html">Expense Report</a></li>
                                        <li><a href="report-invoice.html">Invoice Report</a></li>
                                    </ul>
                                </li>
                            </ul>
        @elseif(Auth::user()->role_id==2)
        <div class="row">
                <div class="col-4">
                    <h6>5+</h6>
                    <small>Experience</small>
                </div>
                <div class="col-4">
                    <h6>400+</h6>
                    <small>Users</small>
                </div>
                <div class="col-4">
                    <h6>80+</h6>
                    <small>Tickets</small>
                </div>
            </div>
        </div>

        <div class="panel-title row" >
                <div class="title-panel col-lg-6 col-md-6 col-sm 5">Bus owner</div>
                <div class="panel-border col-lg-6 col-md-6 col-sm 7" ></div>
            </div>

            <ul class="main-menu metismenu">
                    <li class="active"><a href="{{ url('home') }}"><i class="fa fa-tachometer-alt icon-menu"></i><span>Dashboard</span></a></li>
                    <li class="submenu">
                        <a href="#"class="dropdown-btn"><i class="fa fa-bus icon-menu"></i>Buses
                            <i class="fa fa-caret-down"></i>
                        </a>
                          <ul  class="drop-down">
                            <li><a href="{{ url('buses') }}">View all buses</a></li>

                            <li><a href="{{ url('buses/create') }}">Add new bus</a></li>

                        </ul>

                    </li>

                    <li><a href="{{ url('schedules') }}"><i class="fa fa-road icon-menu"></i><span>Schedules</span></a></li>
                    </li>

                    <li><a href="{{ url('busowner/social') }}"><i class="fa fa-globe icon-menu"></i><span>Social</span></a></li>
                    <li><a href="{{ url('staff') }}"><i class="fa fa-user-friends icon-menu"></i><span>Staffs</span></a></li>


                    <li>
                        <a href="#Report" class="has-arrow"><i class="fa fa-chart-line icon-menu"></i><span>Report</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="report-expense.html">Expense Report</a></li>
                            <li><a href="report-invoice.html">Invoice Report</a></li>
                        </ul>
                    </li>
                </ul>
            </ul>
            @elseif(Auth::user()->role_id==3)
            <div class="row">
                    <div class="col-4">
                        <h6>5+</h6>
                        <small>Experience</small>
                    </div>
                    <div class="col-4">
                        <h6>400+</h6>
                        <small>Users</small>
                    </div>
                    <div class="col-4">
                        <h6>80+</h6>
                        <small>Tickets</small>
                    </div>
                </div>
            </div>

            <div class="panel-title row" >
                    <div class="title-panel col-lg-3 col-md-3 col-sm 5">Passenger</div>
                    <div class="panel-border col-lg-9 col-md-9 col-sm 7" ></div>
                </div>

                <ul class="main-menu metismenu">
                        <li class="active"><a href="{{ url('home') }}"><i class="fa fa-tachometer-alt icon-menu"></i><span>Dashboard</span></a></li>
                        <li class="submenu">
                            <a href="#"class="dropdown-btn"><i class="fa fa-ticket-alt icon-menu"></i>My Ticket
                                <i class="fa fa-caret-down"></i>
                            </a>
                        </li>
                </ul>

          @endif


        </div>
        @endif
        <div id="main-dashbord">
            @yield('content')
        </div>

        </div>
    </div>
    <script src="https://unpkg.com/bootstrap-table@1.15.2/dist/bootstrap-table.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script src="{{ asset('js/script.js') }}" defer></script>


</body>
</html>
