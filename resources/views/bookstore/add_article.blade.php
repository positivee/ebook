@extends('master')
@section('content')


    <form method="POST" action="{{'/bookstore/a'}}" class="text-center p-5" enctype="multipart/form-data">
        @csrf
        <p class="h4 mb-4">Formularz dodawania nowego artykułu</p>
        <!-- Article titile-->

        <div class="form-group">

            <input type="text" id="title" class="form-control mb-3 @error('title') is-invalid @enderror" placeholder="{{ __('Tytuł artykułu') }}" name="title" value="{{ old('book_title') }}"  autocomplete="title" autofocus>
            @error('title')
            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
            @enderror

        </div>


        <!-- Article description -->
        <div class="form-group">
            <textarea type="text" id="content" class="form-control @error('content') is-invalid @enderror" placeholder="{{ __('Treść') }}" name="content" value="{{ old('content') }}"  autocomplete="content" rows="4" ></textarea>


            @error('content')
            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
            @enderror
        </div>

        <!-- Link do zdjeci artykułu -->
        <div class="form-group">
{{--
            <input type="text" id="photo" class="form-control @error('photo') is-invalid @enderror" placeholder="{{ __('Link do zdjęcia') }}" name="photo" value="{{ old('photo') }}"  autocomplete="photo" >
--}}          {{-- <label for="photo">Zdjęci do artyukułu</label>
            <input type="file" id="photo" name="photo" class="form-control @error('photo') is-invalid @enderror">
            @error('photo')
            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
            @enderror--}}
            <div class="custom-file">
                <input type="file" class="custom-file-input form-control @error('photo') is-invalid @enderror" id="photo" name="photo" lang="pl">
                <label class="custom-file-label" for="photo" data-browse="Wybierz" >Wybierz zdjęcie do artykułu</label>
                @error('photo')
                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                @enderror
            </div>
        </div>



    <!-- Add quote -->
        <button class="btn btn-primary my-4 btn-block" type="submit">{{ __('Dodaj nowy artykuł') }}</button>



        <hr>


    </form>

@stop
