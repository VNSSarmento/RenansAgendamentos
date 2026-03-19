<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar E-mail — Painel do Aluno</title>
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

        .wrap {
            width: 100%;
            max-width: 420px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* ── BRAND ── */
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

        /* ── CARD ── */
        .card {
            background: #16161a;
            border: 1px solid #2a2a32;
            border-radius: 18px;
            padding: 2.25rem;
            width: 100%;
            text-align: center;
        }

        /* Ícone animado */
        .envelope-wrap {
            width: 72px;
            height: 72px;
            border-radius: 20px;
            background: #1a1828;
            border: 1px solid #534AB7;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            animation: pulse-border 2.5s ease-in-out infinite;
        }

        @keyframes pulse-border {
            0%, 100% { border-color: #534AB7; }
            50%       { border-color: #7F77DD; }
        }

        .envelope-wrap svg { width: 32px; height: 32px; color: #7F77DD; }

        .card-title {
            font-size: 20px;
            font-weight: 700;
            color: #e8e8f0;
            margin-bottom: 8px;
        }

        .card-desc {
            font-size: 13.5px;
            color: #6b6b7a;
            line-height: 1.7;
            margin-bottom: 1.75rem;
        }

        /* Alerta de sucesso */
        .alert-success {
            display: flex;
            align-items: center;
            gap: 9px;
            background: #0f1e1a;
            border: 1px solid #0F6E56;
            border-radius: 10px;
            padding: 12px 14px;
            margin-bottom: 1.5rem;
            text-align: left;
        }

        .alert-success svg   { width: 16px; height: 16px; color: #1D9E75; flex-shrink: 0; }
        .alert-success span  { font-size: 13px; color: #5DCAA5; line-height: 1.5; }

        /* Steps de instrução */
        .steps {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 1.75rem;
            text-align: left;
        }

        .step-row {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .step-dot {
            width: 28px;
            height: 28px;
            border-radius: 8px;
            background: #1e1e26;
            border: 1px solid #2a2a38;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .step-dot svg  { width: 13px; height: 13px; color: #7F77DD; }
        .step-row span { font-size: 12.5px; color: #8888a0; line-height: 1.5; }

        /* Botões */
        .btn-primary {
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
            margin-bottom: 10px;
        }

        .btn-primary:hover { background: #534AB7; }
        .btn-primary svg   { width: 15px; height: 15px; }

        .btn-logout {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            width: 100%;
            padding: 10px;
            background: none;
            color: #6b6b7a;
            border: 1px solid #2a2a38;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            font-family: 'Space Grotesk', sans-serif;
            cursor: pointer;
            transition: background 0.12s, color 0.12s;
        }

        .btn-logout:hover { background: #1e1e26; color: #c0c0cc; }
        .btn-logout svg   { width: 14px; height: 14px; }

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

    <a href="#" class="brand">
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

        <div class="envelope-wrap">
            <svg fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
        </div>

        <h1 class="card-title">Verifique seu e-mail</h1>
        <p class="card-desc">
            Enviamos um link de verificação para o endereço cadastrado. Clique no link para ativar sua conta e começar a usar o sistema.
        </p>

        {{-- Alerta de link reenviado --}}
        @if (session('status') == 'verification-link-sent')
            <div class="alert-success">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Novo link enviado! Verifique sua caixa de entrada ou spam.</span>
            </div>
        @endif

        {{-- Steps de instrução --}}
        <div class="steps">
            <div class="step-row">
                <div class="step-dot">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8"/>
                        <rect x="2" y="6" width="20" height="12" rx="2"/>
                    </svg>
                </div>
                <span>Abra seu e-mail e procure a mensagem do sistema</span>
            </div>
            <div class="step-row">
                <div class="step-dot">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5"/>
                    </svg>
                </div>
                <span>Clique no botão de verificação dentro do e-mail</span>
            </div>
            <div class="step-row">
                <div class="step-dot">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <span>Pronto — sua conta estará ativa e liberada</span>
            </div>
        </div>

        {{-- Reenviar e-mail --}}
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn-primary">
                <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path d="M4 4l16 8-16 8V4z"/>
                </svg>
                Reenviar e-mail de verificação
            </button>
        </form>

        {{-- Sair --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-logout">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Sair da conta
            </button>
        </form>

    </div>

    <p class="form-footer">© {{ date('Y') }} — Sistema de Agendamento</p>

</div>

</body>
</html>