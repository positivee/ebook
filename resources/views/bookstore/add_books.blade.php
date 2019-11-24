@extends('master_bookstore')
@section('content')

    <div class="row">
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



@stop
