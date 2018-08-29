<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'David Heffernan') }}</title>
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Custom fonts for this template -->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
        <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/resume.min.css') }}" rel="stylesheet">

        <!-- Bootstrap core JavaScript -->
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Plugin JavaScript -->
        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <!-- Custom scripts for this template -->
        <script src="{{ asset('js/resume.js') }}"></script>
        <script src="{{ asset('js/dropdown.js') }}"></script>
    </head>
    <body>
        <div id="page-top">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">
                    <span class="d-block d-lg-none">David Heffernan</span>
                    <span class="d-none d-lg-block">
                        <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/profile.jpg" alt="">
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                        @foreach($pages as $page)
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="#{{ $page->slug }}">{{ $page->header }}</a>
                            </li>
                        @endforeach
                        @if (Route::has('login'))
                            @auth
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="{{ url('/home') }}">Home</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link js-scroll-trigger" >Login</a>
                            </li>
                                <div class="dropdown-container">
                                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label text-md-right"  ></label>
                                            <div class="col-md-6">
                                                <input id="email" placeholder="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                                @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right"></label>
                                        <div class="col-md-6">
                                            <input id="password" placeholder="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>

                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @endauth
                            @endif
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="#">
                                <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="#">
                                <i class="fab fa-github"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
            </nav>

















            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>
