<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('assets/css/regis.css') }}">
</head>
<body class="container">
    <div class="card_form">
        <form method="POST" action="{{ route('register') }}">
            @csrf
             <h3>Registration</h3>
             <br>

            <div class="label">
                <label for="name">Name</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required class="w-full mt-1 border px-3 py-2 rounded">
                @error('name') <div class="text-red-500">{{ $message }}</div> @enderror
            </div>

            <div class="label">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required class="w-full mt-1 border px-3 py-2 rounded">
                @error('email') <div class="text-red-500">{{ $message }}</div> @enderror
            </div>

            <div class="label">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" required class="w-full mt-1 border px-3 py-2 rounded">
                @error('password') <div class="text-red-500">{{ $message }}</div> @enderror
            </div>

            <div class="label">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required class="w-full mt-1 border px-3 py-2 rounded">
                @error('password_confirmation') <div class="text-red-500">{{ $message }}</div> @enderror
            </div>

            <div class="button_card">
                <a href="{{ route('login') }}" class="notif">Already registered?</a>
                <button type="submit" class="button">Regist</button>
            </div>
        </form>
    </div>
</body>
</html>