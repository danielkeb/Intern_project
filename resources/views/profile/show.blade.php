<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <x-app-layout>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Update Profile Information</div>
            <div class="card-body">
              @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')
              @endif
            </div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center mt-3">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Change Password</div>
            <div class="card-body">
              @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                @livewire('profile.update-password-form')
              @endif
            </div>
          </div>
        </div>
      </div>

      <!-- Commented out code for account deletion features -->
      <!--
      <div class="row justify-content-center mt-3">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Delete Account</div>
            <div class="card-body">
              @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                @livewire('profile.delete-user-form')
              @endif
            </div>
          </div>
        </div>
      </div>
      -->

    </div>
  </x-app-layout>

  <!-- Include Bootstrap JS (optional, if you need Bootstrap JavaScript functionality) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Add your custom CSS styles here -->
  <style>
    /* Example custom CSS styles */
    .card {
      margin-top: 20px;
    }
    .card-header {
      background-color: #007BFF;
      color: #fff;
      align-self:center;
    }
    .btn-primary {
      background-color: #007BFF;
    }
    /* Add more custom styles as needed */
  </style>
</body>
</html>
