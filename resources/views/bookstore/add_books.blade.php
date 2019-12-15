@extends('master')
@section('content')

    <form method="POST" action="{{'/bookstore/b'}}" class="text-center p-5" enctype="multipart/form-data">
            @csrf
        <p class="h4 mb-4">Formularz dodawania książki</p>
        <!-- Book titile-->
        <div class="form-group">

            <input type="text" id="title" class="form-control mb-3 @error('title') is-invalid @enderror" placeholder="{{ __('Tytuł Książki') }}" name="title" value="{{ old('book_title') }}"  autocomplete="title" autofocus>
            @error('title')
            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
            @enderror
        </div>

        <div class="form-row">
            <div class="col-md-6 mb-3">
                <!-- Book author name -->
                <input type="text" id="author_name" class="form-control @error('author_name') is-invalid @enderror"  name="author_name" placeholder="{{ __('Imię Autora') }}" value="{{ old('author_name') }}"  autocomplete="author_name">
                @error('author_name')
                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <!-- Book autor surename -->
                <input type="text" id="author_surname" class="form-control @error('author_surname') is-invalid @enderror" placeholder="{{ __('Nazwisko Autora') }}" name="author_surname" value="{{ old('author_surname') }}"  autocomplete="author_surname">
                @error('author_surname')
                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                @enderror
            </div>
        </div>


        <!-- Rok wydania -->
        <div class="form-group">
            <input type="text" id="year" class="form-control @error('year') is-invalid @enderror" placeholder="{{ __('Rok wydania') }}" name="year" value="{{ old('year') }}"  autocomplete="year" >

            @error('year')
            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
            @enderror
        </div>

        <!-- Wydawnictwo -->
        <div class="form-group">
            <input type="text" id="print" class="form-control @error('print') is-invalid @enderror" placeholder="{{ __('Wydawnictwo') }}" name="print" value="{{ old('print') }}"  autocomplete="print" >

            @error('print')
            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
            @enderror
        </div>

        <!-- ISBN -->
        <div class="form-group">
            <input type="text" id="isbn_number" class="form-control @error('isbn_number') is-invalid @enderror" placeholder="{{ __('Numer ISBN') }}" name="isbn_number" value="{{ old('isbn_number') }}"  autocomplete="isbn_number" >

            @error('isbn_number')
            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
            @enderror
        </div>

        <!-- Okładka -->
        <div class="form-group">
           {{-- <input type="text" id="picture" class="form-control @error('picture') is-invalid @enderror" placeholder="{{ __('Okładka') }}" name="picture" value="{{ old('picture') }}"  autocomplete="picture" >

            @error('picture')
            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
            @enderror--}}

            <div class="custom-file">
                <input type="file" class="custom-file-input form-control @error('picture') is-invalid @enderror" id="picture" name="picture" lang="pl">
                <label class="custom-file-label text-left" for="picture" data-browse="Wybierz" >Wybierz zdjęcie na okładkę książki</label>
                @error('picture')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

        </div>

        <!-- ID Kategori -->
        <div class="form-group">
{{--
            <input type="number" id="category_id" class="form-control @error('content') is-invalid @enderror" placeholder="{{ __('Kategoria') }}" name="category_id" value="{{ old('category_id') }}"  autocomplete="category_id" >
--}}
            <select id="category_id" type="text" name="category_id" class="col-12 form-control">
                @foreach($categories as $category)
                    <option value="{{$category->id}}" class="hidden" >{{$category->name}}</option>
                @endforeach
            </select>

            @error('category_id')
            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
            @enderror
        </div>


        <!-- Opis książki -->
        <div class="form-group">
            <textarea type="text" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="{{ __('Opis Książki') }}" name="description" value="{{ old('description') }}"  autocomplete="content" row="3"></textarea>

            @error('description')
            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
            @enderror
        </div>
    {{--  <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
          At least 8 characters and 1 digit
      </small>--}}

    <!-- Add quote -->
        <button class="btn btn-primary my-4 btn-block" type="submit">{{ __('Dodaj nową książkę') }}</button>



        <hr>


    </form>



  {{--  <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="panel-body">

                    <!-- Formularz -->

                    <div class="card-body">
                        <form method="POST" action="{{'/bookstore/b'}}">
                            @csrf

                            <!--pole na tytuł-->

                            <div class="form-group">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Tytuł') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <!--pole na imie autora-->

                            <div class="form-group">
                                <label for="author_name" class="col-md-4 col-form-label text-md-right">{{ __('Imię Autora') }}</label>

                                <div class="col-md-6">
                                    <input id="author_name" type="text" class="form-control @error('author_name') is-invalid @enderror" name="author_name" value="{{ old('author_name') }}" required autocomplete="author_name" autofocus>

                                    @error('author_name')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <!--pole na nazwisko autora-->


                            <div class="form-group">
                                <label for="author_surname" class="col-md-4 col-form-label text-md-right">{{ __('Nazwisko Autora') }}</label>

                                <div class="col-md-6">
                                    <input id="author_surname" type="text" class="form-control @error('author_surname') is-invalid @enderror" name="author_surname" value="{{ old('author_surname') }}" required autocomplete="author_surname">

                                    @error('author_surname')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <!--pole na na rok wydania -->

                            <div class="form-group">
                                <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Rok wydania') }}</label>

                                <div class="col-md-6">
                                    <input id="year" type="text" class="form-control @error('year') is-invalid @enderror" name="year" required autocomplete="year">

                                    @error('year')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <!--pole na wydawnictwo-->

                            <div class="form-group">
                                <label for="print" class="col-md-4 col-form-label text-md-right">{{ __('Wydawnictwo') }}</label>

                                <div class="col-md-6">
                                    <input id="print" type="text" class="form-control @error('print') is-invalid @enderror" name="print" required autocomplete="print">

                                    @error('print')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <!--pole na numer ISBN-->

                            <div class="form-group">
                                <label for="isbn_number" class="col-md-4 col-form-label text-md-right">{{ __('Numer ISBN') }}</label>

                                <div class="col-md-6">
                                    <input id="isbn_number" type="text" class="form-control @error('isbn_number') is-invalid @enderror" name="isbn_number" required autocomplete="isbn_number">

                                    @error('isbn_number')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <!--pole na opis -->

                            <div class="form-group">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Opis') }}</label>

                                <div class="col-md-6">
                                    <textarea type="text" id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description"></textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <!--pole na link do zdjęcia -->

                            <div class="form-group">
                                <label for="picture" class="col-md-4 col-form-label text-md-right">{{ __('Okładka') }}</label>

                                <div class="col-md-6">
                                    <input id="picture" type="text" class="form-control @error('picture') is-invalid @enderror" name="picture" required autocomplete="picture">

                                    @error('picture')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- pole na kategorie -->

                            <div class="form-group">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('ID Kategorii') }}</label>

                                <div class="col-md-6">
                                    <input id="category_id" type="text" class="form-control @error('category_id') is-invalid @enderror" name="category_id" required autocomplete="category_id">

                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Dodaj książkę') }}
                                     </button>
                                </div>
                            </div>
                        </form>
                    </div>
                 </div>
            </div>
        </div>
    </div>
--}}


@stop
