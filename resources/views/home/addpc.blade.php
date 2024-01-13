<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="{{ asset('home/css/security.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .cont {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        } 

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        } */
/* 
        button[type="submit"]:hover {
            background-color: #45a049;
        } */

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <!-- header start -->
    @include('home.navbar')
    <!-- header end -->
    <div style="height:150px;"></div>
    <div class="cont">
        @include('sweetalert::alert')
        <h1 style="color:blue;">Register</h1>

        <form method="POST" action="{{ route('pcregisters.store') }}" enctype="multipart/form-data">
            @csrf

            <label for="user_id">User ID:</label>
            <input type="text" name="user_id" id="user_id">
            @error('user_id')
            <span class="error">{{ $message }}</span>
            @enderror

            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
            @error('username')
            <span class="error">{{ $message }}</span>
            @enderror

            <label for="description">Description:</label>
            <select name="description" id="description">
                <option value="Staff">Staff</option>
                <option value="Student">Student</option>
                <option value="Guest">Guest</option>
            </select>
            @error('description')
            <span class="error">{{ $message }}</span>
            @enderror


           <br></br> <label for="pc_name">PC Name:</label>
            <input type="text" name="pc_name" id="pc_name">
            @error('pc_name')
            <span class="error">{{ $message }}</span>
            @enderror

            <label for="serial_number">Serial Number:</label>
            <input type="text" name="serial_number" id="serial_number">
            @error('serial_number')
            <span class="error">{{ $message }}</span>
            @enderror

            <label for="photo">Photo:</label>
            <div class="row">
                <div class="col-md-6">
                    <div id="my_camera"></div>
                    <br />
                    <input  style="border-radius:10px; padding:7px;"type=button value="Take Snapshot" onClick="take_snapshot()">
                    <input type="hidden" name="photo" class="image-tag" id="photo">
                </div>
                <div class="col-md-6">
                    <div id="results"></div>
                </div>
            </div>

            <div class="text-center">
                <button style="border-radius:10px; width:80px; bgColor:blue; border:0 0 0;"type="submit">Save</button>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <script>
        Webcam.set({
            width: 490,
            height: 350,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        Webcam.attach('#my_camera');

        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
            });
        }
    </script>
    <br>
    <hr>
@include('home.footer')
<script src="https://cdn.jsdelivr.net/npm/popper.js/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @yield('scripts') 
</body>
<script>
    @if(session('success'))
        Swal.fire('Success', '{{ session("success") }}', 'success');
    @endif

    @if(session('error'))
        Swal.fire('Error', '{{ session("error") }}', 'error');
    @endif
</script>
<script>
        // Sweetalert script code
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
                    title: "Are you sure you want to delete this PC registration?",
                    text: "You will not be able to revert this. The data will be automatically deleted from the database.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willCancel) => {
                    if (willCancel) {
                        window.location.href = urlToRedirect;
                    }
                });
        }

        // JavaScript for the scroll indicator bar
        window.addEventListener("scroll", () => {
            const indicatorBar = document.querySelector(".scroll-indicator-bar");
            const pageScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrollValue = (pageScroll / height) * 100;
            indicatorBar.style.width = scrollValue + "%";
        });

    //     // Responsive navigation menu toggle
    //     const menuBtn = document.querySelector(".nav-menu-btn");
    //     const closeBtn = document.querySelector(".nav-close-btn");
    //     const navigation = document.querySelector(".navigation");

    //     menuBtn.addEventListener("click", () => {
    //         navigation.classList.add("active");
    //     });

    //     closeBtn.addEventListener("click", () => {
    //         navigation.classList.remove("active");
    //     });
    // </script>

</html>
