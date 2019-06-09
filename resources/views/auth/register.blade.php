@extends('user.user')

@section('content2')
<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="columns">

        <!-- name -->
        <div class="column">

            <div class="field">
                <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>
                <div class="control">
                    <input id="name" type="text" class="input is-info @error('name') is-danger @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                </div>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

        </div>

        <!-- mail -->
        <div class="column">

            <div class="field">
                <label for="name" class="col-md-4 col-form-label text-md-right">Mail</label>
                <div class="control">
                    <input id="email" type="email" class="input is-info @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">
                </div>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

        </div>

    </div>


    <div class="columns">

        <!-- pw1 -->
        <div class="column">

            <div class="field">
                <label for="name" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                <div class="control">
                        <input id="password" type="password" class="input is-info @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    </div>

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

        </div>

        <!-- pw2 -->
        <div class="column">

            <div class="field">
                <label for="name" class="col-md-4 col-form-label text-md-right">Confirmación de
                    contraseña</label>
                <div class="control">
                    <input id="password-confirm" type="password" class="input is-info" name="password_confirmation"
                        required autocomplete="new-password">

                    @error('password-confirm')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

            </div>

        </div>

    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="button is-info">
                {{ __('Register') }}
            </button>
        </div>
    </div>

</form>
@endsection
