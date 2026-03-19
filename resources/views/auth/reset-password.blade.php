<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha — Painel do Aluno</title>
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

        .reset-wrap {
            width: 100%;
            max-width: 440px;
        }

        /* ── BRAND ── */
        .brand {
            display: flex;
            align-items: center;
            gap: 9px;
            justify-content: center;
            margin-bottom: 2rem;
            text-decoration: none;
        }

        .brand-dot {
            width: 32px;
            height: 32px;
            background: #7F77DD;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .brand-dot svg   { width: 17px; height: 17px; }
        .brand-name      { font-size: 15px; font-weight: 700; color: #e8e8f0; }

        /* ── CARD ── */
        .reset-card {
            background: #16161a;
            border: 1px solid #2a2a32;
            border-radius: 18px;
            padding: 2.25rem 2.25rem 2rem;
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
            line-height: 1.6;
            margin-bottom: 1.75rem;
        }

        /* ── FIELDS ── */
        .field { margin-bottom: 1rem; }

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

        /* Medidor de força */
        .pwd-bars {
            display: flex;
            gap: 4px;
            margin-top: 8px;
        }

        .pwd-bar {
            height: 3px;
            flex: 1;
            border-radius: 2px;
            background: #2a2a38;
            transition: background 0.2s;
        }

        .pwd-bar.weak   { background: #E24B4A; }
        .pwd-bar.medium { background: #EF9F27; }
        .pwd-bar.strong { background: #1D9E75; }

        .pwd-hint {
            font-size: 11px;
            color: #3a3a50;
            margin-top: 4px;
        }

        /* Separador */
        .field-sep {
            height: 1px;
            background: #1e1e26;
            margin: 1.25rem 0;
        }

        /* ── BOTÃO ── */
        .btn-reset {
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
            font-size: 14.5px;
            font-weight: 700;
            font-family: 'Space Grotesk', sans-serif;
            cursor: pointer;
            margin-top: 1.5rem;
            transition: background 0.15s;
        }

        .btn-reset:hover  { background: #534AB7; }
        .btn-reset:active { transform: scale(0.99); }
        .btn-reset svg    { width: 16px; height: 16px; }

        /* ── RODAPÉ ── */
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
            margin-top: 1.75rem;
        }
    </style>
</head>
<body>

<div class="reset-wrap">

    {{-- BRAND --}}
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

    {{-- CARD --}}
    <div class="reset-card">

        <div class="card-icon">
            <svg fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
            </svg>
        </div>

        <h1 class="card-title">Redefinir senha</h1>
        <p class="card-desc">Escolha uma nova senha segura para sua conta. Use letras maiúsculas, números e símbolos.</p>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            {{-- E-mail --}}
            <div class="field">
                <label for="email">E-mail da conta</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email', $request->email) }}"
                    placeholder="seu@email.com"
                    required
                    autofocus
                    autocomplete="username"
                />
                @error('email')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field-sep"></div>

            {{-- Nova Senha --}}
            <div class="field">
                <label for="password">Nova senha</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="••••••••"
                    required
                    autocomplete="new-password"
                    oninput="checkStrength(this.value)"
                />
                <div class="pwd-bars">
                    <div class="pwd-bar" id="bar1"></div>
                    <div class="pwd-bar" id="bar2"></div>
                    <div class="pwd-bar" id="bar3"></div>
                </div>
                <div class="pwd-hint" id="pwdHint">Mínimo de 8 caracteres</div>
                @error('password')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            {{-- Confirmar Senha --}}
            <div class="field">
                <label for="password_confirmation">Confirmar nova senha</label>
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    placeholder="••••••••"
                    required
                    autocomplete="new-password"
                />
                @error('password_confirmation')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-reset">
                <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path d="M5 13l4 4L19 7"/>
                </svg>
                Salvar nova senha
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

<script>
function checkStrength(val) {
    const bars = [
        document.getElementById('bar1'),
        document.getElementById('bar2'),
        document.getElementById('bar3'),
    ];
    const hint = document.getElementById('pwdHint');

    bars.forEach(b => b.className = 'pwd-bar');

    if (!val) {
        hint.textContent = 'Mínimo de 8 caracteres';
        hint.style.color = '#3a3a50';
        return;
    }

    const score = [
        val.length >= 8,
        /\d/.test(val) || /[^a-zA-Z0-9]/.test(val),
        /[a-z]/.test(val) && /[A-Z]/.test(val) && val.length >= 8,
    ].filter(Boolean).length;

    if (score === 1) {
        bars[0].classList.add('weak');
        hint.textContent = 'Senha fraca';
        hint.style.color = '#E24B4A';
    } else if (score === 2) {
        bars[0].classList.add('medium');
        bars[1].classList.add('medium');
        hint.textContent = 'Senha razoável';
        hint.style.color = '#EF9F27';
    } else {
        bars.forEach(b => b.classList.add('strong'));
        hint.textContent = 'Senha forte';
        hint.style.color = '#1D9E75';
    }
}
</script>

</body>
</html>