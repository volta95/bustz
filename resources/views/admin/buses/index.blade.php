@extends('layouts.app')

@section('content')

<div class="container col-md-9 col-lg-9">

    <div class="panel panel-primary ">
        <div class="panel-heading">
            <h1> Buses</h1>
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
                                <tr>
                                  <th>Bus Name</th>
                                  <th>Model</th>
                                  <th>Seat</th>
                                  <th>Bus Type </th>
                               
                                  <th> Company</th>
                                  <th>Status</th>
                                  <th></th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                            
                                    @foreach($buses as $bus)
                                    
                              <tr id="tr-id-{{$i}}" class="tr-class-{{$i}}" data-title="bootstrap table" >
                                  <td id="td-id-{{$i}}" class="td-class-{{$i}}" data-title="bootstrap table">
                                    <a  href="buses/{{$bus->id}}" >{{$bus->plate_no}}</a>
                                  </td>
                                  <td>{{$bus->model}}</td>
                                  <td>{{$bus->seat}}</td>
                                  <td>{{$bus->bustype}}</td>
                                  <!--@foreach($bus->routes as $route)
                                  <td >{{$route->route_from.' - '.$route->route_to}}</td>
                                
                                  @endforeach
                                  -->
                                  
                                  <td>{{$bus->company->name}}</td>

                                  @if($bus->status==0)
                                  <td>Pedding</td>
                                  <td><a href="#" onclick="var result=confirm('Are you sure you want to confirm this bus?');
                                    if(result){
                                        event.preventDefault();
                                        document.getElementById('confirm-form').submit();
                                    }
                                    ">Confirm</a>
                                        <form id="confirm-form" action="{{route('buses.update',[$bus->id])}}" method="POST" style="display:none">
                                            <input type="hidden" name="_method" value="put">
                                            {{ csrf_field() }}
                                        </form></td>
                                @elseif($bus->status==1)
                                <td>Active</td>
                                <!--<td><a href="#" onclick="var result=confirm('Are you sure you want to ban this bus?');
                                    if(result){
                                        event.preventDefault();
                                        document.getElementById('confirm-form').submit();
                                    }
                                    ">Ban</a>
                                        <form id="confirm-form" action="{{route('buses.update',[$bus->id])}}" method="POST" style="display:none">
                                            <input type="hidden" name="_method" value="put">
                                            {{ csrf_field() }}
                                        </form></td>-->
                                @endif
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
