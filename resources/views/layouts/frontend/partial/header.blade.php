<header>

{{--   
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div>
          <a href="{{ route('welcome') }}">Rent Room</a> --}}
          {{-- <div class="mb-3" style="margin-left: 12px;" id="time"></div> --}}
        {{-- </div>
      </div>
    </div>
  </div>

   --}}
  
  <nav class="navbar navbar-expand-lg navbar-light sticky-top justify">
    <a class="navbar-brand font-weight-bold ml-3 text-success" href="{{ route('welcome') }}">Rent Room</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link" href="{{ route('welcome') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('house.all') }}">All Available Houses</a>
        </li>


        @guest
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
        <li class="nav-item"> <a class="nav-link" href="{{ route('register') }}">Register</a></li>
        @else
        @if (Auth::user()->role_id == 2)
        <li class="nav-item"><a class="nav-link" href="{{ route('landlord.dashboard') }}">Dashboard</a></li>
        @endif
        @if (Auth::user()->role_id == 3)
        <li class="nav-item"><a class="nav-link" href="{{ route('renter.dashboard') }}">Dashboard</a></li>
        @endif
        @if (Auth::user()->role_id == 1)
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        @endif
        @endguest
      </ul>
    </div>
  </nav>


</header>

<script type="text/javascript">
  var date = new Date();
  var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
  var months = ["January","February","March","April","May","June","July","August","September", "October", "November", "December"];
  document.getElementById("time").innerHTML = '<strong>' + days[date.getDay()] + '</strong>' + ', ' + months[date.getMonth()] + ' ' + date.getDate() + ', ' + date.getFullYear();

  
</script>