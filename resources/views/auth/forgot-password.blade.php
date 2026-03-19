<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueci a Senha — Painel do Aluno</title>
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
            -webkit-font-smoothing: antialiased;
        }

        .wrap {
            width: 100%;
            max-width: 420px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 1.75rem;
            text-decoration: none;
        }

        .brand-dot {
            width: 30px;
            height: 30px;
            background: #7F77DD;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .brand-dot svg { width: 16px; height: 16px; }
        .brand-name    { font-size: 14px; font-weight: 700; color: #e8e8f0; }

        .card {
            background: #16161a;
            border: 1px solid #2a2a32;
            border-radius: 18px;
            padding: 2.25rem;
            width: 100%;
        }

        .card-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: #1a1828;
            border: 1px solid #534AB7;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.25rem;
        }

        .card-icon svg { width: 22px; height: 22px; color: #7F77DD; }

        .card-title {
            font-size: 19px;
            font-weight: 700;
            color: #e8e8f0;
            margin-bottom: 6px;
        }

        .card-desc {
            font-size: 13px;
            color: #6b6b7a;
            line-height: 1.7;
            margin-bottom: 1.75rem;
        }

        .alert-success {
            display: flex;
            align-items: flex-start;
            gap: 9px;
            background: #0f1e1a;
            border: 1px solid #0F6E56;
            border-radius: 10px;
            padding: 12px 14px;
            margin-bottom: 1.5rem;
        }

        .alert-success svg  { width: 16px; height: 16px; color: #1D9E75; flex-shrink: 0; margin-top: 1px; }
        .alert-success span { font-size: 13px; color: #5DCAA5; line-height: 1.55; }

        .field { margin-bottom: 1.25rem; }

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

        .btn-submit {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 12px;
            background: #7F77DD;
            color: #EEEDFE;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 700;
            font-family: 'Space Grotesk', sans-serif;
            cursor: pointer;
            transition: background 0.15s;
        }

        .btn-submit:hover  { background: #534AB7; }
        .btn-submit:active { transform: scale(0.99); }
        .btn-submit svg    { width: 15px; height: 15px; }

        .back-link {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 1.25rem;
            font-size: 12.5px;
            color: #6b6b7a;
            text-decoration: none;
            transition: color 0.12s;
        }

        .back-link:hover { color: #AFA9EC; }
        .back-link svg   { width: 13px; height: 13px; }

        .form-footer {
            font-size: 11px;
            color: #3a3a46;
            text-align: center;
            margin-top: 1.5rem;
        }
    </style>
</head>
<body>

<div class="wrap">

    <a href="{{ route('login') }}" class="brand">
        <div class="brand-dot">
            <svg viewBox="0 0 26 26" fill="none">
                <rect x="2"  y="2"  width="10" height="10" rx="2" fill="white" fill-opacity="0.9"/>
                <rect x="14" y="2"  width="10" height="10" rx="2" fill="white" fill-opacity="0.5"/>
                <rect x="2"  y="14" width="10" height="10" rx="2" fill="white" fill-opacity="0.5"/>
                <rect x="14" y="14" width="10" height="10" rx="2" fill="white" fill-opacity="0.2"/>
            </svg>
        </div>
        <span class="brand-name">Painel do Aluno</span>
    </a>

    <div class="card">

        <div class="card-icon">
            <svg fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <path d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
            </svg>
        </div>

        <h1 class="card-title">Esqueceu a senha?</h1>
        <p class="card-desc">
            Sem problema. Informe seu e-mail e enviaremos um link para você criar uma nova senha.
        </p>

        @if (session('status'))
            <div class="alert-success">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="field">
                <label for="email">E-mail da conta</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="seu@email.com"
                    required
                    autofocus
                    autocomplete="username"
                />
                @error('email')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-submit">
                <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path d="M4 4l16 8-16 8V4z"/>
                </svg>
                Enviar link de redefinição
            </button>

        </form>
    </div>

    <a href="{{ route('login') }}" class="back-link">
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M19 12H5M12 19l-7-7 7-7"/>
        </svg>
        Voltar para o login
    </a>

    <p class="form-footer">© {{ date('Y') }} — Sistema de Agendamento</p>

</div>

</body>
</html>