@extends('master')
@section('content')


<form method="post" action="{{'/user/quote/update', $quote->id}}" class="text-center p-5">
    {{ csrf_field() }}
    {{ method_field('patch') }}

    <p class="h4 mb-4">Zaktualizuj swój cytat</p>
    <div class="form-row">
        <div class="col-md-6 mb-4">

            <!-- Book author name -->
            <input type="text" id="book_author_name" class="form-control @error('book_author_name') is-invalid @enderror"  name="book_author_name"  value="{{$quote->book_author_name}}" required autocomplete="book_author_name" autofocus >
            @error('book_author_name')
            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
            @enderror
        </div>
        <div class="col-md-6 mb-4">
            <!-- Book autor surename -->
            <input type="text" id="book_author_surname" class="form-control @error('book_author_surname') is-invalid @enderror" name="book_author_surname" value="{{ $quote->book_author_surname }}" required autocomplete="book_author_surname">
            @error('book_author_surname')
            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
            @enderror
        </div>
    </div>
    <!-- Book titile-->
    <div class="form-group">

        <input type="text" id="book_title" class="form-control mb-4 @error('book_title') is-invalid @enderror"  name="book_title" value="{{$quote->book_title}}" required autocomplete="book_title">
        @error('book_title')
        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
        @enderror
    </div>

    <!-- Opis -->
    <div class="form-group">
        <textarea type="text" id="content" class="form-control @error('content') is-invalid @enderror" placeholder="{{$quote->content }}" name="content"  required autocomplete="content" row="3"></textarea>

        @error('content')
        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
        @enderror
    </div>

{{--  <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
      At least 8 characters and 1 digit
  </small>--}}

<!-- Add quote -->
    <button class="btn btn-primary my-4 btn-block" type="submit">{{ __('Aktualizuj cytat') }}</button>



    <hr>


</form>

@stop