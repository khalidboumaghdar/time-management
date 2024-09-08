<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/urbine.jpg')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/styles.min.css')}}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container my-5 p-3 bg-light rounded-3 shadow-lg" style="max-width: 500px; margin: auto;">
        <h1 class="text-center mb-4">Verifyy Your Email</h1>

        <div class=" rounded-3 p-3 mb-4">
            <p class="text-sm text-muted mb-4">
                Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
            </p>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-success">
                    A new verification link has been sent to the email address you provided during registration.
                </div>
            @endif

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div class="text-center">
                    <button class="btn btn-primary shadow-lg" style="font-size: 1.2rem;">
                        Resend Verification Email
                    </button>
                </div>
            </form>
        </div>

        <div class="text-center">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="btn btn-link text-sm text-muted font-weight-bold hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Log Out
                </button>
            </form>
        </div>
    </div>
    <!-- Bootstrap 5 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>

