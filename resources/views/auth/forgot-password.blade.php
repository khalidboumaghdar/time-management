<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/urbine.jpg')}}" />
   
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            background-color: #fff;
            border: 0;
            border-radius: 0.5rem;
            box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card p-5">
                    <h1 class="mb-4">{{ __('Forgot Password') }}</h1>
                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>

                    <!-- Session Status -->
                    <div class="mb-4">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">{{ __('Email Password Reset Link') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap 5 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>


