<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color:#e8e8f0;">
            {{ __('Painel do Aluno') }}
        </h2>
    </x-slot>

<<<<<<< HEAD
=======
    <style>
        .dash {
            font-family: 'Space Grotesk', sans-serif;
            background: #0e0e10;
            min-height: calc(100vh - 54px);
            padding: 2rem 1.5rem;
        }

        .dash-inner {
            max-width: 860px;
            margin: 0 auto;
        }

        /* ── GREETING ── */
        .dash-greeting {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
        }

        .dash-greeting h1 {
            font-size: 22px;
            font-weight: 700;
            color: #e8e8f0;
            margin-bottom: 3px;
        }

        .dash-greeting p {
            font-size: 13px;
            color: #6b6b7a;
        }

        .dash-avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #534AB7;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 700;
            color: #CECBF6;
            text-transform: uppercase;
            flex-shrink: 0;
        }

        /* ── STATS GRID ── */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 1.5rem;
        }

        .stat-card {
            background: #16161a;
            border: 1px solid #2a2a32;
            border-radius: 14px;
            padding: 1.25rem 1.5rem;
        }

        .stat-card.purple {
            border-color: #534AB7;
            background: #1a1828;
        }

        .stat-card.teal {
            border-color: #0F6E56;
            background: #0f1e1a;
        }

        .stat-label {
            font-size: 11px;
            font-weight: 600;
            color: #6b6b7a;
            text-transform: uppercase;
            letter-spacing: 0.07em;
            margin-bottom: 8px;
        }

        .stat-card.purple .stat-label { color: #7F77DD; }
        .stat-card.teal   .stat-label { color: #1D9E75; }

        .stat-value {
            font-size: 34px;
            font-weight: 700;
            color: #e8e8f0;
            line-height: 1;
        }

        .stat-card.purple .stat-value { color: #AFA9EC; }
        .stat-card.teal   .stat-value { color: #5DCAA5; }

        /* ── BOTÃO NOVO ── */
        .btn-novo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            height: 100%;
            min-height: 88px;
            background: #7F77DD;
            color: #EEEDFE;
            border-radius: 14px;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            letter-spacing: 0.01em;
            transition: background 0.15s;
        }

        .btn-novo:hover { background: #534AB7; color: #EEEDFE; }

        /* ── SECTION CARDS ── */
        .section-card {
            background: #16161a;
            border: 1px solid #2a2a32;
            border-radius: 14px;
            padding: 1.5rem 1.75rem;
            margin-bottom: 1.25rem;
        }

        .section-card:last-child { margin-bottom: 0; }

        .stag {
            display: inline-block;
            font-size: 10px;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: 20px;
            background: #1a1828;
            color: #7F77DD;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            border: 1px solid #534AB7;
            margin-bottom: 0.85rem;
        }

        .stag.green {
            background: #0f1e1a;
            color: #1D9E75;
            border-color: #0F6E56;
        }

        .section-title {
            font-size: 11px;
            font-weight: 700;
            color: #6b6b7a;
            text-transform: uppercase;
            letter-spacing: 0.07em;
            margin-bottom: 0.75rem;
        }

        .next-date {
            font-size: 24px;
            font-weight: 700;
            color: #AFA9EC;
            margin-bottom: 4px;
        }

        .next-empty {
            font-size: 15px;
            color: #3a3a50;
        }

        .pdf-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 12.5px;
            font-weight: 500;
            color: #1D9E75;
            text-decoration: none;
            border: 1px solid #0F6E56;
            border-radius: 8px;
            padding: 6px 13px;
            margin-top: 0.75rem;
            background: #0f1e1a;
            font-family: 'Space Grotesk', sans-serif;
            transition: background 0.12s;
        }

        .pdf-link:hover { background: #132a22; }
        .pdf-link svg   { width: 14px; height: 14px; flex-shrink: 0; }

        .manage-desc {
            font-size: 13px;
            color: #6b6b7a;
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .hist-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            font-weight: 600;
            color: #7F77DD;
            text-decoration: none;
        }

        .hist-link:hover { text-decoration: underline; }
        .hist-link svg   { width: 14px; height: 14px; }

        /* ── RESPONSIVE ── */
        @media (max-width: 600px) {
            .stats-grid { grid-template-columns: 1fr 1fr; }
            .stats-grid > :last-child { grid-column: span 2; }
        }
    </style>

>>>>>>> ff84c950d96f6b411e67b78e185ad6efd9e31c60
    <div class="dash">
        <div class="dash-inner">

            {{-- GREETING --}}
            <div class="dash-greeting">
                <div>
                    <h1>Bom dia, {{ Auth::user()->name }} 👋</h1>
                    <p>Painel de Agendamentos — {{ date('Y') }}</p>
                </div>
                <div class="dash-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                </div>
            </div>

            {{-- STATS + NOVO --}}
            <div class="stats-grid">
                <div class="stat-card purple">
                    <div class="stat-label">Ativos</div>
                    <div class="stat-value">{{ $agendamentosAtivos }}</div>
                </div>

                <div class="stat-card teal">
                    <div class="stat-label">Histórico</div>
                    <div class="stat-value">{{ $totalHistorico }}</div>
                </div>

                <div>
<<<<<<< HEAD
                    <a href="{{ route('appointments.create') }}" class="btn-novoo">
=======
                    <a href="{{ route('appointments.create') }}" class="btn-novo">
>>>>>>> ff84c950d96f6b411e67b78e185ad6efd9e31c60
                        <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path d="M12 5v14M5 12h14"/>
                        </svg>
                        Novo agendamento
                    </a>
                </div>
            </div>

            {{-- PRÓXIMO ATENDIMENTO --}}
            <div class="section-card">
                <div class="stag">Próximo atendimento</div>

                @if($proximoAgendamento && $proximoAgendamento->slot)
                    <div class="next-date">
                        {{ \Carbon\Carbon::parse($proximoAgendamento->slot->start_time)->format('d/m/Y \à\s H:i') }}
                    </div>
                    <a href="{{ route('appointments.pdf', $proximoAgendamento->id) }}" class="pdf-link">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 2l4 4h-4V4z"/>
                        </svg>
                        Baixar comprovante (PDF)
                    </a>
                @else
                    <div class="next-empty">Nenhum agendamento futuro encontrado.</div>
                @endif
            </div>

            {{-- GESTÃO --}}
            <div class="section-card">
                <div class="section-title">Gestão</div>
                <p class="manage-desc">Acompanhe seus horários anteriores e solicitações pendentes.</p>
                <a href="{{ route('appointments.list') }}" class="hist-link">
                    Ver histórico completo
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M5 12h14M13 6l6 6-6 6"/>
                    </svg>
                </a>
            </div>

        </div>
    </div>

</x-app-layout>