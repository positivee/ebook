@extends('master')
@section('content')

    <div class="container">

            <!-- Page Heading -->
            <h1 class="my-4">
                <hr>
                <small>Wszystkie książki</small>
            </h1>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">

               @foreach($books as $book)

                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="card h-100">

                            <div class="card-body d-flex flex-column">

                                <h4 class="card-title">
                                    <a href="#">{{ $book->getTitle() }}</a>
                                </h4>
                                <dl>
                                    <dt>ID Książki:</dt>
                                    <dd><p>{{$book->getId()}}</p></dd>
                                </dl>

                                <dl>
                                    <dt>Autor:</dt>
                                    <dd><p >{{$book->getAuthorName() ." ".$book->getAuthorSurname()}}</p></dd>
                                </dl>

                                <a href="/bookstore/book/{{$book->getId()}}" class="btn btn-primary mt-auto">Sprawdź szczegóły</a>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>

{{$pagination->links()}}
@stop
