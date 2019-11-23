@extends('layouts.page')

@section('content')

<form method="get" id="proceed-book" name="form-book-proced" action="{{ route('luggages.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="contain bus-display">

    <div class="row">
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
                <h4 class="title">Luggage Details</h4>
            </div>        
            <hr>
           
            <div class="form-row form-group">                
            <div class="col">
                <input type="text" name="sender"class="input" placeholder="Name of sender">
                <input type="hidden" name="bus_id" value="{{$bus_id}}">
              </div>
              <div class="col">
                <input type="text" name="s_contact" class="input" placeholder="sender's contacts">
              </div>
            </div>
            <div class="form-row form-group">
                <div class="col">
                  <input type="text "name="receiver" class="input" placeholder="receiver">
                </div>
                <div class="col">
                  <input type="text" name="r_contact" class="input" placeholder="receiver's contact">
                </div>
              </div>
               <div class="form-row form-group">
                <div class="col">
                  <input type="text "name="from" class="input" placeholder="where it comes from">
                </div>
                <div class="col">
                  <input type="text" name="destination" class="input" placeholder="Destination">
                </div>
              </div>
               <div class="form-row form-group">
                <div class="col">
                  <input type="text "name="description" class="input" placeholder="description">
                </div>
                <div class="col">
                  <input type="text" name="weight" class="input" placeholder="weight">
                </div>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary" >
            </div>           
          </form>
    </div>
    </div>
    </div>

</div>
</form>
@endsection
