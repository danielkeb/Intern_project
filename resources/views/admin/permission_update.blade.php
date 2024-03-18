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
@include('admin.header');
    <!--header area end-->
    <!--sidebar start-->
    @include('admin.sidebar');
    <div style="height:100px;"></div>

    <div class="update-container">
<h2>  Permission Management Page</h2>
      <br>
       
       <li>  Admin Permission :   1</li> <br>
       <li> Security permission : 0</li> <br>
       <li> Revoke permission :   2</li><br>
         
       <br>
    <form action="{{ route('admin.update') }}" method="POST" >
        @csrf
        <label for="user">Select User By User Id:</label>
        <select name="user_id" id="user" onchange="updateUserType(this)">
           
                <option value="{{ $user->id }}" data-usertype="{{ $user->usertype }}">{{ $user->userid }}</option>
            
            
        </select>
       
        <label for="usertype">User Type:</label>
        <input type="text" name="usertype" id="usertype" value="{{$user->usertype}}">
        <br><br>
        <button type="submit"  onclick="container()">Grant or Revoke</button>
    </form>
    
</div>


<script>
   


    function updateUserType(selectElement) {
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        var userTypeInput = document.getElementById('usertype');
        userTypeInput.value = selectedOption.getAttribute('data-usertype');
    }

    // function container(){
    //     var showMessage=document.querySelector('.message-container');
        
    //     showMessage..innerHTML='Activity Successed!!';
    // }

    
</script>





   
@include('admin.footer')
</body>
</html>