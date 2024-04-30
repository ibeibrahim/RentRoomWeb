@extends('layouts.frontend.loginapp')

@section('title', 'Register')
    
@section('content')

<div class="fluid-container login-register">
    <div class="row m-0 no-gutters">
        <div class="col-md p-3 login">
            <div class="cardlog mt-5">
            <p class="h5 mb-0">Welcome to</p>
            <a class="h2 card-title logo mb-0 text-decoration-none" href="{{ route('welcome') }}">RentRoom</a>
            <p class="h6 card-title font-weight-normal text-black-50 mt-2 mb-0">Belum punya akun ?</p>
            <p class="h6 card-title font-weight-normal text-black-50">Bergabung bersama kami dan temukan kos impianmu</p>
            <form action="{{ route('register') }}" method="POST" class="row g-3"> 
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
 
                <div class="col-md-6">
                    <label class="form-label mb-0">Name</label>
                    <input type="text" class="form-control" placeholder="Enter your name" name="name" value="{{ old('name') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label mb-0">Username</label>
                    <input type="text" class="form-control" placeholder="Enter your username" name="username" value="{{ old('username') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label mb-0 mt-2">Role</label>
                    <select name="role_id" class="form-control" value="{{ old('role_id') }}">
                        <option value="">select a role</option>
                        <option value="2" {{ old('role_id') == 2 ? 'selected' : ''   }} >Landlord</option>
                        <option value="3" {{ old('role_id') == 3 ? 'selected' : ''  }} >Renter</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label mb-0 mt-2">NID</label>
                    <input type="text" class="form-control" placeholder="Nid number" name="nid" value="{{ old('nid') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label mb-0 mt-2">Contact</label>
                    <input type="text" class="form-control" placeholder="contact (please add 88 before number)" name="contact" value="{{ old('contact') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label mb-0 mt-2">Email</label>
                    <input type="email" class="form-control" placeholder="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label mb-0 mt-2">Password</label>
                    <input id="password" type="password" class="form-control" placeholder="password (must be 8 digits)" name="password">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label mb-0 mt-2">Confirm Password</label>
                    <input id="password-confirm" type="password" placeholder="confirm password" class="form-control" name="password_confirmation" >
                </div>
             <button type="submit" class="btn btn-success btn-block loginBtn">Register</button>
         
           </form>
            </div>
        </div>
        <div class="col-md p-0 menu">
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
