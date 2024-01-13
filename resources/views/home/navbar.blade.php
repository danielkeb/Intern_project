
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* CSS */
input[name="user_id"] {
  background-color: #f8f8f8;
  border: 1px solid #dddddd;
  border-radius: 5px;
  padding: 5px 10px;
  font-size: 14px;
}
header{
  background-color:#fff;
  box-shadow:0 2px 4px rgba(0,0,0,0.1);

}
/* CSS */
input[name="user_id"]::placeholder {
  color: #888888;
}

  </style>
</head>
<header style="margin-bottom: 20px;">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="{{ asset('images/getpcms.png') }}" alt="Logo" class="logo-img"
            style="border-radius: 60px; height: 120px; width: 120px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{ url('/scanBarcode') }}" class="nav-link">HOME</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/download-code') }}" class="nav-link">Download</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/register/pc/owners') }}" class="nav-link">ADD</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/ud-operation') }}" class="nav-link">Task</a>
            </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-link nav-link">LOGOUT</button>
                </form>
            </li>
            <li class="nav-item">
                <form id="barcodeForm" action="{{ route('pcregisters.searchUser') }}" method="post"
                    class="form-inline">
                    @csrf
                    <div class="input-group">
                        <input id="user_id" type="text"
                            class="form-control @error('user_id') is-invalid @enderror" name="user_id"
                            value="{{ old('user_id') }}" required autofocus>
                        @error('user_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </form>
            </li>
            <li class="nav-item">
                <a href="{{ route('profile.show') }}" class="nav-link"><img
                        src="{{ asset('images/admin.jpg') }}" alt=""
                        style="height:40px; width:40px; border-radius:20px;"><br>{{ Auth::user()->name }}</a>
            </li>
            <script>
                // Automatically submit the form when a barcode is scanned
                document.getElementById('user_id').addEventListener('input', function(event) {
                    document.getElementById('barcodeForm').submit();
                });
            </script>

    @if (session('message'))
        <div class="alert alert-danger mt-2">
            {{ session('message') }}
        </div>
    @endif
</li>


        </ul>
    </div>
</nav>
<div class="scroll-indicator-container">
    <div class="scroll-indicator-bar"></div>
  </div>
</header>