@extends('layouts.app')
@section('content')
<div class="container">
    <div class="comshow">

        <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
        <div class="row">

            <!--position all div left-->
            <div class="col-md-9 col-sm-9 col-lg-9 pull-left">
                <!-- Jumbotron -->
                <div class="jumbotron" style="background-image:url({{  public_path('images/banner1.jpg') }});">
                    <h1>{{$company->name}}</h1>
                    <p class="lead">{{$company->address}}</p>
                    <p>
                        <!--<a class="btn btn-lg btn-success" href="#" role="button">Get started today</a>-->
                    </p>
                </div>

                <!-- Example row of columns -->
              <div class="row">
              @foreach($company->buses as $bus)
                    <div class="col-lg-4">
                            <div> <img class="bus-displaye round-pic" src="{{asset('images/'.$bus->image)}}"></div>
                            <div class="bus-list-admin"><span class="title-bus-list">Company:</span>{{$bus->company->name}}</div>
                            <div>Bus Type:{{$bus->bustype}}</div>
                            <div>Plate Number:{{$bus->plate_no}}</div>
                            <div>Model:{{ $bus->model }}</div>
                            @foreach ($bus->routes as $routes )
                            <div>Route:{{$routes->route_from .'-' .$routes->route_to}}</div>
                            @endforeach

                            <div><a class="btn btn-primary" href="/buses/{{$bus->id}}" role="button">View details »</a></div>
                    </div>
                    @endforeach
                </div>
                </div>
            <div class="col-md-2 col-sm-2 col-lg-2 pull-right">
                <!--side bar code-->
                <div class="sidebar-module">
                    <h4>Action</h4>
                    <ol class="list-unstyled">
                        <li><a href="/companys/{{$company->id}}/edit">Edit</a></li>

                        <li><a href="#" onclick="var result=confirm('Are you sure you wish to delete this client?');
                        if(result){
                            event.preventDefault();
                            document.getElementById('delete-form').submit();
                        }
                        ">Delete</a>
                            <form id="delete-form" action="{{route('companies.destroy',[$company->id])}}" method="POST" style="display:none">
                                <input type="hidden" name="_method" value="delete">
                                {{ csrf_field() }}
                            </form>
                        <li><a href="/buss/create">Add new company</a></li>


                    </ol>
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
