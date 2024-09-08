<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Password Reset</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/urbine.jpg')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/styles.min.css')}}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container mt-4">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">{{ __('Reset Password') }}</div>
            <div class="card-body">
              <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="mb-3">
                  <label for="email" class="form-label">{{ __('Email') }}</label>
                  <input id="email" class="form-control" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" />
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-3">
                  <label for="password" class="form-label">{{ __('Password') }}</label>
                  <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                  <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                  <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                  <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary">{{ __('Reset Password') }}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-xXZvFoRgRf25GjNQ2Qvjy1vlo8wnEH/s5z5x5n5jZBp4M4ELW88xzRPAd/t1SScPBg74rAgngwV33AaJsSO1zA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
</html
