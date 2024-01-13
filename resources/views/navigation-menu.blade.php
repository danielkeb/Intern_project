<head>
    <style>
        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            padding: 0;
        }

        .navbar-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 64px;
        }

        .logo {
            flex-shrink: 0;
        }

        .navigation-links {
            display: none;
        }

        .nav-list {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-item {
            margin-right: 16px;
        }

        .user-profile {
            display: flex;
            align-items: center;
        }

        .profile-photo {
            margin-right: 12px;
        }

        .profile-image {
            height: 32px;
            width: 32px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-name {
            position: relative;
        }

        .profile-button {
            background-color: transparent;
            border: none;
            color: #4b5563;
            font-size: 14px;
            font-weight: 500;
            padding: 4px 8px;
            cursor: pointer;
        }

        .profile-icon {
            height: 16px;
            width: 16px;
            margin-left: 4px;
            vertical-align: middle;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            z-index: 10;
            background-color: #ffffff;
            border-radius: 4px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
            display: none;
        }

        .dropdown-list {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .dropdown-item {
            padding: 8px 16px;
        }

        .dropdown-item a {
            display: block;
            color: #374151;
            text-decoration: none;
            font-size: 14px;
        }

        .logout-button {
            background-color: transparent;
            border: none;
            color: #374151;
            font-size: 14px;
            padding: 0;
            cursor: pointer;
        }

        /* Responsive styles */
        @media (min-width: 640px) {
            .navigation-links {
                display: flex;
            }

            .user-profile {
                position: relative;
            }

            .dropdown-menu {
                position: absolute;
                top: 100%;
                right: -8px;
            }
        }
    </style>
</head>


    
        <div class="user-profile">
    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        
    @else
        <div class="profile-name">
           
            <div class="dropdown-menu" aria-labelledby="profileDropdown">
                <ul class="dropdown-list">
                    <li class="dropdown-item">
                        <a href="{{ route('profile.show') }}">{{ __('Profile') }}</a>
                    </li>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <li class="dropdown-item">
                            <a href="{{ route('api-tokens.index') }}">{{ __('API Tokens') }}</a>
                        </li>
                    @endif

                    <li class="dropdown-item">
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <button type="submit" class="logout-button">{{ __('Log Out') }}</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    @endif
</div>

    

