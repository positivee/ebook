@extends('master_user')
@section('content')


    <div class="p-3">
        <h2>Cytaty naszych użytkowników</h2>
    </div>
    <div class="row">

        @foreach($allQuotes as $quote)
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
        @endforeach

    </div>





@stop
