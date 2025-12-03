<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('assets/css/regis.css') }}">
</head>

<body>
    <div class="container">
        <div class="box">

            <div class="login-box">
                <h3>Register</h3>
                <div class="desc">
                    <b>Lamierrè</b> Manage your inventory, stay focused and keep the spirit up.
                </div>

                @if(session('error'))
                    <div class="error">{{ session('error') }}</div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="label">
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" required>
                        @error('name') <div class="message">{{ $message }}</div> @enderror
                    </div>

                    <div class="label">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required>
                        @error('email') <div class="message">{{ $message }}</div> @enderror
                    </div>

                    <div class="label">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" required>
                        @error('password') <div class="message">{{ $message }}</div> @enderror
                    </div>

                    <div class="label">
                        <label for="password_confirmation">Confirm Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required>
                        @error('password_confirmation') <div class="message">{{ $message }}</div> @enderror
                    </div>

                    <div class="button_card">
                        <a href="{{ route('login') }}" class="notif">Already registered?</a>
                        <button type="submit" class="button">Register</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</body>
</html>
