@extends('master')
@section('content')

    <div class="card my-5">
        <div class="row">
            <div class="col-md-6 row mx-auto justify-content-center align-items-center flex-column border-right">
                {{--  <div class="row mx-auto justify-content-center align-items-center flex-column ">    col d-flex align-items-center justify-content-center --}}
                <img  class="img-fluid m-2" src="{{$book->picture}}" >
                {{--      </div>--}}
            </div>
            <div class="col-md-6">
                <div class="card-body p-5">
                    <h3 class="title mb-1">{{$book->title}}</h3>
                    <hr>
                    <dl>
                        <dt>Opis Książki:</dt>
                        <dd><p>{{$book->description}}</p></dd>
                    </dl>
                    <dl>
                        <dt>Autor:</dt>
                        <dd>{{$book->author_name . " " . $book->author_surname}}</dd>
                    </dl>
                    <dl >
                        <dt>Rok wydania:</dt>
                        <dd>{{$book->year}}</dd>
                    </dl>
                    <dl >
                        <dt>Wydawnictwo:</dt>
                        <dd>{{$book->print}}</dd>
                    </dl>
                    <dl>
                        <dt>ISBN numer:</dt>
                        <dd>{{$book->isbn_number}}</dd>
                    </dl>
                    <dl>
                        <dt>Kategoria:</dt>
                        <dd>{{$bookCategory->name}}</dd>
                    </dl>
                    <hr>

                </div>
            </div>
        </div>
    </div>


@stop