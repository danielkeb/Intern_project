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
    <div class="fgh" style=" text-align:center;" >
                    
                       
                      <div style="text-align:center">              
                      @include('sweetalert::alert')
                      <section class="home">
    <h1 style="color: #4287f5; font-size: 32px; text-align: center; text-transform: uppercase; letter-spacing: 2px;">User Found</h1>
</section>

        <section class="content">
            <table>
                <thead>
                    <tr><th>Security Registered</th>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Description</th>
                        <th>PC Name</th>
                        <th>Serial Number</th>
                        
                        <th>Photo</th>
                        
                    </tr>
                </thead>
                <tbody>
            
                    <tr><td>{{$user->userid}}</td>
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
                        
                    </tr>
                    
                </tbody>
            </table>
        </section>
</div>
         </div> 
         @include('admin.footer')
    </body>


</html>