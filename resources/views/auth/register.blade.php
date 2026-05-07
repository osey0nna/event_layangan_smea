<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Festival</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
            padding: 32px 20px;
        }
        .badge {
            display: inline-block;
            background: rgba(255,183,3,0.15);
            border: 1px solid rgba(255,183,3,0.3);
            color: #ffb703;
            font-size: 10px; font-weight: 700;
            letter-spacing: 0.25em; text-transform: uppercase;
            padding: 4px 12px; border-radius: 30px;
            margin-bottom: 10px;
        }
        .htitle {
            color: #fff; font-size: 22px; font-weight: 700;
            line-height: 1.3; margin: 8px 0;
        }
        .hsub {
            color: rgba(255,255,255,0.4); font-size: 13px;
            line-height: 1.6; margin-bottom: 24px;
        }
        .card {
            width: 100%; max-width: 400px;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 24px;
            padding: 28px 24px;
        }
        .alert {
            border-radius: 12px; font-size: 13px;
            padding: 11px 14px; margin-bottom: 16px;
            display: flex; align-items: flex-start; gap: 8px;
        }
        .alert-success {
            background: rgba(22,101,52,0.25);
            border: 1px solid rgba(22,101,52,0.4);
            color: #6ee7a0;
        }
        .alert-error {
            background: rgba(185,28,28,0.2);
            border: 1px solid rgba(185,28,28,0.35);
            color: #fca5a5;
        }
        .field-group { margin-bottom: 16px; }
        .field-label {
            display: block;
            color: rgba(255,255,255,0.5); font-size: 11px;
            letter-spacing: 0.04em; text-transform: uppercase;
            margin-bottom: 6px;
        }
        .field-wrap { position: relative; }
        .field-icon {
            position: absolute; left: 13px; top: 50%;
            transform: translateY(-50%);
            color: rgba(255,183,3,0.55);
            pointer-events: none; font-size: 15px;
        }
        .field-wrap input {
            width: 100%;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 12px;
            color: rgba(255,255,255,0.85);
            font-size: 14px; font-family: 'Poppins', sans-serif;
            padding: 12px 12px 12px 40px;
            outline: none; transition: border 0.2s;
        }
        .field-wrap input::placeholder { color: rgba(255,255,255,0.2); }
        .field-wrap input:focus { border-color: rgba(255,183,3,0.5); }
        .field-wrap input.has-eye { padding-right: 40px; }
        .eye-btn {
            position: absolute; right: 12px; top: 50%;
            transform: translateY(-50%);
            color: rgba(255,255,255,0.25);
            background: none; border: none; cursor: pointer; font-size: 16px;
        }
        .field-error { color: #fca5a5; font-size: 11px; margin-top: 5px; }
        .strength-bars { display: flex; gap: 4px; margin-top: 6px; }
        .sb { flex: 1; height: 3px; border-radius: 3px; background: rgba(255,255,255,0.1); }
        .info-box {
            background: rgba(255,183,3,0.06);
            border: 1px solid rgba(255,183,3,0.15);
            border-radius: 12px; padding: 10px 14px;
            margin-bottom: 18px;
            display: flex; gap: 10px; align-items: flex-start;
            color: rgba(255,255,255,0.4); font-size: 12px; line-height: 1.5;
        }
        .info-box span { color: rgba(255,183,3,0.75); font-weight: 600; }
        .btn-register {
            width: 100%; padding: 14px;
            background: #ffb703; border: none; border-radius: 14px;
            font-weight: 700; font-size: 14px; font-family: 'Poppins', sans-serif;
            color: #0b132b; cursor: pointer;
            letter-spacing: 0.15em; text-transform: uppercase;
            transition: background 0.2s;
            margin-bottom: 20px;
        }
        .btn-register:hover { background: #f59e0b; }
        .login-row {
            text-align: center; font-size: 13px;
            color: rgba(255,255,255,0.35);
        }
        .login-row a { color: #ffb703; font-weight: 600; text-decoration: none; }
    </style>
</head>
<body>

<div style="width:100%;max-width:400px">
    <div class="badge">Register</div>
    <h2 class="htitle">Buat akun peserta festival</h2>
    <p class="hsub">Lengkapi data di bawah ini untuk mendaftar. Akun peserta akan dibuat dengan status menunggu persetujuan.</p>

    <div class="card">

        @if(session('status'))
            <div class="alert alert-success">✓ {{ session('status') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">⚠ {{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="field-group">
                <label class="field-label" for="name">Nama Lengkap</label>
                <div class="field-wrap">
                    <span class="field-icon">👤</span>
                    <input type="text" id="name" name="name"
                           value="{{ old('name') }}"
                           placeholder="Masukkan nama lengkap" required autofocus>
                </div>
                @error('name')<p class="field-error">{{ $message }}</p>@enderror
            </div>

            <div class="field-group">
                <label class="field-label" for="email">Email</label>
                <div class="field-wrap">
                    <span class="field-icon">✉</span>
                    <input type="email" id="email" name="email"
                           value="{{ old('email') }}"
                           placeholder="nama@email.com" required>
                </div>
                @error('email')<p class="field-error">{{ $message }}</p>@enderror
            </div>

            <div class="field-group">
                <label class="field-label" for="password">Password</label>
                <div class="field-wrap">
                    <span class="field-icon">🔒</span>
                    <input type="password" id="password" name="password"
                           placeholder="Buat password" required
                           class="has-eye" oninput="checkStrength(this.value)">
                    <button type="button" class="eye-btn" onclick="togglePass('password','e1')">
                        <span id="e1">👁</span>
                    </button>
                </div>
                <div class="strength-bars">
                    <div class="sb" id="sb1"></div>
                    <div class="sb" id="sb2"></div>
                    <div class="sb" id="sb3"></div>
                    <div class="sb" id="sb4"></div>
                </div>
                <p id="slabel" style="font-size:11px;margin-top:4px;height:14px;color:transparent">-</p>
                @error('password')<p class="field-error">{{ $message }}</p>@enderror
            </div>

            <div class="field-group">
                <label class="field-label" for="password_confirmation">Konfirmasi Password</label>
                <div class="field-wrap">
                    <span class="field-icon">🔒</span>
                    <input type="password" id="password_confirmation"
                           name="password_confirmation"
                           placeholder="Ulangi password" required class="has-eye">
                    <button type="button" class="eye-btn" onclick="togglePass('password_confirmation','e2')">
                        <span id="e2">👁</span>
                    </button>
                </div>
                @error('password_confirmation')<p class="field-error">{{ $message }}</p>@enderror
            </div>

            <div class="info-box">
                ℹ Akun peserta akan dibuat dengan status
                <span>menunggu persetujuan</span> dari admin festival.
            </div>

            <button type="submit" class="btn-register">Daftar</button>
        </form>

        <p class="login-row">
            Sudah punya akun?
            <a href="{{ route('login') }}">Login di sini</a>
        </p>
    </div>
</div>

<script>
    function togglePass(id, iconId) {
        const f = document.getElementById(id);
        f.type = f.type === 'password' ? 'text' : 'password';
    }
    function checkStrength(val) {
        const bars = ['sb1','sb2','sb3','sb4'];
        const label = document.getElementById('slabel');
        bars.forEach(id => document.getElementById(id).style.background = 'rgba(255,255,255,0.1)');
        if (!val) { label.style.color = 'transparent'; return; }
        let score = 0;
        if (val.length >= 8) score++;
        if (/[A-Z]/.test(val)) score++;
        if (/[0-9]/.test(val)) score++;
        if (/[^A-Za-z0-9]/.test(val)) score++;
        const colors = ['#f87171','#f87171','#fbbf24','#34d399'];
        const texts  = ['Lemah','Lemah','Cukup','Kuat'];
        const col = colors[score - 1] || '#f87171';
        for (let i = 0; i < score; i++)
            document.getElementById(bars[i]).style.background = col;
        label.textContent = texts[score - 1] || '';
        label.style.color = col;
    }
</script>

</body>
</html>