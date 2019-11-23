@extends('layouts.page')

@section('content')

<form method="post" id="proceed-book" name="form-book-proced" action="{{ route('book.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="contain bus-display">

    <div class="row">
            <div class="col-lg-3 col-sm-12 col-md-3 j-detail">
                <div class="section-title">
                    <h3  style="font-size:20px;"class="title">Booking detail</h3>
                </div>
            <p class="">Bus Name:{{$schedule->bus_route->bus->company->name}}</p>
            <p class="">Bus Type:{{$schedule->bus_route->bus->bustype}}</p>
            <p class="">From:{{$schedule->bus_route->route->route_from}}</p>
            <p class="">To:{{$schedule->bus_route->route->route_to}}</p>
            <p class="">Date:{{$schedule->dep_date}}</p>
            <p class="">Depature:{{$schedule->dep_time}}</p>
            <p class="">Seat Number:<span style="color:blue;">@foreach($seats as $seat){{$seat.'  '}}@endforeach</span></p>
            
            
            <p class="">Day:</p>
                </div>


    <div class="col-lg-6 col-sm-12 col-md-6 payment-detail">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <div class="section-title">
                <h4 class="title">Customer details</h4>
            </div>
 <input type="hidden" name="price"class="input" value="{{$schedule->price}}">
 <input type="hidden" name="schedule"class="input" value="{{$schedule->id}}">
         
           @foreach($seats as $seat)
            <h5>Passanger {{++$i}} details</h5>
            <hr>
            <div>seat {{$seat}}</div>
            <div class="form-row form-group">
                
              <div class="col">

                <input type="hidden" name="seat[{{$i}}]"class="input" value="{{$seat}}">
                <input type="text" name="fname[{{$i}}]"class="input" placeholder="First name">
              </div>
              <div class="col">
                <input type="text" name="lname[{{$i}}]" class="input" placeholder="Last name">
              </div>
            </div>
            <div class="form-row form-group">
                <div class="col">
                  <input type="text "name="phone[{{$i}}]" class="input" placeholder="Phone Number">
                </div>
                <div class="col">
                  <input type="email" name="email[{{$i}}]" class="input" placeholder="Email">
                </div>
              </div>
              <div class="form-group row">
                <label for="boarding" class="col-sm-4 col-form-label">Boarding Point:</label>
                <div class="col-sm-8">
                    <select id="broading" class="input">
                        <option selected>Choose boardin point...</option>
                        <option>...</option>
                      </select>
                </div>
              </div>
         @endforeach
         <hr>
         <h5>Booker details</h5> 
         <hr>

               <div class="form-row form-group">
                  <div class="col-lg-5 col-sm-10 col-md-5">
                    <input type="text" name="customer_fn" class="input" placeholder="First name"><br>
                  </div>
                  <div class="col-lg-5 col-sm-10 col-md-5">
                    <input type="text" name="customer_ln" class="input" placeholder="Last name">
                  </div>
                </div>
                <div class="form-row form-group">
                    <div class="col">
                      <input type="text "name="customer_phone" class="input" placeholder="Phone Number">
                    </div>
                    <div class="col">
                      <input type="email" name="customer_email" class="input" placeholder="Email">
                    </div>
                  </div>

          </form>
    </div>
    <div class="col-lg-2 col-sm-12 col-md-2 b-detail">
      <div class="payments-methods">
                <div class="section-title">
                    <h4 class="title">Payments </h4>
                </div>
                 <!-- 
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
                <div class="input-checkbox" id="paypal" style="width:150px;">
                        <script src="https://www.paypal.com/sdk/js?client-id=AY87lhMlnQN4DdTB9NC7vvCgtTmpWnSsK4i7cQFEBsWmwJl9mGPKzNoItgJtq4RK6VsOuTDidU6jmQZL"></script>
                        <script>paypal.Buttons().render('#paypal');</script>

                    </div>-->
                <p class="">Price:{{$schedule->price}}</p>
                <p class="">Total seat:<span style="color:blue;">{{count($seats)}} </p>
                <p class="">Total Price:{{$schedule->price*count($seats)}}</p>
                <div class="pull-right">
                       <input type="submit" name="proceed" class="primary-btn" value="Confirm Booking">
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
