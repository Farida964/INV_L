<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lamierre Inventory Gate</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
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

                <!-- NAME -->
                <label for="name">Name <span style="color:red">*</span></label>
                <input type="text" id="name" name="name"
                       value="{{ old('name') }}" required autofocus>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror

                <!-- EMAIL -->
                <label for="email">Email <span style="color:red">*</span></label>
                <input type="email" id="email" name="email"
                       value="{{ old('email') }}" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror

                <!-- PASSWORD -->
                <label for="password">Password <span style="color:red">*</span></label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <div class="message">{{ $message }}</div>
                @enderror

                <!-- CONFIRM PASSWORD -->
                <label for="password_confirmation">
                    Confirm Password <span style="color:red">*</span>
                </label>
                <input type="password" id="password_confirmation"
                       name="password_confirmation" required>
                @error('password_confirmation')
                    <div class="message">{{ $message }}</div>
                @enderror

                <div class="link-row">
                    <a href="{{ route('login') }}">Already registered?</a>
                </div>

                <button type="submit">Register</button>
            </form>

        </div>
    </div>
</div>

</body>
</html>
