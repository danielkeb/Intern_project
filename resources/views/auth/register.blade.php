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
    
    /* Custom Registration Page Styles */
    body {
        background-color: #f7fafc;
        font-family: Arial, sans-serif;
    }

    .registration-container {
        max-width: 400px;
        margin: 0 auto;
        padding: 40px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .registration-title {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .form-control {
        border: 1px solid #ddd;
        border-radius: 3px;
        padding: 10px;
        margin-bottom: 20px;
        width: 100%;
        color: #555;
    }

    .terms-label {
        font-size: 14px;
        margin-bottom: 20px;
        display: block;
        color: #666;
    }

    .terms-link {
        color: #666;
        text-decoration: underline;
        margin-left: 5px;
    }

    .login-link {
        font-size: 14px;
        color: #666;
        margin-bottom: 20px;
        display: block;
        text-align: right;
    }

    .submit-button {
        background-color: #ff5722;
        color: #fff;
        border: none;
        border-radius: 3px;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        width: 100%;
    }

    .submit-button:hover {
        background-color: #f44336;
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
    @include('sweetalert::alert')
<div class="text-center">
    <div class="registration-container">
        <div class="registration-title">Register</div>

        <form method="POST" action="{{ route('users.create') }}">
            @csrf

            <div class="mb-3">
                <input id="id" class="form-control" @error('userid') is-invalid @enderror" type="text" name="userid" :value="old('userid')" required autofocus autocomplete="name" placeholder="Id" />
                <span id="email-validation" class="text-muted"></span>
                @error('userid')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror
            </div>
            <div class="mb-3">
                <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name" />
                @error('name')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror
            </div>

            <div class="mb-3">
                <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email" />
                <span id="email-validation" class="text-muted"></span>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="mb-3">
                <input id="phone" class="form-control" type="number" name="phone" :value="old('phone')" required autocomplete="username" placeholder="Phone" />
                @error('phone')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror
            </div>

            <div class="mb-3">
                <input id="address" class="form-control" type="text" name="address" :value="old('address')" required autocomplete="username" placeholder="Address" />
                @error('address')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror
            </div>

            <div class="mb-3">
                <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" placeholder="Password" />
                @error('password')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror
            </div>

            <div class="mb-3">
    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" />
    <span id="password-validation" class="text-muted"></span>
    @error('password_confirmation')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <label class="terms-label">
                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="terms-link">'.__('Terms of Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="terms-link">'.__('Privacy Policy').'</a>',
                    ]) !!}
                </label>
            @endif

            <div class="mb-3 text-end">

                <button class="submit-button" type="submit">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</div>




   
@include('admin.footer')
<script>
$(document).ready(function () {
    $('#email').on('input', function () {
        var email = $(this).val();
        $.ajax({
            type: 'GET',
            url: '/check-email/' + email, // Replace with your route
            success: function (data) {
                if (data.exists) {
                    $('#email-validation').text('Email is available on Google.');
                } else {
                    $('#email-validation').text('Email is not available on Google.');
                }
            },
            error: function () {
               // $('#email-validation').text('Error occurred while checking email.');
            }
        });
    });
});
</script>



</body>
</html>
