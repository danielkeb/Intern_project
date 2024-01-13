<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Add your custom CSS files if needed -->
    <link rel="stylesheet" href="{{ asset('dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('jscript.js') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  </head>
  <body>
     <input type="checkbox" id="check">
    
    <!--header area start-->
    @include('admin.header');
    <!--header area end-->
    <!--sidebar start-->
    @include('admin.sidebar');
    <!--sidebar end-->
        <div class="content" >
            <div class="container-fluid px-4">

                     <div class="card-footer d-flex align-items-center justify-content-between">
                                 <a class="small text-white stretched-link" href="{{url('permission')}}">Permission</a>
                                    <div class="small text-white clickable-icon"><i class="fas fa-angle-right"></i>
                                        <div class="admin-details">
                                            <!-- Admin Details Content -->
                                           
                                    </div>
                            </div>
                   </div>
</div>
    </body>


</html>