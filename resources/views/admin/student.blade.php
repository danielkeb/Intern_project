<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Add your custom CSS files if needed -->
    <link rel="stylesheet" href="{{ asset('dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('jscript.js') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <style>
    .angle-icon.active {
        transform: rotate(90deg);
    }
    .stretched-link {
        flex-grow: 1;
        display: inline-block;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
</style>

</head>
<script>
    $(document).ready(function() {
        $('.angle-icon').click(function() {
            $(this).toggleClass('active');
            $(this).siblings('.stretched-link').toggle();
            $(this).closest('.card').find('.additional-content').slideToggle();
        });
    });
</script>


  <body>
     <input type="checkbox" id="check">
    
    <!--header area start-->
    @include('admin.header');
    <!--header area end-->
    <!--sidebar start-->
    @include('admin.sidebar');
    <!--sidebar end-->
    <div style="height:100px;"></div>
    <div class="fgh d-flex justify-content-center">
    <form id="barcodeForm" action="{{ route('search.view') }}" method="post" class="form-inline">
        @csrf
        <div class="input-group">
            <input id="user_id" type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ old('user_id') }}" placeholder="Search by PC user ID">
            @error('user_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">
                    Search
                </button>
            </div>
        </div>
    </form>
</div>

    <br>
    <br>
    <br>

                      <div style="text-align:center">              
                 <table >
                <thead>
                    <tr>
                    <th>Security Register</th>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Description</th>
                        <th>PC Name</th>
                        <th>Serial Number</th>
                        <th>Photo</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($pcregisters as $pcregister)
                    <tr>
                    <td>{{ $pcregister->userid }}</td>
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

                        
                      
                    </tr>
                    @endforeach
                </tbody> 
            </table>
</div>
         </div> 
         @include('admin.footer')
    </body>


</html>