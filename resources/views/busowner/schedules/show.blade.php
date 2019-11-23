@extends('layouts.app')
@section('content')
<div class="container">
    <div class="comshow">

        <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
        <div class="row">

            <!--position all div left-->
            <div class="col-md-7 col-sm-7 col-lg-7 pull-left">
                <!-- Jumbotron -->
                <div class="jumbotron">
                    <h1>{{$Bus->plate_no.''.$Bus->model}}</h1>
                    <p class="lead">{{$Bus->bustype}}</p>
                    <p>
                        <!--<a class="btn btn-lg btn-success" href="#" role="button">Get started today</a>-->
                    </p>
                </div>

                <!-- Example row of columns -->
              <div class="row">
              @foreach($Bus->routes as $route)
                    <div class="col-lg-4">
                        <h2>{{$route->route_from}}</h2>
                        <p>{{$route->route_to}}</p>
                        <p><a class="btn btn-primary" href="/buses/{{$Bus->id}}" role="button">View details »</a></p>
                    </div>
                    @endforeach
                </div>
                </div>
            <div class="col-md-3 col-sm-3 col-lg-3 pull-right">
                <!--side bar code-->
                <div class="sidebar-module">
                  <!--  <h4>Action</h4>
                    <ol class="list-unstyled">
                        <li><a href="/buss/{{$Bus->id}}/edit">Edit</a></li>

                        <li><a href="#" onclick="var result=confirm('Are you sure you wish to delete this client?');
                        if(result){
                            event.preventDefault();
                            document.getElementById('delete-form').submit();
                        }
                        ">Delete</a>
                            <form id="delete-form" action="{{route('companies.destroy',[$Bus->id])}}" method="POST" style="display:none">
                                <input type="hidden" name="_method" value="delete">
                                {{ csrf_field() }}
                            </form>
                        <li><a href="/buss/create">Add new bus</a></li>


                    </ol>-->
                </div>
            </div>
        </div>
</div>




</div>


</div>
</div>
</div>
</div>

@endsection
