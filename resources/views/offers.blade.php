@extends('master')
@section('content')


    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <h1 class="my-4">
            <small>Nasze książki</small>
        </h1>

        <div class="row">

            @include('include.book')

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
