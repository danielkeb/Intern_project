<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS */
        input[name="user_id"] {
            background-color: #f8f8f8;
            border: 1px solid #dddddd;
            border-radius: 5px;
            padding: 5px 10px;
            font-size: 14px;
        }

        input[name="user_id"]::placeholder {
            color: #888888;
        }

        /* Adjusted Navbar Height */
        .navbar {
            min-height: 60px; /* Adjust this value as needed */
            max-height: 60px;
        }

        /* Optional: Adjust Logo Height */
        .logo-img {
            height: 60px; /* Adjust this value to maintain aspect ratio */
            width: auto;
        }

        header {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px; /* Add margin to create space between header and other elements */
            position: relative; /* Set position to relative */
        }

        /* Navigation overlay */
        .nav-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 50, 0.8); /* Deep blue background with opacity */
            z-index: 999; /* Ensure it's above other content */
            display: none; /* Initially hidden */
        }

        /* Navigation toggle button */
        .nav-toggle-btn {
            display: none; /* Hide toggle button by default on larger screens */
        }

        @media (max-width: 767.98px) {
            /* Show toggle button on smaller screens */
            .nav-toggle-btn {
                display: block;
            }
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/getpcms.png') }}" alt="Logo" class="logo-img" style="border-radius: 60px;">
            </a>
            <button class="navbar-toggler nav-toggle-btn" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
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
                </ul>
            </div>
        </nav>
    </header>

    <!-- Your content goes here -->

    <!-- Bootstrap scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <!-- Your custom scripts -->
    <!-- Script for toggling navigation -->
    <!-- <script>
        // Function to toggle navigation menu and overlay
        function toggleNavigation() {
            var navbarNav = document.getElementById("navbarNav");
            var navOverlay = document.querySelector(".nav-overlay");
            navbarNav.classList.toggle("show");
            navOverlay.classList.toggle("show-overlay");
        }
        
    </script> -->
</body>
