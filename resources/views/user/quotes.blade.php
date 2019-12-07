@extends('master')
@section('content')


    <div class="p-3">
        <h2>Cytaty naszych użytkowników</h2>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="row">

      {{--  @foreach($allQuotes as $quote)
            <div class="col-md-6">
                <div class="card mb-3 quote">
                    <div class="card-body">
                        <p class="card-title">
                            Książka <a class="" href="#"> {{$quote->getBookTitle()}}</a> autora <a class="" href="#"> {{$quote->getBookAuthorName() ." ".$quote->getBookAuthorSurname()}}</a>
                        </p>
                        <p class="card-text font-italic">"{{$quote->getContent()}}"</p>
                    </div>
                </div>
            </div>
        @endforeach--}}

        @foreach($allQuotes as $quote)
            <div class="col-lg-6">
                <blockquote class="quote-card shadow my-3 ">
                    <cite class="col-9 text-justify">
                        {{$quote->getContent()}} Lorem ipsuem  Lorem ipsuem Lorem ipsuem Lorem ipsuem Lorem ipsuem Lorem ipsuem Lorem ipsu.
                    </cite>
                    <p>
                        Z Książki {{$quote->getBookTitle()}} autora {{$quote->getBookAuthorName() ." ".$quote->getBookAuthorSurname()}}
                    </p>
                </blockquote>
            </div>
        @endforeach

    </div>





@stop
