@extends('master_bookstore')
@section('content')

    <div class="videos-header card">
        <h2>Wszystkie książki</h2>
    </div>
    <div class="row">

    @foreach($books as $book)

        <!-- Single book -->
            <div class="col-xs-12 col-md-6 col-lg-4 single-video">
                <div class="card">

                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{$book->getPicture()}}?showinfo=0" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="card-content">
                        <a href="">
                            <h4>{{ $book->getTitle() }}</h4>
                        </a>
                        <p>{{ $book->getDescription() }}</p>
                        <span class="upper-label">ID Książki</span>
                        <span class="video-author">{{$book->getId()}}</span>
                        <span class="upper-label">Autor</span>
                        <span class="video-author">{{$book->getAuthorName() . " " . $book->getAuthorSurname()}}</span>
                        <span class="upper-label">Rok wydania</span>
                        <span class="video-author">{{$book->getYear()}}</span>
                        <span class="upper-label">Wydawnictwo</span>
                        <span class="video-author">{{$book->getPrint()}}</span>
                        <span class="upper-label">Numer ISBN</span>
                        <span class="video-author">{{$book->getIsbnNumber()}}</span>
                        <span class="upper-label">Kategoria</span>
                        <span class="video-author">{{$book->getCategory()->name}}</span>
                    </div>

                </div>
            </div>

        @endforeach

    </div>



@stop



