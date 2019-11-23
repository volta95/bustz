@extends('layouts.page')
@section('content')

<div class="container col-md-9 col-lg-9  display">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h1 class="search-title"> Search Results</h1>
                <div class="row">



            <div class="container col-md-12 col-lg-12">
                <div class="panel panel-primary ">

                    <div class="panel-body">
                               <table
                                bgcolor="#FFFFFF"
                                  data-toggle="table"
                                  data-search="true"
                                 >
                                  <thead>
                                    <tr>
                                      <th>Name</th>
                                      <th>Plate no:</th>
                                      <th>From</th>
                                      <th>To </th>

                                      <th> Depature date</th>
                                      <th>Depature time</th>
                                      <th>Bus type</th>
                                      <th>Price</th>
                                      <th></th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>

        @foreach ($availables as $available)

        <tr>
        <td>{{ $available->bus_route->bus->company->name }}</td>
        <td>{{  $available->bus_route->bus->plate_no }}</td>
        <td>{{ $available->bus_route->route->route_from }}</td>
        <td>{{  $available->bus_route->route->route_to }}</td>
        <td>{{  $available->dep_date }}</td>
        <td>{{ $available->dep_time }}</td>
        <td>{{ $available->bus_route->bus->bustype }}</td>
        <td>{{ $available->price }}</td>
        <td><a href="{{ url('book/' . $available->id) }}">Select Bus</a></td>
        <td><a href="{{ url('luggages/' . $available->bus_route->bus->id) }}">Select Luggage Slot</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>

                </div>
            </div>
        </div>
    </div>
</div>


    @endsection





