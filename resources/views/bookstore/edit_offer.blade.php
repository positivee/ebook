@extends('master')
@section('content')


    <form method="post" action="/bookstore/offer/update/{{$offer->getId()}}" class="text-center p-5">
        {{ csrf_field() }}
        {{ method_field('patch') }}

        <p class="h4 mb-4">Zaktualizuj wybraną ofertę</p>

        <!-- Książka-->
        <div class="form-group">

            {{--
                        <input type="number" id="book_id" class="form-control mb-4 @error('book_id') is-invalid @enderror" placeholder="{{ __('ID Książki') }}" name="book_id" value="{{ old('book_id') }}" required autocomplete="book_id" autofocus>
            --}}
            <select id="book_id" type="text" name="book_id" class="col-12 form-control">
                @foreach($offer as $of)
                    <option value="{{$of->getBook()->id}}" class="hidden" >{{$of->getTitle()}}</option>
                @endforeach
            </select>

            @error('book_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <!-- Cena -->
        <div class="form-group">
            <input type="number" id="price" min="0" max="999.00" step="0.01" class="form-control @error('price') is-invalid @enderror" placeholder="{{ __('Cena') }}" name="price" value="{{ $of->getPrice() }}"  autocomplete="price">

            @error('price')
            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
            @enderror
        </div>

        {{--data --}}

        <div class="form-row">
            <div class="col-lg-6 mb-4">
                <!-- Book author name -->
                <label for="date_from" class="col-md-6  ">{{ __('Oferta obowiązuje od dnia:') }}</label>
                <input type="date" id="date_from" class="form-control @error('date_from') is-invalid @enderror"  name="date_from" placeholder="{{ __('Od Dnia') }}" value="{{ $of->getDateFrom()->format('Y-m-d') }}"  autocomplete="date_from">
                @error('date_from')
                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                @enderror
            </div>
            <div class="col-lg-6 mb-4">
                <!-- Book autor surename -->
                <label for="date_to" class="col-md-6 ">{{ __('do dnia:') }}</label>
                <input type="date" id="date_to" class="form-control @error('date_to') is-invalid @enderror" placeholder="{{ __('Do dnia') }}" name="date_to" value="{{ $of->getDateTo()->format('Y-m-d')}}"  autocomplete="date_to">
                @error('date_to')
                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                @enderror
            </div>
        </div>


        <!-- Link do oferty -->
        <div class="form-group">
            <input type="text" id="link" class="form-control @error('link') is-invalid @enderror" placeholder="{{ __('Link do oferty') }}" name="link" value="{{ $of->getLink() }}"  autocomplete="link" >

            @error('link')
            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
            @enderror
        </div>


    {{--  <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
          At least 8 characters and 1 digit
      </small>--}}

    <!-- Add offer -->
        <div class="form-group">
            <button class="btn btn-primary my-4 btn-block" type="submit">{{ __('Zaktualizuj ofertę') }}</button>
        </div>


    </form>


@stop