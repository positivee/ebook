@extends('master')
{{--dlaczego tu był bookstore master wtf--}}
@section('content')
    <div class="card my-5">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4>Przypomnij hasło</h4>
                    <hr>
                </div>
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">

                <div class="col-md-12">
            <form method="POST" action="{{ route('password.email') }}" >
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-4 col-form-label">{{ __('Adres E-Mail') }}</label>
                    <div class="col-8">
                        <input id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"  type="text" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>
                </div>



                <div class="form-group row">
                    <div class="offset-4 col-8">
                        <button name="submit" type="submit" class="btn btn-primary"> {{ __('Wyślij link z przypomnieniem hasła') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
