<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color:#e8e8f0;">
            {{ __('Meu Perfil') }}
        </h2>
    </x-slot>

    <style>
        .profile-wrap {
            font-family: 'Space Grotesk', sans-serif;
            background: #0e0e10;
            min-height: calc(100vh - 54px);
            padding: 2rem 1.5rem;
        }

        .profile-inner {
            max-width: 640px;
            margin: 0 auto;
        }

        /* ── TOPO ── */
        .profile-top { margin-bottom: 1.75rem; }
        .profile-top h1 { font-size: 20px; font-weight: 700; color: #e8e8f0; margin-bottom: 3px; }
        .profile-top p  { font-size: 13px; color: #6b6b7a; }

        /* ── CARDS ── */
        .scard {
            background: #16161a;
            border: 1px solid #2a2a32;
            border-radius: 14px;
            padding: 1.75rem;
            margin-bottom: 1.25rem;
        }

        .scard-head {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 1.5rem;
            padding-bottom: 1.25rem;
            border-bottom: 1px solid #1e1e26;
        }

        .scard-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .scard-icon svg   { width: 17px; height: 17px; }
        .scard-icon.purple { background: #1a1828; border: 1px solid #534AB7; }
        .scard-icon.purple svg { color: #7F77DD; }
        .scard-icon.teal   { background: #0f1e1a; border: 1px solid #0F6E56; }
        .scard-icon.teal svg   { color: #1D9E75; }
        .scard-icon.red    { background: #1e1212; border: 1px solid #791F1F; }
        .scard-icon.red svg    { color: #E24B4A; }

        .scard-title { font-size: 14px; font-weight: 700; color: #e8e8f0; }
        .scard-desc  { font-size: 12px; color: #6b6b7a; margin-top: 2px; }

        /* Avatar */
        .avatar-row {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 1.25rem;
        }

        .avatar-circle {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: #534AB7;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: 700;
            color: #CECBF6;
            flex-shrink: 0;
            text-transform: uppercase;
        }

        .avatar-name  { font-size: 13px; font-weight: 600; color: #e8e8f0; }
        .avatar-email { font-size: 12px; color: #6b6b7a; }

        /* Campos */
        .fgrid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0 14px;
        }

        .field            { margin-bottom: 1rem; }
        .field.full       { grid-column: span 2; }

        .field label {
            display: block;
            font-size: 10.5px;
            font-weight: 600;
            color: #6b6b7a;
            text-transform: uppercase;
            letter-spacing: 0.07em;
            margin-bottom: 5px;
        }

        .field input {
            width: 100%;
            padding: 9px 12px;
            font-size: 13.5px;
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

        /* Medidor de senha */
        .pwd-bars { display: flex; gap: 4px; margin-top: 7px; }

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

        .pwd-hint { font-size: 11px; color: #3a3a50; margin-top: 4px; }

        /* Alerta de e-mail não verificado */
        .unverified-alert {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            background: #1e1a10;
            border: 1px solid #633806;
            border-radius: 8px;
            padding: 10px 12px;
            margin-top: 8px;
        }

        .unverified-alert svg  { width: 14px; height: 14px; color: #EF9F27; flex-shrink: 0; margin-top: 1px; }
        .unverified-alert span { font-size: 12px; color: #EF9F27; line-height: 1.55; }

        .resend-btn {
            background: none;
            border: none;
            color: #EF9F27;
            font-weight: 700;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 12px;
            cursor: pointer;
            text-decoration: underline;
            padding: 0;
        }

        /* Alerta de sucesso inline */
        .alert-success {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #0f1e1a;
            border: 1px solid #0F6E56;
            border-radius: 8px;
            padding: 10px 12px;
            margin-bottom: 1rem;
        }

        .alert-success svg  { width: 14px; height: 14px; color: #1D9E75; flex-shrink: 0; }
        .alert-success span { font-size: 12.5px; color: #5DCAA5; }

        /* Ações do form */
        .form-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 0.25rem;
        }

        .btn-save {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #7F77DD;
            color: #EEEDFE;
            border-radius: 8px;
            padding: 9px 20px;
            font-size: 13px;
            font-weight: 700;
            font-family: 'Space Grotesk', sans-serif;
            border: none;
            cursor: pointer;
            transition: background 0.15s;
        }

        .btn-save:hover  { background: #534AB7; }
        .btn-save.green  { background: #1D9E75; }
        .btn-save.green:hover { background: #0F6E56; }
        .btn-save svg    { width: 14px; height: 14px; }

        /* ── SEÇÃO PERIGO ── */
        .danger-info {
            display: flex;
            align-items: flex-start;
            gap: 9px;
            background: #1e1212;
            border: 1px solid #791F1F;
            border-radius: 10px;
            padding: 12px 14px;
            margin-bottom: 1.25rem;
        }

        .danger-info svg  { width: 16px; height: 16px; color: #E24B4A; flex-shrink: 0; margin-top: 1px; }
        .danger-info span { font-size: 12.5px; color: #F09595; line-height: 1.6; }

        .btn-danger {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #1e1212;
            color: #F09595;
            border: 1px solid #791F1F;
            border-radius: 8px;
            padding: 9px 18px;
            font-size: 13px;
            font-weight: 700;
            font-family: 'Space Grotesk', sans-serif;
            cursor: pointer;
            transition: background 0.15s;
        }

        .btn-danger:hover { background: #2a1212; }
        .btn-danger svg   { width: 14px; height: 14px; }

        /* ── MODAL DE EXCLUSÃO ── */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.7);
            z-index: 100;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .modal-overlay.active { display: flex; }

        .modal-box {
            background: #16161a;
            border: 1px solid #2a2a32;
            border-radius: 16px;
            padding: 2rem;
            width: 100%;
            max-width: 420px;
        }

        .modal-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: #1e1212;
            border: 1px solid #791F1F;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .modal-icon svg { width: 20px; height: 20px; color: #E24B4A; }

        .modal-title { font-size: 16px; font-weight: 700; color: #e8e8f0; margin-bottom: 6px; }
        .modal-desc  { font-size: 13px; color: #6b6b7a; line-height: 1.6; margin-bottom: 1.25rem; }

        .modal-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 1.25rem;
        }

        .btn-cancel {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: none;
            color: #6b6b7a;
            border: 1px solid #2a2a38;
            border-radius: 8px;
            padding: 9px 16px;
            font-size: 13px;
            font-weight: 600;
            font-family: 'Space Grotesk', sans-serif;
            cursor: pointer;
            transition: background 0.12s;
        }

        .btn-cancel:hover { background: #1e1e26; color: #c0c0cc; }

        @media (max-width: 600px) {
            .fgrid { grid-template-columns: 1fr; }
            .field.full { grid-column: span 1; }
        }
    </style>

    <div class="profile-wrap">
        <div class="profile-inner">

            <div class="profile-top">
                <h1>Meu perfil</h1>
                <p>Gerencie suas informações pessoais e de segurança</p>
            </div>

            {{-- ── INFORMAÇÕES DO PERFIL ── --}}
            <div class="scard">
                <div class="scard-head">
                    <div class="scard-icon purple">
                        <svg fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2M12 11a4 4 0 100-8 4 4 0 000 8z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="scard-title">Informações do perfil</div>
                        <div class="scard-desc">Atualize seu nome e endereço de e-mail</div>
                    </div>
                </div>

                <div class="avatar-row">
                    <div class="avatar-circle">
                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                    </div>
                    <div>
                        <div class="avatar-name">{{ Auth::user()->name }}</div>
                        <div class="avatar-email">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                @if (session('status') === 'profile-updated')
                    <div class="alert-success">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Perfil atualizado com sucesso!</span>
                    </div>
                @endif

                <form id="send-verification" method="POST" action="{{ route('verification.send') }}">@csrf</form>

                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')

                    <div class="fgrid">
                        <div class="field full">
                            <label for="name">Nome completo</label>
                            <input id="name" type="text" name="name"
                                value="{{ old('name', $user->name) }}"
                                required autofocus autocomplete="name"/>
                            @error('name')
                                <div class="field-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="field full">
                            <label for="email">E-mail</label>
                            <input id="email" type="email" name="email"
                                value="{{ old('email', $user->email) }}"
                                required autocomplete="username"/>
                            @error('email')
                                <div class="field-error">{{ $message }}</div>
                            @enderror

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div class="unverified-alert">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                    </svg>
                                    <span>
                                        E-mail não verificado.
                                        <button form="send-verification" class="resend-btn">Reenviar verificação</button>
                                    </span>
                                </div>
                                @if (session('status') === 'verification-link-sent')
                                    <div style="font-size:12px;color:#5DCAA5;margin-top:6px;">
                                        Novo link de verificação enviado!
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-save">
                            <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path d="M5 13l4 4L19 7"/>
                            </svg>
                            Salvar alterações
                        </button>
                    </div>
                </form>
            </div>

            {{-- ── ALTERAR SENHA ── --}}
            <div class="scard">
                <div class="scard-head">
                    <div class="scard-icon teal">
                        <svg fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="scard-title">Alterar senha</div>
                        <div class="scard-desc">Use uma senha longa e aleatória para mais segurança</div>
                    </div>
                </div>

                @if (session('status') === 'password-updated')
                    <div class="alert-success">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Senha atualizada com sucesso!</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')

                    <div class="fgrid">
                        <div class="field full">
                            <label for="current_password">Senha atual</label>
                            <input id="current_password" type="password" name="current_password"
                                placeholder="••••••••" autocomplete="current-password"/>
                            @error('current_password', 'updatePassword')
                                <div class="field-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="new_password">Nova senha</label>
                            <input id="new_password" type="password" name="password"
                                placeholder="••••••••" autocomplete="new-password"
                                oninput="pwdStrength(this.value, 'pb', 'ph')"/>
                            <div class="pwd-bars">
                                <div class="pwd-bar" id="pb1"></div>
                                <div class="pwd-bar" id="pb2"></div>
                                <div class="pwd-bar" id="pb3"></div>
                            </div>
                            <div class="pwd-hint" id="ph">Mínimo de 8 caracteres</div>
                            @error('password', 'updatePassword')
                                <div class="field-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="password_confirmation">Confirmar senha</label>
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                placeholder="••••••••" autocomplete="new-password"/>
                            @error('password_confirmation', 'updatePassword')
                                <div class="field-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-save green">
                            <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path d="M5 13l4 4L19 7"/>
                            </svg>
                            Atualizar senha
                        </button>
                    </div>
                </form>
            </div>

            {{-- ── EXCLUIR CONTA ── --}}
            <div class="scard">
                <div class="scard-head">
                    <div class="scard-icon red">
                        <svg fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </div>
                    <div>
                        <div class="scard-title">Excluir conta</div>
                        <div class="scard-desc">Esta ação é permanente e irreversível</div>
                    </div>
                </div>

                <div class="danger-info">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <span>
                        Ao excluir sua conta, todos os agendamentos e dados serão permanentemente removidos.
                        Esta ação não pode ser desfeita.
                    </span>
                </div>

                <button type="button" class="btn-danger" onclick="document.getElementById('deleteModal').classList.add('active')">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M4 7h16"/>
                    </svg>
                    Excluir minha conta
                </button>
            </div>

        </div>
    </div>

    {{-- ── MODAL DE CONFIRMAÇÃO ── --}}
    <div class="modal-overlay" id="deleteModal">
        <div class="modal-box">
            <div class="modal-icon">
                <svg fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </div>

            <div class="modal-title">Excluir conta permanentemente?</div>
            <div class="modal-desc">
                Todos os seus agendamentos e dados serão removidos para sempre.
                Digite sua senha para confirmar.
            </div>

            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <div class="field">
                    <label for="del_password">Sua senha</label>
                    <input id="del_password" type="password" name="password"
                        placeholder="••••••••" required/>
                    @error('password', 'userDeletion')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modal-actions">
                    <button type="button" class="btn-cancel"
                        onclick="document.getElementById('deleteModal').classList.remove('active')">
                        Cancelar
                    </button>
                    <button type="submit" class="btn-danger">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6"/>
                        </svg>
                        Confirmar exclusão
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function pwdStrength(val, prefix, hintId) {
            const bars  = [1,2,3].map(i => document.getElementById(prefix + i));
            const hint  = document.getElementById(hintId);
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

        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) this.classList.remove('active');
        });
    </script>

</x-app-layout>