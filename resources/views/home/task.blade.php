<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    @include('home.header')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .delete-button {
            background-color: #FF0000;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
            color: #FFFFFF;
        }

        .edit-button {
            background-color: #FFFF00;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
            color: #000000;
        }

        .add-button {
            background-color: #00FF00;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
            color: #FFFFFF;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        .home {
            text-align: center;
            margin-bottom: 30px;
        }

        .content {
            overflow-x: auto;
        }

        @media (max-width: 767px) {
            table {
                font-size: 14px;
            }
        }

    </style>
</head>

<body>
    @include('home.navbar')
    <div style="height:150px;"></div>
    <div class="container">
    <section class="home">
    <h1 style="color: #4287f5; font-size: 32px; text-align: center; text-transform: uppercase; letter-spacing: 2px;">User Found!!</h1>
</section>
        @include('sweetalert::alert')
        <section class="content">
            <form action="{{ route('pcregisters.searchUpdate') }}" method="post" class="form-inline">
                @csrf
                <div class="input-group">
                <input id="user_id" type="text" class="form-control @error('user_id') is-invalid @enderror"
                    name="user_id" value="{{ old('user_id') }}" required autofocus placeholder="Search by user id">
                @error('user_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <button type="submit" class="btn btn-primary ml-2">
                    <i class="fas fa-search"></i>
                </button>
               </div>

            </form>
            <table>
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Description</th>
                        <th>PC Name</th>
                        <th>Serial Number</th>
                        <th>Photo</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                       
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <td>{{ $user->user_id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->description }}</td>
                        <td>{{ $user->pc_name }}</td>
                        <td>{{ $user->serial_number }}</td>
                        <td>
                        @if(isset($user->photo) && $user->photo)
                            <img src="{{ asset( $user->photo) }}" alt="Photo" style="width: 150px; height: 120px;">
                        @else
                            No photo available
                        @endif
                        </td>

                        <td>
                            <a href="{{ url('edit/' . $user['id']) }}"
                                class="btn btn-primary edit-button">Edit</a>
                        </td>
                        <td>
                            <a onClick="confirmation(event)" href="{{ url('delete/' . $user['id']) }}"
                                class="btn btn-danger delete-button">Delete</a>
                        </td>
                      
                    </tr>
                </tbody>
            </table>
        </section>
    </div>

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

        // Responsive navigation menu toggle
        const menuBtn = document.querySelector(".nav-menu-btn");
        const closeBtn = document.querySelector(".nav-close-btn");
        const navigation = document.querySelector(".navigation");

        menuBtn.addEventListener("click", () => {
            navigation.classList.add("active");
        });

        closeBtn.addEventListener("click", () => {
            navigation.classList.remove("active");
        });
    </script>
    <div style="height:200px;"></div>
    <br>
    <hr>
    @include('home.footer')
</body>

</html>
