@extends('layouts.app')
@section('content')
<div class="auth">
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="col-md-8">
            <div class="card-register">
                <div class="card-header">
                <h5>Welcome to company registration</h5>
                <h5>PART 1:Company basic detail</h5>
                </div>

                <div class="card-body">
                    
                <form method="post" action="{{ route('companies.store') }}">
                        {{ csrf_field() }}
    

                        <div class="form-group row">
                     
                            <div class="col-md-6">
                                <input id="company-name" placeholder="Enter Comapny Name" type="text" class="input-form form-control{{ $errors->has('company-name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                     
                            <div class="col-md-6">
                                <input id="Company-address" placeholder="Enter company address" type="text" class="input-form form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                    
                            <div class="col-md-6">
                                <input id="company-email" type="email"placeholder="Enter company email" class="input-form form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="company-phone" type="text"placeholder="phone number" class="input-form form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="company-tin" type="text"placeholder="TIN number" class="input-form form-control{{ $errors->has('tin') ? ' is-invalid' : '' }}" name="tin" value="{{ old('tin') }}" required>
    
                                    @if ($errors->has('tin'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('tin') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                 <input type="submit" value="Next" class="btn btn-primary float-right login_btn">
                               
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            I have Register
                                 <a class="btn btn-link" href="{{ route('login') }}">
                                     {{ __('Login') }}
                                 </a>
                            
                             
             </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
@endsection
