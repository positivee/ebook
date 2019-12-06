@extends('auth.template_auth')

@section('panel')

    <h3 class="mb-4">Zaloguj się</h3>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adres e-mail') }}</label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Hasło') }}</label>
            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                 </span>
                @enderror
            </div>
        </div>


        <div class="custom-control custom-checkbox mb-3">
            <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="custom-control-label" for="remember">
                {{ __('Zapamiętaj hasło') }}
            </label>
        </div>

        <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">{{ __('Zaloguj') }}</button>

        @if (Route::has('password.request'))
            <div class="text-center">
                <a class="small" href="{{ route('password.request') }}">
                    {{ __('Zapomniałeś hasła?') }}
                </a>
            </div>
        @endif
    </form>
@endsection
