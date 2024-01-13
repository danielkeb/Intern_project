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

    <x-app-layout>
   

   <div class="container mx-auto py-10 px-4 sm:px-6 lg:px-8">
       <div class="max-w-3xl mx-auto">
           @if (Laravel\Fortify\Features::canUpdateProfileInformation())
               <div class="mt-8">
                   @livewire('profile.update-profile-information-form')
               </div>

               <hr class="my-8">
           @endif

           @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
               <div class="mt-8">
                   @livewire('profile.update-password-form')
               </div>

               <hr class="my-8">
           @endif

           @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
               <hr class="my-8">

               <div class="mt-8">
                   @livewire('profile.delete-user-form')
               </div>
           @endif
       </div>
   </div>
</x-app-layout>


   
@include('admin.footer')
</body>
</html>
