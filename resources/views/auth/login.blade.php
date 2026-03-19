<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar — Painel do Aluno</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Space Grotesk', sans-serif;
            background: #0e0e10;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .login-card {
            display: flex;
            width: 100%;
            max-width: 820px;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid #2a2a32;
        }

        /* ── ASIDE ── */
        .login-aside {
            width: 42%;
            background: #16161a;
            padding: 2.75rem 2.25rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .aside-brand {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 2rem;
        }

        .aside-brand-dot {
            width: 32px;
            height: 32px;
            background: #7F77DD;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .aside-brand-dot svg { width: 17px; height: 17px; }

        .aside-brand-name {
            font-size: 14px;
            font-weight: 700;
            color: #e8e8f0;
        }

        .aside-title {
            font-size: 22px;
            font-weight: 700;
            color: #e8e8f0;
            line-height: 1.35;
            margin-bottom: 0.6rem;
        }

        .aside-desc {
            font-size: 13px;
            color: #6b6b7a;
            line-height: 1.7;
        }

        .features {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 1.5rem;
        }

        .feature {
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .feature-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #7F77DD;
            margin-top: 5px;
            flex-shrink: 0;
        }

        .feature-dot.green  { background: #1D9E75; }
        .feature-dot.teal   { background: #5DCAA5; }

        .feature-text {
            font-size: 12.5px;
            color: #8888a0;
            line-height: 1.55;
        }

        .aside-footer {
            font-size: 11px;
            color: #3a3a46;
        }

        /* ── FORMULÁRIO ── */
        .login-form-area {
            flex: 1;
            background: #121216;
            padding: 2.75rem 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-heading {
            font-size: 21px;
            font-weight: 700;
            color: #e8e8f0;
            margin-bottom: 4px;
        }

        .form-sub {
            font-size: 13px;
            color: #6b6b7a;
            margin-bottom: 2rem;
        }

        .field { margin-bottom: 1.1rem; }

        .field label {
            display: block;
            font-size: 11px;
            font-weight: 600;
            color: #6b6b7a;
            text-transform: uppercase;
            letter-spacing: 0.07em;
            margin-bottom: 6px;
        }

        .field input {
            width: 100%;
            padding: 10px 14px;
            font-size: 14px;
            font-family: 'Space Grotesk', sans-serif;
            background: #1e1e26;
            border: 1px solid #2a2a38;
            border-radius: 8px;
            color: #e8e8f0;
            outline: none;
            transition: border-color 0.15s, box-shadow 0.15s;
        }

        .field input::placeholder { color: #3e3e50; }

        .field input:focus {
            border-color: #534AB7;
            box-shadow: 0 0 0 3px rgba(127,119,221,0.15);
        }

        .field-error {
            font-size: 12px;
            color: #F09595;
            margin-top: 5px;
        }

        .alert-error {
            background: #1e1218;
            border: 1px solid #791F1F;
            border-radius: 8px;
            color: #F09595;
            font-size: 13px;
            padding: 10px 14px;
            margin-bottom: 1.25rem;
        }

        .row-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.25rem;
        }

        .remember-label {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 12.5px;
            color: #6b6b7a;
            cursor: pointer;
        }

        .remember-label input[type="checkbox"] {
            accent-color: #7F77DD;
            width: 14px;
            height: 14px;
        }

        .forgot-link {
            font-size: 12px;
            color: #7F77DD;
            text-decoration: none;
        }

        .forgot-link:hover { text-decoration: underline; }

        .btn-submit {
            width: 100%;
            padding: 11.5px;
            background: #7F77DD;
            color: #EEEDFE;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 700;
            font-family: 'Space Grotesk', sans-serif;
            cursor: pointer;
            letter-spacing: 0.01em;
            transition: background 0.15s;
        }

        .btn-submit:hover  { background: #534AB7; }
        .btn-submit:active { transform: scale(0.99); }

        .register-link {
            font-size: 13px;
            color: #6b6b7a;
            text-align: center;
            margin-top: 1.25rem;
        }

        .register-link a {
            color: #7F77DD;
            font-weight: 600;
            text-decoration: none;
        }

        .register-link a:hover { text-decoration: underline; }

        .form-footer {
            font-size: 11px;
            color: #3a3a46;
            text-align: center;
            margin-top: 1rem;
        }

        @media (max-width: 600px) {
            .login-aside { display: none; }
            .login-card { border-radius: 16px; }
            .login-form-area { padding: 2.5rem 1.75rem; }
        }
    </style>
</head>
<body>

<div class="login-card">

    {{-- ASIDE --}}
    <div class="login-aside">
        <div>
            <div class="aside-brand">
                <div class="aside-brand-dot">
                    <svg viewBox="0 0 26 26" fill="none">
                        <rect x="2"  y="2"  width="10" height="10" rx="2" fill="white" fill-opacity="0.9"/>
                        <rect x="14" y="2"  width="10" height="10" rx="2" fill="white" fill-opacity="0.5"/>
                        <rect x="2"  y="14" width="10" height="10" rx="2" fill="white" fill-opacity="0.5"/>
                        <rect x="14" y="14" width="10" height="10" rx="2" fill="white" fill-opacity="0.2"/>
                    </svg>
                </div>
                <span class="aside-brand-name">Painel do Aluno</span>
            </div>

            <h1 class="aside-title">Seus atendimentos,<br>organizados.</h1>
            <p class="aside-desc">Acesse sua conta e acompanhe seus agendamentos de reforço com facilidade.</p>

            <div class="features">
                <div class="feature">
                    <div class="feature-dot"></div>
                    <span class="feature-text">Agendamento rápido de sessões de reforço</span>
                </div>
                <div class="feature">
                    <div class="feature-dot green"></div>
                    <span class="feature-text">Histórico completo de atendimentos</span>
                </div>
                <div class="feature">
                    <div class="feature-dot teal"></div>
                    <span class="feature-text">Comprovante em PDF a qualquer momento</span>
                </div>
            </div>
        </div>

        <span class="aside-footer">Sistema de Agendamento Acadêmico</span>
    </div>

    {{-- FORMULÁRIO --}}
    <div class="login-form-area">
        <h2 class="form-heading">Bem-vindo de volta</h2>
        <p class="form-sub">Entre com suas credenciais institucionais</p>

        @if (session('status'))
            <div class="alert-error">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="field">
                <label for="email">E-mail</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    placeholder="seu@email.com" required autofocus autocomplete="username"/>
                @error('email')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="password">Senha</label>
                <input id="password" type="password" name="password"
                    placeholder="••••••••" required autocomplete="current-password"/>
                @error('password')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="row-options">
                <label class="remember-label">
                    <input type="checkbox" name="remember" id="remember_me"/>
                    Lembrar-me neste dispositivo
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-link">Esqueceu a senha?</a>
                @endif
            </div>

            <button type="submit" class="btn-submit">Entrar</button>
        </form>

        @if (Route::has('register'))
            <p class="register-link">
                Não tem uma conta?
                <a href="{{ route('register') }}">Criar conta</a>
            </p>
        @endif

        <p class="form-footer">© {{ date('Y') }} — Sistema de Agendamento</p>
    </div>

</div>

</body>
</html>