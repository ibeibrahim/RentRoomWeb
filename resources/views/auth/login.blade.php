@extends('layouts.frontend.loginapp')

@section('title','Login')
    
@section('content')
<div class="fluid-container login-register">
    <div class="row m-0 no-gutters">
        <div class="col-md p-0 menu">
        </div>
        <div class="col-md p-3 login">
            <div class="cardlog">
                <br>
            <p class="h5 mb-0">Welcome to</p>
            <a class="h2 card-title logo mb-0 text-decoration-none" href="{{ route('welcome') }}">RentRoom</a>
            <p class="h6 card-title font-weight-normal text-black-50">Enter your email and password to access your account</p>
            <form action="{{ route('login') }}" method="POST"> 
                @csrf
    
                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                    @endif
    
    
            <label for="yourEmail" class="form-label mb-0 ">Email</label>
            <div class="input-group mb-3">
                <input type="text" id="yourEmail" class="form-control" placeholder="Enter your email" name="email" value="{{ old('email') }}">
            </div>
            <label for="yourPass" class="form-label mb-0">Password</label>
            <div class="input-group mb-0">
                    <input id="yourPass" type="password" class="form-control" placeholder="Enter your password" name="password">
            </div>
            <div class="container">
                <div class="row p-0">
                    <div class="col-6 mb-3 mt-0 pl-0">
                        <div class="form-check ml-3">
                            <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                            <label class="form-check-label remember mt-2" for="rememberMe">Remember me</label>
                        </div>
                    </div>
                    <div class="col-6 mb-3 mt-0 ml-0 text-right">
                        @if (Route::has('password.request'))
                                <a class="btn-link mb-0 remember" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                </a>
                        @endif
                    </div>
                </div>
            </div>
                <button type="submit" class="btn btn-success btn-block loginBtn ">Login</button>
                
    
                <a href="{{ url('auth/google') }}" class="btn btn-success loginBtn btn-block mb-3">Login with Google</a> 
            </form>
            </div>
        </div>
  </div>
</div>
@endsection


@section('css')
<style>
    * {
        font-family: Inter;
        height: 100%;
    }
    .card{
        border-radius: 0;
        border: 0;
        margin-top: 70px;
        margin-bottom: 70px;
    }
    .logo{
        color: #188B93;
        font-weight: 800;
    }
    .icon {
        font-size: 25px;
    }
    .loginBtn {
        background-color: #188B93;
        color: white;
    }
    .remember {
        font-size: 14px;
    }

</style>
@endsection