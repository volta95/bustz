@extends('layouts.page')

@section('content')

<form method="get" id="proceed-book" name="form-book-proced" action="{{ route('proceed') }}" enctype="multipart/form-data">

<div class="container bus-display">
    <div class="row">
            <div class="col-lg-3 col-sm-12 col-md-3 j-detail">
                    <h3>Journey Detail</h3>
            <p class="">Bus Name:{{$schedule->bus_route->bus->company->name}}</p>
            <p class="">Bus Type:{{$schedule->bus_route->bus->bustype}}</p>
            <p class="">From:{{$schedule->bus_route->route->route_from}}</p>
            <p class="">To:{{$schedule->bus_route->route->route_to}}</p>
            <p class="">Price:{{$schedule->price}}</p>
            <p class="">Date:{{ $schedule->dep_date }}</p>
            <p class="">Depature:{{$schedule->dep_time}}</p>
            <p class="">Day:<span class="datee"></span></p>
                </div>


    <div class="col-lg-5 col-sm-12 col-md-5 booking-bus">
            <div class="bus-map">
                    <div class="bus-header">
                        <p class="header-bus">Select seat</p>
                    </div>
            <div class="bus-seat">

            {!!$seats!!}

            </div>
            </div>
        <input type="hidden" value="{{$schedule->id}}" name="schedule">
        <input type="hidden" value="{{$schedule->bus_route->bus->id}}" name="bus_id">


    </div>
    <div class="col-lg-3 col-sm-12 col-md-3 b-detail">
        <h3>Booking Detail</h3>
        <p class="">Seat Number:<span class="stno"></span></p>
        <p class="">Total seat:<span class="tseat"></span></p>
        <p class="">Total Price:<span class="price"></span></p>
        <div class="form-group">
                <input type="submit" id="submit" class="btn btn-primary" style="width:200px;text-align:center;color:#fff;margin-left:26px">
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
             <div class="col-lg-3 col-sm-12 col-md-3 b-detail">
        <h3>Key</h3>
        <p class="">Available Seat:<img src="{{asset('images/seat-available.png')}}" height="40px" width="40px"></p>
        <p class="">Selected Seat:<img src="{{asset('images/seat-selected.png' )}}" height="40px" width="40px"></p>
        <p class="">Booked Seat:<img src="{{asset('images/seat-booked.png')}}" height="40px" width="40px"></p>
        </div>
    </div>
    </div>

</div>
</form>
<script>
$( document ).ready(function() {






var weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
var a = new Date('{{ $schedule->dep_date }}');
 var dayname = weekday[a.getDay()];
 $(".datee").append(dayname);
    price=0;
    totalseat=0;
    $(".price").html(price);
    $(".tseat").html(totalseat);

    $(".st").click(function(e) {
        if($(this).hasClass("selected")) {
            price-={{$schedule->price}};
            totalseat-=1;
            $(this).removeClass("selected");
            $(this).addClass("seat-icon");
            var status = $(this).attr('id');
            $("span").remove("#"+status);
            $("input").remove("#seat-"+status);
            $(".price").html(price);
            $(".tseat").html(totalseat);


        }else{
        price+={{$schedule->price}};
        totalseat+=1;
        $(this).removeClass("seat-icon");
        $(this).addClass("selected");
        var status = $(this).attr('id');
        input = $("<input class=\"st\" style=\"display: none\" type=\"text\" id=\"seat-" +status+ "\" name=\"seats["+status+"]\" value=\"" +status+ "\" />");
        $(".stno").append("<span class='ticket-no' id='"+status+"'>"+ status +"</span>");
        $(".stno").append(input);
        $(".price").html(price);
        $(".tseat").html(totalseat);
        }
        });

    });


</script>
@endsection
