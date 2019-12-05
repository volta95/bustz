@extends('layouts.auth')
@section('content')
<div class="auth">
<div class="container">
    <div class="row justify-content-center h-100">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h3>Log In</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="input-group form-group ">


                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="email" class="input-form form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<br>
                        <div class="input-group form-group ">

                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="password" class=" input-form form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label  align-items-center remember" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input type="submit" value="Login" class="btn btn-primary float-right login_btn">

                            </div>
                        </div>
                    </form>

				        <div class="d-flex justify-content-center">
				                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                </div>
                <div class="d-flex justify-content-center">
                   Don't have account
                        <a style="margin-left:8px" href="{{ route('register') }}">
                            {{ __('Register') }}
                        </a>


    </div>




                </div>
            </div>
        </div>
    </div>
</div>
</div>
<@endsection
