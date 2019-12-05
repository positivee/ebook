@extends('master')
@section('content')

<article class="blog-post px-3 py-5 p-md-5">
    <div class="container">
        <header class="blog-post-header">
            <h2 class="title mb-2">Testowany jest tutaj artykuł</h2>
            <div class="mb-3">
                <span class="date">Opublikowano: 20-45-2019</span>
                <span class="float-right"> Księgarnia: EMPIK</span>
            </div>
        </header>

        <div class="blog-post-body">
            <figure class="figure">
                <a href="#"><img class="img-fluid" src="img/side-panel.jpg" alt="image"></a>
                <figcaption class="figure-caption text-center">Zdjęcie do artykułu.</figcaption>
            </figure>

            <h3 class="mt-5 mb-2">{{$article->title }}</h3>
            <p class="text-justify"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. </p>
        </div>


    </div>

    <div class="btn-group btn-group-justified col-12 my-5">
        <a href="#" class="btn btn-success mr-1">Poprzedni Artykuł</a>

        <a href="#" class="btn btn-success">Następny Artykuł</a>
    </div>


</article>

@stop
