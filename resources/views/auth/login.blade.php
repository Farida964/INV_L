{{-- filepath: resources/views/auth/login.blade.php --}}
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
                <h3>Login</h3>
                <div class="desc">
                    <b>Lamierrè</b> Manage your inventory, stay focused and keep the spirit up.
                </div>
                @if(session('error'))
                    <div class="error">{{ session('error') }}</div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <label for="email">Email<span style="color:red">*</span></label>
                    <input type="text" id="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <label for="password">Password<span style="color:red">*</span></label>
                    <input type="password" id="password" name="password" required>
                    @error('password')
                        <div class="message">{{ $message }}</div>
                    @enderror

                    <div class="link-row">
                    <a href="{{ route('register') }}">Haven't created an account yet?</a>
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                    </div>
                    <button type="submit">Login</button>
                </form>
               
            </div>
        </div>
    </div>
</body>
</html>