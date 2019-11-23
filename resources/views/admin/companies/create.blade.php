@extends('layouts.app')
@section('content')
<div class="container">


    <div class="row">
    <div class="col-lg-8 col-md-8">
        <h1 class="dash-header" style="margin-bottom: 0">
            <a href="" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>
           Busses Companies</h1>
        <ul style="list-style-type: none font-size:20px;margin-top: 0;">
            <li class=""><a href="/home"><i class="fa fa-home iconss"></i></a>
                Bus company/create </li>
        </ul>
    </div>
        <!--position all div left-->
        <div class="col-md-9 col-sm-9 col-lg-9 pull-left">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xm-12">

                <form method="post" action="{{ route('companies.store') }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="company-name">Company Name<span class="required">*</span></label>
                        <input type="text" placeholder="Enter name" id="company-name" required name="name" spellcheck="false" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="Company-address">Company address<span class="required">*</span></label>
                        <input type="text" placeholder="Company address" id="Company-address" required name="address" spellcheck="false" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="company-day">Company Email<span class="required">*</span></label>
                        <input type="email" placeholder="Company email" id="Company-email" required name="email" spellcheck="false" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="company-day">Company mobile number<span class="required">*</span></label>
                        <input type="tel" placeholder="Company mobile number" id="Company-phone" required name="phone" spellcheck="false" class="form-control" />
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
                                <li><a href="/companys">view my company</a></li>

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
