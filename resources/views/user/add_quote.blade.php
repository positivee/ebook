@extends('master_user')
@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="panel-body">

                    <!-- Formularz -->


                        <form method="POST" action="{{'/user/quote'}}">
                        @csrf

                        <!--pole na tresc cytatu-->

                            <div class="form-group">
                                <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Treść Cytatu') }}</label>

                                <div class="col-md-6">
                                    <input type="text" id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}" required autocomplete="content" autofocus>

                                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- pole na tytuł ksiązki -->


                            <div class="form-group">
                                <label for="book_title" class="col-md-4 col-form-label text-md-right">{{ __('Tytuł Ksiązki') }}</label>

                                <div class="col-md-6">
                                    <input id="book_title" type="text" class="form-control @error('book_title') is-invalid @enderror" name="book_title" value="{{ old('book_title') }}" required autocomplete="book_title" autofocus>

                                    @error('book_title')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <!--pole na imie autora ksiązki-->

                            <div class="form-group">
                                <label for="book_author_name" class="col-md-4 col-form-label text-md-right">{{ __('Imię Autora Książki') }}</label>

                                <div class="col-md-6">
                                    <input id="book_author_name" type="text" class="form-control @error('book_author_name') is-invalid @enderror" name="book_author_name" value="{{ old('book_author_name') }}" required autocomplete="book_author_name" autofocus>

                                    @error('book_author_name')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <!--pole na nazwisko autora ksiązki-->


                            <div class="form-group">
                                <label for="book_author_surname" class="col-md-4 col-form-label text-md-right">{{ __('Nazwisko Autora Książki') }}</label>

                                <div class="col-md-6">
                                    <input id="book_author_surname" type="text" class="form-control @error('book_author_surname') is-invalid @enderror" name="book_author_surname" value="{{ old('book_author_surname') }}" required autocomplete="book_author_surname">

                                    @error('book_author_surname')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>


                             <div class="form-group">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Dodaj cytat') }}
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
