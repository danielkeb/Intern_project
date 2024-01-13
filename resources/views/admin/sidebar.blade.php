<head>
<link rel="stylesheet" href="style.css">
<style>

      
    </style>
     <link rel="stylesheet" href="{{ asset('dashboard.css') }}">
</head>
<div class="sidebar">
    <center>
          <img src="{{ asset('images/admin.jpg') }}" class="profile_image" alt="">

            <h4>{{Auth::user()->name }}</h4>
        </center>
      
        <a href="{{url('component')}}"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="{{ url('/permission') }}"><i class="fas fa-key"></i><span>Permission</span></a>
        <a href="{{url('register')}}"><i class="fas fa-user-plus"></i><span>Register</span></a>
      
      <a href="{{ route('profile.show') }}"><i class="fas fa-cog"></i><span>Profile</span></a>
    </div>