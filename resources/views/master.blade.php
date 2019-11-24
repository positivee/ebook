<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Księgarnia</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700&subset=latin,latin-ext" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="{{\Illuminate\Support\Facades\URL::asset('custom.css')}}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">


</head>


<body id="app-layout">

<div class="mynav">
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <a class="navbar-brand" href="#"><img src="{{ asset('img/open-book.png') }}" width="30" height="30" class="d-inline-block mr-1 align-bottom" alt=""> E-księgarnia</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class=" ml-auto justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{'/welcome'}}">Aktualności <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{'/offers'}}">Książki</a></li>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{'/search'}}">Wyszukiwarka zaawansowana</a></li>
                    </li>

                    {{--<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>--}} {{-- wysuwane jak będzie potrzebne--}}
                </ul>
            </div>
            <div class="ml-auto">{{--do prawej--}}
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link " href="{{'/login'}}">Logowanie</a></li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link reg-color" href="{{'/register'}}">Zarejestruj się</a></li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="banner mt-5">
        <div class="container h-100">
            <div class="row h-100  no-gutter align-items-center ">
                <div class="col-12 text-center">
                    <h1 class="logo-text mb-5">Znajdz swoją książkę</h1>
                    <form  method="POST" action="{{'/search/findByElastic'}}">
                        @csrf
                        <div class="form-row justify-content-center">
                            <input class="form-control-lg " name="query"  type="text" placeholder="Wpisz czego szukasz">
                            <button class="btn btn-lg btn-primary btn-login text-uppercase font-weight-bold " type="submit">{{ __('Szukaj książki') }}</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="site-wrappper">


    <!-- .container -->
    <div class="container site-content">

        @yield('content')

    </div><!-- end of .container -->

</div><!-- end of wrapper -->


<!-- Footer -->
<footer class="site-footer">
    <div class="container">
        <p>&copy; Ola</p>
    </div>
</footer>


<!-- JavaScripts -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
