@extends('master')
@section('content')

    <div class="container">

        <!-- Page Heading -->
        <h1 class="my-4">
            <small>Nasze oferty</small>
        </h1>

        <div class="row">

            @foreach($offers as $offer)

              {{--  <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top d-block mx-auto p-1 image-size" src="{{$offer->getPicture()}}?showinfo=0" frameborder="0" alt="" ></a>

                        <div class="card-body d-flex flex-column">

                            <h4 class="card-title">
                                <a href="#">{{ $offer->getTitle() }}</a>
                            </h4>
                            <p class="card-text">Autor: {{$offer->getAuthorName() ." ".$offer->getAuthorSurname()}}</p>
                            <p class="card-text">Cena: {{$offer->getPrice()  . " zł"}}</p>
                            <p class="card-text">Ważne od: {{$offer->getDateFrom()->format('Y-m-d')}}</p>
                            <p class="card-text">Ważne do: {{$offer->getDateTo()->format('Y-m-d')}}</p>

                            <a href="#" class="btn btn-primary mt-auto">Sprawdź szczegóły</a>
                        </div>
                    </div>
                </div>--}}

                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top d-block mx-auto p-1 image-size" src="{{$offer->getPicture()}}?showinfo=0" frameborder="0" alt="" ></a>

                        <div class="card-body d-flex flex-column">

                            <h4 class="card-title">
                                <a href="#">{{ $offer->getTitle() }}</a>
                            </h4>

                            <dl>
                                <dt>Autor:</dt>
                                <dd><p >{{$offer->getAuthorName() ." ".$offer->getAuthorSurname()}}</p></dd>
                            </dl>
                            <dl>
                                <dt>Cena:</dt>
                                <dd><p>{{$offer->getPrice()  . " zł"}}</p></dd>
                            </dl>
                                <dl>
                                    <dt>Ważne od:</dt>
                                    <dd><p>{{$offer->getDateFrom()->format('Y-m-d')}}</p></dd>
                                </dl>
                                <dl>
                                    <dt>Ważne do:</dt>
                                    <dd><p>{{$offer->getDateTo()->format('Y-m-d')}}</p></dd>
                                </dl>

                            <div class="btn-group text-center" role="group" aria-label="buttons">
                                <a href="/offer/{{$offer->getBook()->id}}" class="btn btn-primary">
                                    <i class="fa fa-search mr-1" aria-hidden="true"></i>Sprawdź
                                </a>
                                <a href="#" class="btn btn-success">
                                    <i class="fa fa-pencil " aria-hidden="true"></i>
                                </a>
                                <a href="#" class="btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </div>


                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </div>


@stop
