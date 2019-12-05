@extends('master')
@section('content')



    <div class="container py-4">
        <div class="row text-center pb-4">
            <div class="col-md-12">
                <h2>Zaawasowane wyszukiwanie książki</h2>
            </div>
        </div>
        <form method="POST" action="{{'/user/search/find'}}">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <!--pole na tytuł książki-->
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <input type="text" id="title"  class="form-control" name="title" placeholder="{{ __('Tytuł Książki') }}" autofocus >

                                    </div>
                                </div>
                                <!--pole na imie autora-->
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <input type="text" id="author_name" class="form-control"  name="author_name" placeholder="{{ __('Imię Autora') }}">
                                    </div>
                                </div>
                                <!--pole na nazwisko autora -->
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <input type="text" id="author_surname" class="form-control"  name="author_surname" placeholder="{{ __('Nazwisko Autora') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!--pole na numer ISBN -->
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <input type="text" id="isbn_number" class="form-control"  name="isbn_number" placeholder="{{ __('Numer ISBN') }}" >
                                    </div>
                                </div>
                                <!--pole na wydawnictwo -->
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <input type="text" id="print" class="form-control"  name="print" placeholder="{{ __('Wydawnictwo') }}">
                                    </div>
                                </div>
                                <!--pole na cene -->
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <div class="form-row">
                                            <div class="col-md-6 mb-2">
                                                <input type="number"  min="0" max="999.00" step="0.01" id="price_from" class="form-control"  name="price_from" placeholder="{{ __('Cena Od') }}">

                                            </div>
                                            <div class="col-md-6 ">
                                                <input type="number"  min="0" max="999.00" step="0.01" id="price_to" class="form-control" placeholder="{{ __('Do') }}" name="price_to">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- pole na kategorie-->
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <select id="category" type="text" name="category" class="col-12 form-control">
                                            <option value="" class="hidden" >Kategoria</option>
                                        </select>
                                    </div>
                                </div>
                                <!--pole na wyszukiwanie zaawasowane jak będzie -->
                                <div class="col-md-5">
                                    <div class="form-group ">
                                        <input type="text" id="print" class="form-control"  name="print" placeholder="{{ __('Wpisz dowolne słowa kluczowe') }}">
                                    </div>
                                </div>
                                <!-- pole na przycisk-->
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary btn-block ">Wyszukaj</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>

    {{--wyniki wyszukiwania--}}
    <div class="row">

        @foreach($offers as $offer)

            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top d-block mx-auto p-1 image-size" src="{{$offer->getPicture()}}?showinfo=0" frameborder="0" alt="" ></a>

                    <div class="card-body d-flex flex-column">

                        <h4 class="card-title">
                            <a href="#">{{ $offer->getTitle() }}</a>
                        </h4>
                        <p class="card-text">{{Str::limit($offer->getDescription(),150)}}</p>
                        <p class="card-text">Autor: {{$offer->getAuthorName() ." ".$offer->getAuthorSurname()}}</p>
                        <p class="card-text">Data wydania: {{$offer->getYear()}}</p>

                        <a href="#" class="btn btn-primary mt-auto">Sprawdź oferty</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>



@stop
