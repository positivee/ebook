@extends('master_bookstore')
@section('content')

    <form method="POST" action="{{'/bookstore/a'}}" class="text-center p-5">
        @csrf
        <p class="h4 mb-4">Formularz dodania nowego artykułu</p>
        <!-- Article titile-->
        <div class="form-group">

            <input type="text" id="title" class="form-control mb-3 @error('title') is-invalid @enderror" placeholder="{{ __('Tytuł artykułu') }}" name="title" value="{{ old('book_title') }}" required autocomplete="title" autofocus>
            @error('title')
            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
            @enderror
        </div>


        <!-- Article description -->
        <div class="form-group">
            <textarea type="text" id="content" class="form-control @error('content') is-invalid @enderror" placeholder="{{ __('Treść') }}" name="content" value="{{ old('content') }}" required autocomplete="content" rows="4" ></textarea>


            @error('content')
            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
            @enderror
        </div>
        <!-- Link do zdjeci artykułu -->
        cokolwiek
        <div class="form-group">
            <input type="text" id="photo" class="form-control @error('photo') is-invalid @enderror" placeholder="{{ __('Link do zdjęcia') }}" name="photo" value="{{ old('photo') }}" required autocomplete="photo" >

            @error('photo')
            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
            @enderror
        </div>


    <!-- Add quote -->
        <button class="btn btn-primary my-4 btn-block" type="submit">{{ __('Dodaj nowy artykuł') }}</button>



        <hr>


    </form>

@stop
