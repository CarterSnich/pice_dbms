<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    {{-- water.css --}}
    <link rel="stylesheet" href="{{ asset('/css/water-dark.css') }}">

    {{-- normalize.css --}}
    <link rel="stylesheet" href="{{ asset('/css/normalize.css') }}">

    <style>
        body {
            background-color: #2d3748;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            height: 100vh;
            max-width: 100vw;
        }

        #form-wrapper {
            width: 456px;
            background-color: #6b7280;
            padding: 1.5rem;
            border-radius: 0.5rem;
            margin-block: 5rem auto;
        }

        #logo-wrapper {
            display: flex;
            justify-content: center
        }

        form>h2 {
            text-align: center
        }

        form>input,
        form>button {
            width: 100%
        }

        form>input {
            margin-bottom: 1rem
        }

        .error-message {
            color: red
        }
    </style>
</head>

<body class="antialiased">
    <div id="form-wrapper">

        <div id="logo-wrapper">
            <img src="{{ asset('images/pice_logo_full.png') }}" alt="">
        </div>

        <form method="POST" action="/administration/authenticate">
            @csrf
            <h2>Administrator login</h2>

            <input type="email" name="email" id="email-input" placeholder="Email" value="{{ old('email') }}" required>

            <input type="password" name="password" id="password-input" placeholder="Password" required>

            <button type="submit">Login</button>

            @error('invalid_credentials')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </form>

    </div>
</body>

</html>
