@extends('user.user')

@section('title', 'Login' )

@section('content2')
<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="columns is-centered">
        <div class="column is-6">
            <label for="email" class="label">{{ __('E-Mail') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="input is-info @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="columns is-centered">
        <div class="column is-6">
            <label for="password" class="label">{{ __('Contraseña') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="input is-info @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>


    <div class="columns is-centered ">
        <div class="column is-offset-3">
            <button type="submit" class="button is-info">
                {{ __('Entrar') }}
            </button>


        </div>

    </div>

    <div class="columns is-centered">
        <div class="column is-6">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Recuérdame') }}
                </label>

                <!--
                        @if (Route::has('password.request'))
                        <a class="btn btn-link is-pulled-right" href="{{ route('password.request') }}">
                            {{ __('¿Has olvidado tu contraseña?') }}
                        </a>
                        @endif
                    -->
            </div>
        </div>

    </div>
</form>

@endsection
