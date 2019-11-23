@extends('layouts.app')

@section('content')

<div class="container col-md-9 col-lg-9">

    <div class="panel panel-primary ">
        <div class="panel-heading">
            <h1> Companies</h1>
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <!--<p class="word">The more {{ Auth::user()->fname }} does, the more {{ Auth::user()->fname }} can do.</p>-->

                </div>

        

        <div class="container col-md-7 col-lg-7">
            <h4 style="font-size:20px;">Companies</h4>
            <div class="panel panel-primary ">
            
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($companies as $company)
                     
                        <li class="list-group-item"><a href="companies/{{$company->id}}">{{$company->name}}</a></li>
                        
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
  

    @endsection
