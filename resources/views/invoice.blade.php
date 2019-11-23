@extends('layouts.invoice')

@section('content')
<script src="{{ asset('js/jquery-printme.js') }}" defer></script>
<script type="text/javascript">
	$(document).ready(function () {


		$("#print_invoice").click(function(){
			$("#invoice").printMe({
				"path" : ["{{ asset('css/panel.css') }}"],
				"title" : "bus Tz invoice"
			});
		});


	});
	</script>
<div class="container" style="margin-top:120px;">

    <div class="row">

    <div class="col-lg-9 col-sm-12 col-md-9 payment-detail">
        <button style="padding:5px;float:right;" id="print_invoice" class="btn btn-primary"> Print </button>
        <div class="invoice-box" id="invoice">

                <div class="row">



                                <div class="col-lg-3 col-md-3 col-sm-6 invoice-logo">
                                    <img src="{{asset('images/log.png')}}" style="width:100%; max-width:300px;">
                                </div>

                                <div class="col-lg-9 col-md-9 col-sm-6 invoice-title">
                                    <div style="float:right; padding-top:19px;">

                                    Invoice #: 123<br>
                                    Created: January 1, 2015<br>
                                    Due: February 1, 2015
                                    </div>
                                </div>


                </div>

                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-6" style="padding-bottom:40px">
                                    BusTz<br>
                                    5 Shaaban Robert Street 11101<br>
                                    P.O Box 3918<br>
                                    Dar-es-salaam,<br> Tanzania
                                </div>

                                <div class="col-lg-7 col-md-7 col-sm-6">
                                  <div style="float:right">
                                    {{ $Customer->fname.' '.$Customer->lname }}.<br>
                                    {{ $Customer->email }}<br>
                                    {{ $Customer->phone }}
                                  </div>
                                </div>
                            </div>


                            <table style="padding-right:5px;" class="table">
                <tr class="heading" style="font-size:12px;">


                        <td>
                            Passanger Name
                             </td>

                    <td>
                        Company Name
                    </td>
                    <td>
                        Bus plate no
                    </td>
                    <td>
                        Seat no
                    </td>
                    <td>
                        Bus type
                    </td>
                    <td>
                       Departure date
                    </td>
                    <td>
                        Departure Time
                     </td>
                     <td>
                            Price
                         </td>

                </tr>
                <form id="payment" action="{{route('payment')}}" method="POST" style="display:none">

                        {{ csrf_field() }}
                    @foreach ($books as $book)
                    <input type="hidden" name="id[{{ $i++ }}]" value="{{ $book->id}}">
                <tr class="item">
                    <td>
                       {{ $book->fname.' '.$book->lname }}
                    </td>
                    <td>
                      {{ $book->schedule->bus_route->bus->company->name }}
                    </td>
                    <td>
                        {{ $book->schedule->bus_route->bus->plate_no }}
                    </td>
                    <td>
                        {{ $book->seatno }}
                    </td>
                    <td>
                        {{ $book->schedule->bus_route->bus->bustype }}
                    </td>
                    <td>
                       {{ $book->schedule->dep_date }}
                    </td>
                    <td>
                        {{ $book->schedule->dep_time }}
                    </td>
                    <td>
                       {{ $book->price }}
                    </td>
                </tr>
                @endforeach
            </form>

                <tr class="total">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                       Total:{{ $book->price*$no.'/=' }}
                    </td>
                </tr>
                            </table>
        </div>

    </div>
    <div class="col-lg-2 col-sm-12 col-md-2 b-detail">
      <div class="payments-methods">
                <div class="section-title">
                    <h4 class="title">Payments </h4>
                </div>
                <p class="">Price:{{ $book->price.'/=' }}</p>
                <p class="">Total seat:<span style="color:blue;">{{ $no }}</p>
                <p class="">Total Price:{{ $book->price*$no.'/=' }}</p>
                <div class="input-checkbox">
                    <input type="radio" name="payments" id="payments-2">
                    <label for="payments-2">Cheque Payment</label>
                    <div class="caption">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            <p>
                    </div>
                </div>
                <div class="input-checkbox">
                        <input type="radio" name="payments" id="payments-2">
                        <label for="payments-2">Tigo Pesa</label>
                        <div class="caption">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                <p>
                        </div>
                    </div>
                    <div class="input-checkbox">
                            <input type="radio" name="payments" id="payments-2">
                            <label for="payments-2">M-Pesa</label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    <p>
                            </div>
                        </div>

                </div>
                <div class="input-checkbox" id="paypal">
                    <div id="paypal-button"></div>

                    <script src="https://www.paypal.com/sdk/js?client-id=AXC-35gpPQMXf9cyVLdWSbdSGESoOBaOXjoafoicxMBSh2JDA_DviKryPLitCghZs1BFlY2o353wuJnM&currency=USD"></script>

                    <script>
                        // Render the PayPal button into #paypal-button-container
                        paypal.Buttons({

                            // Set up the transaction
                            createOrder: function(data, actions) {
                                return actions.order.create({
                                    purchase_units: [{
                                        amount: {
                                            value: '{{ $pay }}'
                                        }
                                    }]
                                });
                            },

                            // Finalize the transaction
                            onApprove: function(data, actions) {
                                return actions.order.capture().then(function(details) {
                                    // Show a success message to the buyer
                                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                                    document.getElementById('payment').submit();
                                });
                            }


                        }).render('#paypal-button');
                    </script>

                </div>
            </div>
        </div>

    </div>
    </div>

</div>
</form>
<script>

</script>
@endsection
