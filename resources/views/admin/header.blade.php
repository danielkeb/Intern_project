
<head>
<link rel="stylesheet" href="{{ asset('dashboard.css') }}">
</head>
<header style=" z-index: 1000;">
  <div>
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
        <h3 style="color:red">admin <span>page</span></h3>
      </div>
      <div class="right_area">
      <form action="{{ route('logout') }}" method="POST">
         @csrf
        <button type="submit" class="logout_btn">Logout</button>
      </form>
        
      </div>
</div>
    </header>