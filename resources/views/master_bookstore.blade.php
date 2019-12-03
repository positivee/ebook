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

        <div class="collapse navbar-collapse mr-lg-5" id="navbarSupportedContent">
            <div class="ml-auto">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{'/bookstore/welcome'}}">Aktualności <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{'/bookstore/books'}}">Baza Książek</a></li>
                    </li>

                    <li class="nav-item mr-5">
                        <a class="nav-link" href="{{'/bookstore/offers'}}">Nasze Oferty</a></li>
                    </li>

                    <li class="nav-item dropdown mr-5">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Opcje
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{'/bookstore/addarticle'}}">Dodaj Aktualność</a>
                            <a class="dropdown-item" href="{{'/bookstore/addbook'}}">Dodaj Książkę</a>
                            <a class="dropdown-item" href="{{'/bookstore/addoffer'}}">Dodaj Ofertę</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{'/logout'}}">Wyloguj</a>
                        </div>
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
        @yield('articles')

    </div><!-- end of .container -->

</div><!-- end of wrapper -->


<!-- Site footer -->
<footer class="site-footer mt-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h6>O nas</h6>
                <p class="text-justify">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6 class="color">Quick Links</h6>
                <ul class="footer-links">
                    <li><a href="http://scanfcode.com/about/">Aktualności</a></li>
                    <li><a href="http://scanfcode.com/contact/">Zaloguj się</a></li>
                    <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Zarejestruj się</a></li>
                    <li><a href="http://scanfcode.com/privacy-policy/">Książki</a></li>
                </ul>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6 class="color">Gdzię się mieścimy</h6>
                <p>Polska</p>
                <p>Lublin, 20-452</p>
                <p>Tel: 779-779-779</p>
                <p>E-mail: kontakt@kontakt.pl</p>
            </div>

        </div>
        <hr>
    </div>
    <p class="copyright-text text-center">
        Copyright &copy; Inżynierka.
    </p>


    </div>
</footer>


<!-- JavaScripts -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

