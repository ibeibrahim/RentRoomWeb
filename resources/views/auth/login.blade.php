@extends('layouts.frontend.app')

@section('title','Login')
    
@section('content')
<div class="container-fluid login-register">
    <div class="row m-0">
        <div class="col-lg-12 p-0">
            <!-- Card with an image on left -->
          <div class="card m-0">
            <div class="row">
              <div class="col-6 m-0 p-0">
                <img src="{{ asset('frontend/img/Registrasi.png') }}" class="img-fluid" alt="...">
              </div>
              <div class="col-6 m-0 p-5">
                <br>
                <p class="h5 mb-0">Welcome to</p>
                <p class="h2 card-title logo mb-0">RentRoom</p>
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
                                <label class="form-check-label remember" for="rememberMe">Remember me</label>
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
                    <button type="submit" class="btn btn-primary btn-block loginBtn ">Login</button>
                    
        
                    <a href="{{ url('auth/google') }}" class="btn btn-primary loginBtn btn-block mb-3">Login with Google</a> 
                </form>
              </div>
            </div>
          </div><!-- End Card with an image on left -->
        </div>
  </div>
</div>
@endsection


@section('css')
<style>
    * {
        font-family: Inter;
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