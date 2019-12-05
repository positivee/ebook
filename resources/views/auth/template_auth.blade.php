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



</head>

<body>
<div class="container-fluid">
    <div class="row no-gutter">
        <div class="col-md-4 col-lg-6 bg-image">

            {{--LEFT SIDE --}}


        </div>
        <div class="col-md-8 col-lg-6">
            {{-- RIGHT SIDE --}}


            <div class="login d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 mx-auto">
                            <div class="text-left mb-1">
                                <a class="" href="/welcome">	&larr; Wróć do strony głównej</a></div>
                            </form>

                            @yield('panel')


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
