<!--
=========================================================
* Argon Dashboard PRO - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HorizonPanel') }} - {{ ucfirst(Request::segment(1)) }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Icons -->
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- Styles -->
    <link href="{{ asset('assets/css/argon.css') }}" rel="stylesheet">
</head>

<body>
    <nav id="navbar-main" class="navbar navbar-horizontal bg-default navbar-main navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                @if( config('horizonapp.logo') )
                <img src="{{ config('horizonapp.logo') }}" alt="{{ config('app.name', 'HorizonPanel') }} logo">
                @else
                <h3 class="text-white">{{ config('app.name', 'HorizonPanel') }}</h3>
                @endif
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse"
                aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="{{ url('/') }}">
                                @if( config('app.logo') )
                                <img src="{{ config('app.logo') }}" alt="{{ config('app.name', 'HorizonPanel') }} logo">
                                @else
                                <h3>{{ config('app.name', 'HorizonPanel') }}</h3>
                                @endif
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>

                <?php 
            /*
            
            |--------------------------------------------------------------------------
            | Example navigation button
            |--------------------------------------------------------------------------
            |
            | Flat navigation button aligned to the left towards the brand name/logo
            | 
            | 
            |
    
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a href="../../pages/examples/lock.html" class="nav-link">
                  <span class="nav-link-inner--text">Lock</span>
                </a>
              </li>
            </ul>
            */ 
            
            ?>


                <hr class="d-lg-none" />
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                    <?php 
            /*
                
            |--------------------------------------------------------------------------
            | Example social media button
            |--------------------------------------------------------------------------
            |
            | Flat small button with only the social media logo
            | 
            | 
            |

              <li class="nav-item">
                <a class="nav-link nav-link-icon" href="https://www.twitter.com/hostinghorizon" target="_blank" data-toggle="tooltip" data-original-title="Follow us on twitter">
                  <i class="fab fa-twitter"></i>
                  <span class="nav-link-inner--text d-lg-none">Twitter</span>
                </a>
              </li>
            
            */
            ?>
                    @guest
                    <li class="nav-item d-lg-block">
                        <a href="{{ route('login') }}"
                            class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon">
                                <i class="fas fa-sign-in-alt"></i>
                            </span>
                            <span class="nav-link-inner--text">@lang('Login')</span>
                        </a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item d-lg-block">
                        <a href="{{ route('register') }}"
                            class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon">
                                <i class="fas fa-user-circle"></i>
                            </span>
                            <span class="nav-link-inner--text">@lang('Register')</span>
                        </a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link text-white" data-toggle="dropdown" role="button">
                            <i class="fas fa-user-circle"></i>
                            <span class="nav-link-inner--text">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                @lang('Logout')
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest

                </ul>
            </div>
        </div>
    </nav>


    <main class="py-4">
        @yield('content')
    </main>

    <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('assets/js/argon.js') }}"></script>
</body>

</html>