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

        .input-group {
            margin-bottom: 15px;
        }

        .input-group input,
        .input-group select {
            max-width: 250px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group select {
            max-width: 250px;
        }

        .home {
            text-align: center;
            margin-bottom: 30px;
        }

        .content {
            overflow-x: auto;
        }
        .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.input-flex-container {
    display: flex;
    flex-wrap: wrap;
    margin-bottom: 20px;
}

.input-group,
.form-group {
    margin-right: 10px;
    margin-bottom: 10px;
}

.input-group input,
.form-group select {
    max-width: 200px;
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
    <div class="container">
        @include('sweetalert::alert')
        <section class="content">
        <div class="input-flex-container">
    <form action="{{ route('pcregisters.searchUpdate') }}" method="post" class="ml-auto mr-auto">
        @csrf
        <div class="input-group">
            <input id="srch" type="text" class="form-control mr-2 @error('user_id') is-invalid @enderror"
                name="user_id" value="{{ old('user_id') }}" required autofocus placeholder="Search by user id">
            @error('user_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search mr-1"></i> <!-- Added margin class -->
                </button>
            </div>
        </div>
    </form>

    <form action="{{ route('setRowsPerPage') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="rowsPerPage" class="mr-2">Rows</label>
            <select name="rowsPerPage" id="rowsPerPage" class="form-control">
                <option value="5" {{ $rowsPerPage == 5 ? 'selected' : '' }}>5</option>
                <option value="10" {{ $rowsPerPage == 10 ? 'selected' : '' }}>10</option>
                <option value="20" {{ $rowsPerPage == 20 ? 'selected' : '' }}>20</option>
                <!-- Add more options as needed -->
            </select>
            <br>
            <button type="submit" class="btn btn-primary ml-2">
                <i class="fas fa-check mr-1"></i> <!-- Added margin class -->
                Apply
            </button>
        </div>
    </form>

    <form action="{{ route('pcregisters.filterByDescription') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="descriptionFilter" class="mr-2">Filter by Description:</label>
            <select name="descriptionFilter" id="descriptionFilter" class="form-control">
                <option value="">All</option>
                <option value="guest">Guest</option>
                <option value="student">Student</option>
                <option value="staff">Staff</option>
            </select>
            <br>
            <button type="submit" class="btn btn-primary ml-2">
                <i class="fas fa-filter mr-1"></i> <!-- Added margin class -->
                Filter
            </button>
        </div>
    </form>
</div>


            <table class="table table-striped">
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
                    @foreach($pcregisters as $pcregister)
                    <tr>
                        <td>{{ $pcregister->user_id }}</td>
                        <td>{{ $pcregister->username }}</td>
                        <td>{{ $pcregister->description }}</td>
                        <td>{{ $pcregister->pc_name }}</td>
                        <td>{{ $pcregister->serial_number }}</td>
                        <td>
                            @if(isset($pcregister->photo) && $pcregister->photo)
                            <img src="{{ asset( $pcregister->photo) }}" alt="Photo" style="width: 150px; height: 120px;">
                            @else
                            No photo available
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('edit/' . $pcregister['id']) }}" class="btn btn-primary edit-button">
                                <i class="fas fa-edit"></i> <!-- Edit Icon -->
                            </a>
                        </td>
                        <td>
                            <a onClick="confirmation(event)" href="{{ url('delete/' . $pcregister['id']) }}"
                                class="btn btn-danger delete-button">
                                <i class="fas fa-trash-alt"></i> <!-- Delete Icon -->
                            </a>
                        </td>
                    </tr>
                    @endforeach
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

