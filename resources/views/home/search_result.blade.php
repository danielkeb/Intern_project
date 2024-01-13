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

       

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #4287f5;
            font-size: 32px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
      #detail{
        text-align:center;

      }
      
     img{
        width: 350px;
        height: 260px;;
     }

        .label-style {
            text-decoration: underline; /* Add underline to labels */
            font-weight: bold; /* Make labels bold */
        }

        @media (max-width: 767px) {
            
        }

    </style>
</head>

<body>
    @include('home.navbar')
    <div style="height:200px;"></div>
    <div class="contain">
        

        <div id="detail" >
            
            <div>
                @if(isset($user->photo) && $user->photo)
                <img src="{{ asset( $user->photo) }}" alt="Photo">
                @else
                No photo available
                @endif
            </div>

            <div>
                <span class="label-style">User ID:</span> {{ $user->user_id }}
            </div>
            <br>
            <div>
                <span class="label-style">Description:</span> {{ $user->description }}
            </div>
            <br>
            <div>
                <span class="label-style">PC Name:</span> {{ $user->pc_name }}
            </div>
            <br>
            <div>
                <span class="label-style">Serial Number:</span> {{ $user->serial_number }}
            </div>
      </div>
        
    </div>
    <br>
    <hr>
    @include('home.footer')
</body>

</html>
