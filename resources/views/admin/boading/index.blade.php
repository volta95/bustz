@extends('layouts.app')

@section('content')

<div class="container col-md-9 col-lg-9">

    <div class="panel panel-primary ">
        <div class="panel-heading">
            <h1> routes</h1>
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <!--<p class="word">The more {{ Auth::user()->fname }} does, the more {{ Auth::user()->fname }} can do.</p>-->

                </div>

        

        
                <div class="container col-md-12 col-lg-12">
                    <div class="panel panel-primary ">
                    
                        <div class="panel-body">
                                   <table
                                      data-toggle="table"
                                      data-search="true"
                                     >
                                     
                                      <thead>
                                            <a href="/routes/create">Add new route</a> 
                                        <tr>
                                                
                                          <th>Route from</th>
                                          <th>Route to</th>  
                                          <th>Minimum fare</th> 
                                          <th>Maximum fare</th>
                                          <th></th> 
                                          <th></th> 
                                          <th></th>     
                                        </tr>
                                      </thead>
                                      <tbody>
                                        
                                            @foreach($routes as $route)
                                            
                                      <tr id="tr-id-{{$i}}" class="tr-class-{{$i}}" data-title="bootstrap table" >
                                          <td id="td-id-{{$i}}" class="td-class-{{$i}}" data-title="bootstrap table">
                                          {{$route->route_from}}
                                          </td>
                                          <td>{{$route->route_to}}</td>
                                          <td>{{$route->price_min}}</td>
                                          <td>{{$route->price_max}}</td>
                                          <td> <a  href="routes/{{$route->id}}" >View</a></td>
                                          <td> <a  href="routes/{{$route->id}}/edit" >Edit</a></td>
                                        <td> <a href="#" onclick="var result=confirm('Are you sure you wish to delete this route?');
                                            if(result){
                                                event.preventDefault();
                                                document.getElementById('delete-form').submit();
                                            }
                                            ">Delete</a>
                                                <form id="delete-form" action="{{route('routes.destroy',[$route->id])}}" method="POST" style="display:none">
                                                    <input type="hidden" name="_method" value="delete">
                                                    {{ csrf_field() }}
                                                </form></td>
                                        </tr>
                                        {{$i++}}
                                        @endforeach
                        
                                      </tbody>
                                    </table>
                        </div>
                    </div>
                </div>
            </div>

  

    @endsection
