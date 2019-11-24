@extends('auth.template_auth')

@section('panel')

    <h3 class="mb-4">Zarejestruj się</h3>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group row">
            <!--dodaje pole z imieniem-->
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Imię') }}</label>
            <div class="col-md-6">

                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                @enderror

            </div>
        </div>


        <div class="form-group row">
            <!--dodaje pole z naziwskiem-->
            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Nazwisko') }}</label>
            <div class="col-md-6">

                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                @error('surname')
                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <!--dodaje pole z e-mail-->
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>
            <div class="col-md-6">

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <!--dodaje pole z Hasłem-->
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Hasło') }}</label>
            <div class="col-md-6">

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <!--dodaje pole z powtórzeniem hasła-->
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Powtórz hasło') }}</label>
            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="custom-control custom-checkbox mb-3">
            <input class="custom-control-input" type="checkbox" name="rules" id="rules" >
            <label class="custom-control-label text-danger" for="rules">
                {{ __('Akcetpuje regualmin') }}
            </label>
        </div>

        <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">{{ __('Zarejestruj się') }}</button>

    </form>


@endsection
