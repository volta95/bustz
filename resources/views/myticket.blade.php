@extends('layouts.page')

@section('content')

<form method="get" id="proceed-book" name="form-book-proced" action="{{ route('myticket') }}" enctype="multipart/form-data">

<div class="container bus-display">
    <div class="row">
            <div class="col-lg-3 col-sm-12 col-md-3 j-detail">

                </div>


    <div class="col-lg-5 col-sm-12 col-md-5 booking-bus">
            <form action="myticket" method="get" role="search" class="trip-form">
            <div class="row" class="trip-date">
                    <div class="col">
                          <input type="text" class="form-control calender" name="token" placeholder="Enter Token" required>

                        </div>
                  </div>
                  <br>
                  <input style="color:black;border-color:black" type="submit" class="btn-check-trip" value="view my ticket">

                </form>


    </div>
    <div class="col-lg-3 col-sm-12 col-md-3 b-detail">

    </div>
    </div>

</div>
</form>
<script>

@endsection
