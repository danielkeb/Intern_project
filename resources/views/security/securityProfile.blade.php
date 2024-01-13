<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    
    <style>
    /* CSS */
input[name="user_id"] {
  background-color: #f8f8f8;
  border: 1px solid #dddddd;
  border-radius: 5px;
  padding: 5px 10px;
  font-size: 14px;
}
header{
  background-color:#fff;
  box-shadow:0 2px 4px rgba(0,0,0,0.1);

}
/* CSS */
input[name="user_id"]::placeholder {
  color: #888888;
}

  </style>
</style>

</head>



  <body>
    <!--header area end-->
    <!--sidebar start-->
    @include('home.navbar');
    <div style="height:100px;"></div>

    <x-app-layout>
   

   <div class="container mx-auto py-10 px-4 sm:px-6 lg:px-8">
       <div class="max-w-3xl mx-auto">
           @if (Laravel\Fortify\Features::canUpdateProfileInformation())
               <div class="mt-8">
                   @livewire('security.update-profile-information-form')
               </div>

               <hr class="my-8">
           @endif

           @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
               <div class="mt-8">
                   @livewire('security.update-password-form')
               </div>

               <hr class="my-8">
           @endif

           @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
               <hr class="my-8">

               <div class="mt-8">
                   @livewire('security.delete-user-form')
               </div>
           @endif
       </div>
   </div>
</x-app-layout>


   
@include('home.footer')
</body>
</html>
