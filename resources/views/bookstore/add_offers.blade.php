@extends('master_bookstore')
@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="panel-body">

                    <!-- Formularz -->

                    <form method="POST" action="{{'/bookstore/o'}}">
                    @csrf

                    <!--pole na id książki dla ktorej dodajemy oferte-->

                        <div class="form-group">
                            <label for="book_id" class="col-md-4 col-form-label text-md-right">{{ __('ID Książki') }}</label>

                            <div class="col-md-6">
                                <input id="book_id" type="number" class="form-control @error('book_id') is-invalid @enderror" name="book_id" value="{{ old('title') }}" required autocomplete="book_id" autofocus>

                                @error('book_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--pole na cene-->

                        <div class="form-group">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Cena') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" min="0" max="999.00" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--pole na date od której oferta obowiązuje-->


                        <div class="form-group">
                            <label for="date_from" class="col-md-4 col-form-label text-md-right">{{ __('Od dnia') }}</label>

                            <div class="col-md-6">
                                <input id="date_from" type="date" class="form-control @error('date_from') is-invalid @enderror" name="date_from" value="{{ old('date_from') }}" required autocomplete="date_from">

                                @error('date_from')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--pole na date do której oferta obowiązuje-->

                        <div class="form-group">
                            <label for="date_to" class="col-md-4 col-form-label text-md-right">{{ __('Do dnia') }}</label>

                            <div class="col-md-6">
                                <input id="date_to" type="date" class="form-control @error('date_to') is-invalid @enderror" name="date_to" required autocomplete="date_to">

                                @error('date_to')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <!--pole na link do oferty w księgarni-->

                        <div class="form-group">
                            <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('Link do oferty') }}</label>

                            <div class="col-md-6">
                                <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" required autocomplete="link">

                                @error('link')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- przycisk dodawania-->

                        <div class="form-group">
                                <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Dodaj ofertę') }}
                            </button>

                        </div>

                    </form>



                </div>
            </div>
        </div>
    </div>



@stop
