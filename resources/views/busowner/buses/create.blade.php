@extends('layouts.app')
@section('content')
<div class="container">





    @if (count($errors) > 0)

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif



    <div class="row">
    <div class="col-lg-8 col-md-8">
        <h1 class="dash-header" style="margin-bottom: 0">
            <a href="" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>
           Busses buses</h1>
        <ul style="list-style-type: none font-size:20px;margin-top: 0;">
            <li class=""><a href="/home"><i class="fa fa-home iconss"></i></a>
                Bus/create </li>
        </ul>
    </div>
        <!--position all div left-->
        <div class="col-md-9 col-sm-9 col-lg-9 pull-left">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xm-12">

                <form method="post" name="form-buses" action="{{ route('buses.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="bus-company">company<span class="required">*</span></label>
                        <select name="company_id" id="bus-company" class="form-control">
                            <option value="{{$company->id}}">{{$company->name}}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="bus-plateno">Bus plate number<span class="required">*</span></label>
                        <input type="text" placeholder="Enter Bus plate number" id="bus-plateno" required name="plate_no" spellcheck="false" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="bus-model">Bus Model<span class="required">*</span></label>
                        <input type="text" placeholder="Enter Bus Model" id="bus-model" required name="model" spellcheck="false" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="bustype">Bus type<span class="required">*</span></label>
                        <select name="bustype" id="bustype" class="form-control">

                            <option value="luxury">Luxury</option>
                            <option value="semi luxury">Semi Luxury</option>
                            <option value="normal">Normal</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="seat">Number of seat<span class="required">*</span></label>
                        <input type="text" placeholder="Enter Number of seat" id="seat" required name="seat" spellcheck="false" class="form-control" />
                    </div>



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
                                <li><a href="/buses">view my buses</a></li>

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
