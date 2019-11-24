@extends('master_user')
@section('content')

    <div class="videos-header card">
        <h2>Znalezione Oferty</h2>
    </div>

    <div class="row">

    @foreach($offers as $offer)

        <!-- Single offer -->
            <div class="col-xs-12 col-md-6 col-lg-4 single-video">
                <div class="card">

                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{$offer->getPicture()}}?showinfo=0" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="card-content">
                        <a href="">
                            <h4>{{ $offer->getTitle() }}</h4>
                        </a>
                        <span class="upper-label">Autor</span>
                        <span class="video-author">{{$offer->getAuthorName() ." ".$offer->getAuthorSurname()}}</span>
                        <span class="upper-label">Cena</span>
                        <span class="video-author">{{$offer->getPrice() . " zł"}}</span>
                        <span class="upper-label">Wydawnictwo</span>
                        <span class="video-author">{{$offer->getPrint()}}</span>
                        <span class="upper-label">Rok wydania</span>
                        <span class="video-author">{{$offer->getYear()}}</span>
                        <span class="upper-label">Opis</span>
                        <span class="video-author">{{$offer->getDescription()}}</span>
                        <span class="upper-label">Kategoria</span>
                        <span class="video-author">{{$offer->getCategory()->name}}</span>
                        <span class="upper-label">Księgarnia</span>
                        <span class="video-author">{{$offer->getBookstore()->name}}</span>
                        <span class="upper-label">Oferta ważna od</span>
                        <span class="video-author">{{$offer->getDateFrom()->format('Y-m-d')}}</span>
                        <span class="upper-label">Oferta ważna do</span>
                        <span class="video-author">{{$offer->getDateTo()->format('Y-m-d')}}</span>
                        <span class="upper-label">Kup teraz</span>
                        <span class="video-author">{{$offer->getLink()}}</span>


                    </div>

                </div>
            </div>
        @endforeach
    </div>
@stop