@extends('master')
@section('content')

    <div class="container">

            <!-- Page Heading -->
            <h1 class="my-4">
                <small>Wszystkie książki</small>
            </h1>

            <div class="row">


               @foreach($books as $book)

                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="card h-100">
                            <a href="#"><img class="card-img-top d-block mx-auto p-1 image-size" src="{{$book->getPicture()}}?showinfo=0" frameborder="0" alt="" ></a>

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
            <!-- /.row -->
    {{--               <!-- Pagination -->
                   <ul class="pagination justify-content-center">
                       <li class="page-item">
                           <a class="page-link" href="#" aria-label="Previous">
                               <span aria-hidden="true">&laquo;</span>
                               <span class="sr-only">Previous</span>
                           </a>
                       </li>
                       <li class="page-item">
                           <a class="page-link" href="#">1</a>
                       </li>
                       <li class="page-item">
                           <a class="page-link" href="#">2</a>
                       </li>
                       <li class="page-item">
                           <a class="page-link" href="#">3</a>
                       </li>
                       <li class="page-item">
                           <a class="page-link" href="#" aria-label="Next">
                               <span aria-hidden="true">&raquo;</span>
                               <span class="sr-only">Next</span>
                           </a>
                       </li>
                   </ul>

               </div>
               <!-- /.container -->--}}









@stop
