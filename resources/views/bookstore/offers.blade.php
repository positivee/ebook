@extends('master_bookstore')
@section('content')

    <div class="container">

        <!-- Page Heading -->
        <h1 class="my-4">
            <small>Nasze oferty</small>
        </h1>

        <div class="row">

            @foreach($offers as $offer)

                <div class="col-lg-4 col-sm-6 mb-4">
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
