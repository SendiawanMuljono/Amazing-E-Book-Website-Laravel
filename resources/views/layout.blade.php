<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/circletext.css') }}">

        <title>{{ __($title) }}</title>
    </head>
    <body class="mb-5">
        <div class="d-flex justify-content-between bg-info p-3">
            <div class="d-flex align-items-center">
                @if (Config::get('app.locale') == 'en')
                    <input class="form-check-input" type="radio" name="lang" value="1" onclick="window.location='/lang/en';" checked disabled>&nbsp;{{ __('English') }}&nbsp;
                    <input class="form-check-input" type="radio" name="lang" value="2" onclick="window.location='/lang/id';">&nbsp;{{ __('Bahasa') }}
                @else
                    <input class="form-check-input" type="radio" name="lang" value="1" onclick="window.location='/lang/en';">&nbsp;{{ __('English') }}&nbsp;
                    <input class="form-check-input" type="radio" name="lang" value="2" onclick="window.location='/lang/id';"  checked disabled>&nbsp;{{ __('Bahasa') }}
                @endif
            </div>
            <div class="ms-auto me-auto">
                <h2>Amazing E-Book</h2>
            </div>
            <div>
                <div class="d-flex">
                    @if (!Auth::guard('account')->check())
                        <a href="/signup">
                            <button class="btn btn-warning me-2" type="submit">{{ __('Sign Up') }}</button>
                        </a>
                        <a href="/login">
                            <button class="btn btn-warning" type="submit">{{ __('Log In') }}</button>
                        </a>
                    @else
                        <a href="/logout">
                            <button class="btn btn-warning" type="submit">{{ __('Log Out') }}</button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
        @if (Auth::guard('account')->check())
            <div class="d-flex justify-content-center bg-warning">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="navbar-collapse" id="navbarNavDropdown">
                            <ul class="nav">
                                @if (Request::is('home*'))
                                    <li class="nav-item">
                                        <u><a class="nav-link text-dark fw-bold" href="/home">{{ __('Home') }}</a></u>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link text-dark fw-bold" href="/home">{{ __('Home') }}</a>
                                    </li>
                                @endif
                                @if (Request::is('cart*'))
                                    <li class="nav-item">
                                        <u><a class="nav-link text-dark fw-bold" href="/cart">{{ __('Cart') }}</a></u>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link text-dark fw-bold" href="/cart">{{ __('Cart') }}</a>
                                    </li>
                                @endif
                                @if (Request::is('profile*'))
                                    <li class="nav-item">
                                        <u><a class="nav-link text-dark fw-bold" href="/profile">{{ __('Profile') }}</a></u>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link text-dark fw-bold" href="/profile">{{ __('Profile') }}</a>
                                    </li>
                                @endif
                                @if (Auth::guard('account')->user()->role_id == 1)
                                    @if (Request::is('accmaintenance*'))
                                        <li class="nav-item">
                                            <u><a class="nav-link text-dark fw-bold" href="/accmaintenance">{{ __('Account Maintenance') }}</a></u>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link text-dark fw-bold" href="/accmaintenance">{{ __('Account Maintenance') }}</a>
                                        </li>
                                    @endif
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        @endif
        <div class="container-fluid mt-4 mb-4">
            @yield('yieldPlace')
        </div>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
    <footer class="bg-white">
        <div class="d-flex fixed-bottom justify-content-center bg-info p-2">© Amazing E-Book 2022</div>
    </footer>
</html>
