@extends('layouts.auth')
@section('content')
<div class="auth">
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="col-md-8">
            <div class="card-register animated jello">
                <h3 class="reg-header" style="padding-top:30px">Register</h3>


                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-6">
                                <input id="fname" placeholder="First Name"type="text" class="input-form form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ old('fname') }}" required autofocus>

                                @if ($errors->has('fname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input id="lname" placeholder="Last Name"type="text" class="input-form form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}" required autofocus>

                                @if ($errors->has('lname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row">

                            <div class="col-md-6">
                                <input id="email" type="email"placeholder="email" class="input-form form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input id="phone_number" type="text"placeholder="phone number" class="input-form form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number') }}" required>

                                @if ($errors->has('phone_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="password" class="input-form form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <input id="password-confirm" placeholder="confirm password" type="password" class="input-form form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row">

                                <div class="col-md-6">
                                    <div class="row">
                                            <div class="col-lg-2 col-md-2 col-sm-6">
                                       Gender
                                            </div>
                                       <div class="col-lg-10 col-md-10 col-sm-6">
                                       <input type="radio" value="Male" name="gender"> Male<br>
                                       <input type="radio" value="Female" name="gender"> Female<br>
                                       <input type="radio" value="Others" name="gender"> Others<br>
                                       </div>
                                    </div>
                            </div>
                            </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-6">
                                 <input type="submit" value="Register" class="btn btn-primary float-right login_btn">

                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            I have account
                                 <a style="margin-left:10px" href="{{ route('login') }}">
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
