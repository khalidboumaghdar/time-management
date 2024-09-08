<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: #F7FAFC;
            }
            .header-image {
                max-width: 100%;
                height: auto;
            }
            .box {
                background-color: #FFFFFF;
                border-radius: 8px;
                padding: 20px;
                margin-top: 40px;
                box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.05);
            }
            h1 {
                font-size: 28px;
                margin-bottom: 20px;
            }
            button {
                background-color: #1A202C;
                color: #FFFFFF;
                border: none;
                border-radius: 4px;
                padding: 8px 16px;
                font-size: 16px;
                margin-top: 20px;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <img src="{{ asset('assets/images/urbine.jpg') }}" alt="Urbine Logo">

        <div class="box">
            <h1>{{ __('Verify Your Email Address') }}</h1>

            <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
            <p>{{ __('If you did not receive the email') }},</p>

            <form method="POST" action="{{ route('verification.verify', ['id' => $id, 'hash' => $hash]) }}">
                @csrf
                <button type="submit">{{ __('click here to request another') }}</button>
            </form>
        </div>
    </body>
</html>
