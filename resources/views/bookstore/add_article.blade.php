@extends('master_bookstore')
@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="panel-body">

                    <!-- Formularz -->

                    <div class="card-body">
                        <form method="POST" action="{{'/bookstore/a'}}">
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

                            <!--pole na treść-->

                            <div class="form-group">
                                <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Treść') }}</label>

                                <div class="col-md-6">
                                    <textarea id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}" required autocomplete="content" autofocus></textarea>

                                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <!--pole link do zdjecia-->


                            <div class="form-group">
                                <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Link do zdjęcia') }}</label>

                                <div class="col-md-6">
                                    <input id="photo" type="text" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}" required autocomplete="author_surname">

                                    @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Dodaj artykuł') }}
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
