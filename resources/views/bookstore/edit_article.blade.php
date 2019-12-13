@extends('master')
@section('content')


    <form method="post" action="/bookstore/article/update/{{$article->getId()}}" class="text-center p-5">
        {{ csrf_field() }}
        {{ method_field('patch') }}

        <p class="h4 mb-4">Zaktualizuj wybrany artykuł</p>

        <!-- Article titile-->

        <div class="form-group">

            <input type="text" id="title" class="form-control mb-3 @error('title') is-invalid @enderror" placeholder="{{ __('Tytuł artykułu') }}" name="title" value="{{ $article->getBookTitle() }}"  autocomplete="title" autofocus>
            @error('title')
            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
            @enderror

        </div>


        <!-- Article description -->
        <div class="form-group">
            <textarea type="text" id="content" class="form-control @error('content') is-invalid @enderror" placeholder="{{ __('Treść') }}" name="content"  autocomplete="content" rows="4" {{$article->getContent()}} ></textarea>


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
            --}}           <label for="photo">Zdjęci do artyukułu</label>
            <input type="file" id="photo" name="photo" class="form-control @error('photo') is-invalid @enderror">
            @error('photo')
            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
            @enderror
        </div>



        <!-- Add quote -->
        <button class="btn btn-primary my-4 btn-block" type="submit">{{ __('Zaktualizuj artykuł') }}</button>



        <hr>


    </form>





@stop