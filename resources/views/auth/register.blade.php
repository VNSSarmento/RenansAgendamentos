<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta — Painel do Aluno</title>
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

        .reg-card {
            display: flex;
            width: 100%;
            max-width: 820px;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid #2a2a32;
        }

        /* ── ASIDE ── */
        .reg-aside {
            width: 40%;
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
            margin-bottom: 2.5rem;
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
            font-size: 21px;
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

        .steps {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-top: 2rem;
        }

        .step {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .step-num {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: #1e1e26;
            border: 1px solid #534AB7;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 700;
            color: #7F77DD;
            flex-shrink: 0;
            margin-top: 1px;
        }

        .step-text {
            font-size: 12.5px;
            color: #8888a0;
            line-height: 1.55;
        }

        .step-text strong {
            display: block;
            font-weight: 600;
            color: #c0c0d0;
            margin-bottom: 1px;
        }

        .aside-footer {
            font-size: 11px;
            color: #3a3a46;
        }

        /* ── FORMULÁRIO ── */
        .reg-form-area {
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
            margin-bottom: 1.75rem;
        }

        .fields-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0 14px;
        }

        .field { margin-bottom: 1rem; }
        .field.full { grid-column: span 2; }

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

        /* Indicador força de senha */
        .pwd-strength {
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
            margin-top: 5px;
        }

        /* Botões */
        .form-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 1.5rem;
            gap: 1rem;
        }

        .login-link {
            font-size: 12.5px;
            color: #6b6b7a;
            text-decoration: none;
        }

        .login-link span { color: #7F77DD; font-weight: 600; }
        .login-link:hover span { text-decoration: underline; }

        .btn-register {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #7F77DD;
            color: #EEEDFE;
            border-radius: 8px;
            padding: 11px 22px;
            font-size: 14px;
            font-weight: 700;
            font-family: 'Space Grotesk', sans-serif;
            border: none;
            cursor: pointer;
            transition: background 0.15s;
            white-space: nowrap;
        }

        .btn-register:hover  { background: #534AB7; }
        .btn-register:active { transform: scale(0.99); }
        .btn-register svg    { width: 15px; height: 15px; }

        .form-footer {
            font-size: 11px;
            color: #3a3a46;
            text-align: center;
            margin-top: 1.75rem;
        }

        @media (max-width: 640px) {
            .reg-aside { display: none; }
            .reg-card  { border-radius: 16px; }
            .reg-form-area { padding: 2.5rem 1.75rem; }
            .fields-grid { grid-template-columns: 1fr; }
            .field.full { grid-column: span 1; }
        }
    </style>
</head>
<body>

<div class="reg-card">

    {{-- ── ASIDE ── --}}
    <div class="reg-aside">
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

            <h1 class="aside-title">Crie sua conta<br>em segundos.</h1>
            <p class="aside-desc">Acesse todos os recursos do sistema de agendamento acadêmico.</p>

            <div class="steps">
                <div class="step">
                    <div class="step-num">1</div>
                    <div class="step-text">
                        <strong>Preencha seus dados</strong>
                        Nome, e-mail e senha segura
                    </div>
                </div>
                <div class="step">
                    <div class="step-num">2</div>
                    <div class="step-text">
                        <strong>Acesse o painel</strong>
                        Veja seus agendamentos ativos
                    </div>
                </div>
                <div class="step">
                    <div class="step-num">3</div>
                    <div class="step-text">
                        <strong>Agende seu atendimento</strong>
                        Escolha dia e horário disponível
                    </div>
                </div>
            </div>
        </div>

        <span class="aside-footer">Sistema de Agendamento Acadêmico</span>
    </div>

    {{-- ── FORMULÁRIO ── --}}
    <div class="reg-form-area">
        <h2 class="form-heading">Criar nova conta</h2>
        <p class="form-sub">Preencha os campos abaixo para se cadastrar</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="fields-grid">

                {{-- Nome --}}
                <div class="field full">
                    <label for="name">Nome completo</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}"
                        placeholder="Seu nome" required autofocus autocomplete="name"/>
                    @error('name')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- E-mail --}}
                <div class="field full">
                    <label for="email">E-mail institucional</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                        placeholder="seu@email.com" required autocomplete="username"/>
                    @error('email')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Senha --}}
                <div class="field">
                    <label for="password">Senha</label>
                    <input id="password" type="password" name="password"
                        placeholder="••••••••" required autocomplete="new-password"
                        oninput="checkStrength(this.value)"/>
                    <div class="pwd-strength">
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
                    <label for="password_confirmation">Confirmar senha</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                        placeholder="••••••••" required autocomplete="new-password"/>
                    @error('password_confirmation')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="form-actions">
                <a href="{{ route('login') }}" class="login-link">
                    Já tem conta? <span>Entrar</span>
                </a>

                <button type="submit" class="btn-register">
                    <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2M12 11a4 4 0 100-8 4 4 0 000 8zM19 8v6M22 11h-6"/>
                    </svg>
                    Criar conta
                </button>
            </div>
        </form>

        <p class="form-footer">© {{ date('Y') }} — Sistema de Agendamento</p>
    </div>

</div>

<script>
function checkStrength(val) {
    const b1 = document.getElementById('bar1');
    const b2 = document.getElementById('bar2');
    const b3 = document.getElementById('bar3');
    const hint = document.getElementById('pwdHint');

    const len     = val.length >= 8;
    const hasNum  = /\d/.test(val);
    const hasSym  = /[^a-zA-Z0-9]/.test(val);
    const hasMix  = /[a-z]/.test(val) && /[A-Z]/.test(val);

    const score = [len, hasNum || hasSym, hasMix && len].filter(Boolean).length;

    [b1, b2, b3].forEach(b => b.className = 'pwd-bar');

    if (val.length === 0) {
        hint.textContent = 'Mínimo de 8 caracteres';
        hint.style.color = '#3a3a50';
        return;
    }

    if (score === 1) {
        b1.classList.add('weak');
        hint.textContent = 'Senha fraca';
        hint.style.color = '#E24B4A';
    } else if (score === 2) {
        b1.classList.add('medium'); b2.classList.add('medium');
        hint.textContent = 'Senha razoável';
        hint.style.color = '#EF9F27';
    } else {
        b1.classList.add('strong'); b2.classList.add('strong'); b3.classList.add('strong');
        hint.textContent = 'Senha forte';
        hint.style.color = '#1D9E75';
    }
}
</script>

</body>
</html>