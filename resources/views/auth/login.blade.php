<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Festival</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            background: linear-gradient(160deg, #0b132b 0%, #1c2957 60%, #0f1e45 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 24px 20px;
        }

        .brand-area {
            text-align: center;
            margin-bottom: 28px;
        }

        .brand-icon {
            width: 64px; height: 64px;
            background: #ffb703;
            border-radius: 18px;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 14px;
            font-size: 30px;
        }

        .brand-title {
            color: #fff;
            font-size: 22px;
            font-weight: 700;
        }

        .brand-sub {
            color: rgba(255,255,255,0.45);
            font-size: 13px;
            margin-top: 4px;
        }

        .card {
            width: 100%;
            max-width: 400px;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 24px;
            padding: 28px 24px;
            backdrop-filter: blur(12px);
        }

        .alert {
            border-radius: 10px;
            font-size: 13px;
            padding: 11px 14px;
            margin-bottom: 16px;
        }

        .alert-success { background: rgba(22,101,52,0.25); border: 1px solid rgba(22,101,52,0.5); color: #6ee7a0; }
        .alert-error   { background: rgba(185,28,28,0.2);  border: 1px solid rgba(185,28,28,0.4);  color: #fca5a5; }

        .field-wrap { position: relative; margin-bottom: 16px; }

        .field-icon {
            position: absolute;
            left: 14px; top: 50%;
            transform: translateY(-50%);
            color: rgba(255,183,3,0.6);
            pointer-events: none;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"] {
            width: 100%;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 12px;
            color: rgba(255,255,255,0.85);
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            padding: 13px 14px 13px 42px;
            outline: none;
            transition: border 0.2s;
        }

        input::placeholder { color: rgba(255,255,255,0.25); }
        input:focus { border-color: rgba(255,183,3,0.5); }

        .eye-btn {
            position: absolute;
            right: 14px; top: 50%;
            transform: translateY(-50%);
            color: rgba(255,255,255,0.3);
            cursor: pointer;
            background: none;
            border: none;
            font-size: 18px;
            padding: 0;
        }

        .forgot {
            text-align: right;
            margin-top: -6px;
            margin-bottom: 20px;
        }

        .forgot a { color: #ffb703; font-size: 12px; text-decoration: none; }

        .btn-login {
            width: 100%;
            padding: 14px;
            background: #ffb703;
            border: none;
            border-radius: 14px;
            font-weight: 700;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            color: #0b132b;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-login:hover { background: #f59e0b; }

        .divider {
            display: flex; align-items: center; gap: 10px;
            margin: 20px 0;
        }

        .divider-line { flex: 1; height: 1px; background: rgba(255,255,255,0.1); }
        .divider-text { color: rgba(255,255,255,0.3); font-size: 12px; }

        .register-row {
            text-align: center;
            font-size: 13px;
            color: rgba(255,255,255,0.35);
        }

        .register-row a { color: #ffb703; font-weight: 600; text-decoration: none; }
    </style>
</head>
<body>

<div class="brand-area">
    <div class="brand-icon">🎪</div>
    <p class="brand-title">Festival App</p>
    <p class="brand-sub">Selamat datang kembali</p>
</div>

<div class="card">
    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="field-wrap">
            <span class="field-icon">✉</span>
            <input type="email" name="email" placeholder="Email kamu"
                   value="{{ old('email') }}" required>
        </div>

        <div class="field-wrap">
            <span class="field-icon">🔒</span>
            <input type="password" name="password" id="password"
                   placeholder="Password" required>
            <button type="button" class="eye-btn" onclick="togglePass()">👁</button>
        </div>

        <div class="forgot">
            <a href="{{ route('password.request') }}">Lupa password?</a>
        </div>

        <button type="submit" class="btn-login">Masuk</button>
    </form>

    <div class="divider">
        <div class="divider-line"></div>
        <span class="divider-text">atau</span>
        <div class="divider-line"></div>
    </div>

    <p class="register-row">
        Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
    </p>
</div>

<script>
    function togglePass() {
        const p = document.getElementById('password');
        p.type = p.type === 'password' ? 'text' : 'password';
    }
</script>

</body>
</html>