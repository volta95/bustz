@extends('layouts.app')
@section('content')
<div class="container">


    <div class="row">
    <div class="col-lg-8 col-md-8">
        <h1 class="dash-header" style="margin-bottom: 0">
            <a href="" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>
           Busses routes</h1>
        <ul style="list-style-type: none font-size:20px;margin-top: 0;">
            <li class=""><a href="/home"><i class="fa fa-home iconss"></i></a>
                Bus route/create </li>
        </ul>
    </div>
        <!--position all div left-->
        <div class="col-md-9 col-sm-9 col-lg-9 pull-left">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xm-12">

                <form method="post" action="{{ route('routes.store') }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="route_from">Route from<span class="required">*</span></label>
                        <input type="text" placeholder="Enter route from" id="route_from" required name="route_from" spellcheck="false" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="route_to">Route to<span class="required">*</span></label>
                        <input type="text" placeholder="Enter route to" id="route_to" required name="route_to" spellcheck="false" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="price_min">Minimum Fare<span class="required">*</span></label>
                        <input type="text" placeholder="Enter Minimum fare" id="price_min" required name="price_min" spellcheck="false" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="price_max">Maximum Fare<span class="required">*</span></label>
                        <input type="text" placeholder="Enter Maximum fare" id="price_max" required name="price_max" spellcheck="false" class="form-control" />
                    </div>
                    
                   <!-- <div class="form-group">
                        <label for="dep_time">depature time<span class="required">*</span></label>
                        <select name="dep_time" id="dep_time" class="form-control">
                          
                            <option value="06:00">06:00</option>
                            <option value="06:30">06:30</option>
                            <option value="07:00">07:00</option>
                            <option value="06:30">07:30</option>
                            <option value="08:00">08:00</option>
                            <option value="08:30">08:30</option>
                            <option value="09:00">09:00</option>
                            <option value="09:30">09:30</option>
                            <option value="10:00">10:00</option>
                            <option value="10:30">10:30</option>
                            <option value="11:00">11:00</option>
                            <option value="11:30">11:30</option>
                            <option value="12:00">12:00</option>
                            <option value="12:30">12:30</option>
                            <option value="13:00">13:00</option>
                            <option value="13:30">13:30</option>
                            <option value="14:00">14:00</option>
                           
                        </select>   
                    </div> -->


                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit" />
                    </div>




                 
                </form>
            </div>
        </div>
           <div class="col-md-3 col-sm-3 col-lg-3 pull-right">
                        <!--side bar code-->
                        <div class="sidebar-module">
                            <h4>Action</h4>
                            <ol class="list-unstyled">
                                <li><a href="/routess">view my routes</a></li>

                            </ol>
                        </div>
                        <!--
            <div class="sidebar-module">
                <h4>Member</h4>
                <ol class="list-unstyled">
                    <li><a href="">Edit</a></li>

                </ol>
            </div>-->
                    </div>

    </div>
</div>
                    @endsection
