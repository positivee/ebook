@extends('master')
@section('content')

<article class="blog-post px-3 py-5 p-md-5">
    <div class="container">
        <header class="blog-post-header">
            <hr>
            <h2 class="title mb-2">Artykuł</h2>
            <div class="mb-3">
                <span class="date">Opublikowano: {{Str::limit($article->created_at,10,$end = '')}} </span>
                <span class="float-right"> Księgarnia: {{$BookStoreName->name  }} </span>
            </div>
        </header>

        <div class="blog-post-body">
            <figure class="text-center">
                <img class="img-fluid" src="{{$article->photo}}" alt="image">
                <figcaption class="figure-caption text-center"></figcaption>
            </figure>

            <h3 class="mt-5 mb-2">{{$article->title}}</h3>
            <p class="text-justify">{{$article->content}}</p>
        </div>


    </div>

    <div class="btn-group btn-group-justified col-12 my-5">
        <a href="/article/{{ $article->id - 1 }}" class="btn btn-success mr-1">Poprzedni Artykuł</a>

        <a href="/article/{{ $article->id + 1 }}" class="btn btn-success">Następny Artykuł</a>
    </div>


</article>

@stop
