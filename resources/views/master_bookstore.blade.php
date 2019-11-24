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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{\Illuminate\Support\Facades\URL::asset('custom.css')}}" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>


        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{'/bookstore/welcome'}}">Aktualności</a></li>
                <li><a href="{{'/bookstore/books'}}">Baza Książek</a></li>
                <li><a href="{{'/bookstore/offers'}}">Nasze Oferty</a></li>
                <li><a href="{{'/bookstore/addbook'}}">Dodaj książkę</a></li>
                <li><a href="{{'/bookstore/addoffer'}}">Dodaj ofertę</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                <li><a href="{{'/logout'}}">Wyloguj</a></li>
            </ul>
        </div>

    </div>
</nav>

<!-- wrapper -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
