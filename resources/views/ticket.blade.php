@extends('layouts.invoice')

@section('content')
<script src="{{ asset('js/jquery-printme.js') }}" defer></script>
<script type="text/javascript">
	$(document).ready(function () {


		$("#print_invoice").click(function(){
			$("#ticket").printMe({
				"path" : ["{{ asset('css/panel.css') }}"],
				"title" : "bus Tz invoice"
			});
		});


	});
	</script>
<div class="container" style="margin-top:120px;">

    <div class="row">

    <div class="col-lg-9 col-sm-12 col-md-9 payment-detail">
        @foreach ($ticket as $tick)
        <button style="padding:5px;float:right;" id="print_invoice" class="btn btn-primary"> Print </button>
        <div class="card" id="ticket" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">Ticket Token:{{ $tick->token }}</h5>
                  <h5 class="card-title">Bus Name:{{ $tick->schedule->bus_route->bus->company->name }}</h5>
                  <h5 class="card-title">Plate Number:{{  $tick->schedule->bus_route->bus->plate_no  }}</h5>
                  <h5 class="card-title">From: {{ $tick->schedule->bus_route->route->route_from. ' To '.$tick->schedule->bus_route->route->route_to }}</h5>
                  <h5 class="card-title">Seat No:{{ $tick->seatno }}</h5>
                  <h5 class="card-title">Date:{{ $tick->schedule->dep_date  }}</h5>
                  <h5 class="card-title">Time:{{ $tick->schedule->dep_time }}</h5>


                </div>
              </div>
        @endforeach


    </div>

        </div>

    </div>


@endsection
