<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color:#e8e8f0;">
            {{ __('Meus Agendamentos') }}
        </h2>
    </x-slot>

<<<<<<< HEAD
=======
    <style>
        .list-wrap {
            font-family: 'Space Grotesk', sans-serif;
            background: #0e0e10;
            min-height: calc(100vh - 54px);
            padding: 2rem 1.5rem;
        }

        .list-inner {
            max-width: 860px;
            margin: 0 auto;
        }

        /* ── TOPO ── */
        .list-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.75rem;
            gap: 1rem;
        }

        .list-top h1 {
            font-size: 20px;
            font-weight: 700;
            color: #e8e8f0;
            margin-bottom: 3px;
        }

        .list-top p {
            font-size: 13px;
            color: #6b6b7a;
        }

        .btn-novo {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #7F77DD;
            color: #EEEDFE;
            border-radius: 10px;
            padding: 9px 18px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            font-family: 'Space Grotesk', sans-serif;
            white-space: nowrap;
            transition: background 0.15s;
            flex-shrink: 0;
        }

        .btn-novo:hover { background: #534AB7; color: #EEEDFE; }
        .btn-novo svg   { width: 14px; height: 14px; }

        /* ── ALERTAS ── */
        .alert {
            display: flex;
            align-items: center;
            gap: 9px;
            border-radius: 10px;
            padding: 12px 16px;
            margin-bottom: 1.25rem;
            font-size: 13px;
            font-weight: 500;
        }

        .alert svg { width: 16px; height: 16px; flex-shrink: 0; }

        .alert-success {
            background: #0f1e1a;
            border: 1px solid #0F6E56;
            color: #5DCAA5;
        }

        .alert-error {
            background: #1e1212;
            border: 1px solid #791F1F;
            color: #F09595;
        }

        /* ── CARD TABELA ── */
        .table-card {
            background: #16161a;
            border: 1px solid #2a2a32;
            border-radius: 14px;
            overflow: hidden;
        }

        .appt-table {
            width: 100%;
            border-collapse: collapse;
        }

        .appt-table thead tr {
            border-bottom: 1px solid #2a2a32;
        }

        .appt-table th {
            padding: 14px 16px;
            font-size: 10.5px;
            font-weight: 700;
            color: #6b6b7a;
            text-transform: uppercase;
            letter-spacing: 0.07em;
            text-align: left;
        }

        .appt-table th.col-center { text-align: center; }

        .appt-table tbody tr {
            border-bottom: 1px solid #1e1e26;
            transition: background 0.1s;
        }

        .appt-table tbody tr:last-child { border-bottom: none; }
        .appt-table tbody tr:hover      { background: #1e1e26; }

        .appt-table td {
            padding: 14px 16px;
            font-size: 13.5px;
            color: #c0c0cc;
            vertical-align: middle;
        }

        .appt-table td.col-center { text-align: center; }

        /* Células */
        .date-main {
            font-weight: 600;
            color: #e8e8f0;
        }

        .time-badge {
            display: inline-block;
            background: #1e1e26;
            border: 1px solid #2a2a38;
            border-radius: 6px;
            padding: 3px 9px;
            font-size: 12px;
            font-weight: 600;
            color: #AFA9EC;
        }

        /* Status */
        .status-pill {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            border-radius: 20px;
            padding: 3px 10px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .status-pill::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .status-active {
            background: #0f1e1a;
            border: 1px solid #0F6E56;
            color: #5DCAA5;
        }

        .status-active::before { background: #1D9E75; }

        .status-cancelled {
            background: #1a1a1e;
            border: 1px solid #2a2a38;
            color: #6b6b7a;
        }

        .status-cancelled::before { background: #3a3a46; }

        /* Ações */
        .actions-cell { display: flex; align-items: center; gap: 8px; }

        .act-btn {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
            font-weight: 600;
            border-radius: 7px;
            padding: 5px 11px;
            text-decoration: none;
            font-family: 'Space Grotesk', sans-serif;
            cursor: pointer;
            transition: background 0.12s;
            border: none;
        }

        .act-btn svg { width: 13px; height: 13px; flex-shrink: 0; }

        .act-pdf {
            color: #7F77DD;
            border: 1px solid #534AB7;
            background: #1a1828;
        }

        .act-pdf:hover { background: #221e38; color: #7F77DD; }

        .act-cancel {
            color: #F09595;
            border: 1px solid #791F1F;
            background: #1e1212;
        }

        .act-cancel:hover { background: #2a1212; }

        .no-actions {
            font-size: 12px;
            color: #3a3a46;
            font-style: italic;
        }

        /* Estado vazio */
        .empty-state {
            padding: 3.5rem 1rem;
            text-align: center;
        }

        .empty-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: #1e1e26;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }

        .empty-icon svg { width: 22px; height: 22px; color: #3a3a50; }

        .empty-state p {
            font-size: 14px;
            color: #3a3a50;
            margin-bottom: 1.25rem;
        }

        .btn-empty {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #7F77DD;
            color: #EEEDFE;
            border-radius: 9px;
            padding: 9px 18px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            font-family: 'Space Grotesk', sans-serif;
        }

        .btn-empty:hover { background: #534AB7; color: #EEEDFE; }

        @media (max-width: 600px) {
            .list-top { flex-direction: column; align-items: flex-start; }
            .appt-table th:nth-child(2),
            .appt-table td:nth-child(2) { display: none; }
        }
    </style>
>>>>>>> ff84c950d96f6b411e67b78e185ad6efd9e31c60

    <div class="list-wrap">
        <div class="list-inner">

            {{-- TOPO --}}
            <div class="list-top">
                <div>
                    <h1>Meus agendamentos</h1>
                    <p>Histórico e status dos seus atendimentos</p>
                </div>
                <a href="{{ route('appointments.create') }}" class="btn-novo">
                    <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path d="M12 5v14M5 12h14"/>
                    </svg>
                    Novo agendamento
                </a>
            </div>

            {{-- ALERTA SUCESSO --}}
            @if(session('success'))
                <div class="alert alert-success">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            {{-- ALERTA ERRO --}}
            @if(session('error'))
                <div class="alert alert-error">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ session('error') }}
                </div>
            @endif

            {{-- TABELA --}}
            @if($appointments->isEmpty())

                <div class="table-card">
                    <div class="empty-state">
                        <div class="empty-icon">
                            <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <p>Você ainda não possui agendamentos.</p>
                        <a href="{{ route('appointments.create') }}" class="btn-empty">
                            <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" style="width:14px;height:14px;">
                                <path d="M12 5v14M5 12h14"/>
                            </svg>
                            Criar primeiro agendamento
                        </a>
                    </div>
                </div>

            @else

                <div class="table-card">
                    <table class="appt-table">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Horário</th>
                                <th class="col-center">Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $app)
                                <tr>
                                    <td>
                                        <span class="date-main">
                                            {{ \Carbon\Carbon::parse($app->slot->start_time)->format('d/m/Y') }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="time-badge">
                                            {{ \Carbon\Carbon::parse($app->slot->start_time)->format('H:i') }}
                                        </span>
                                    </td>
                                    <td class="col-center">
                                        @if(strtolower($app->status) == 'active')
                                            <span class="status-pill status-active">Ativo</span>
                                        @else
                                            <span class="status-pill status-cancelled">Cancelado</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if(strtolower($app->status) == 'active')
                                            <div class="actions-cell">
                                                <a href="{{ route('appointments.pdf', $app->id) }}" class="act-btn act-pdf">
                                                    <svg fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 2l4 4h-4V4z"/>
                                                    </svg>
                                                    PDF
                                                </a>

                                                <form action="{{ route('appointments.cancel', $app->id) }}" method="POST"
                                                      onsubmit="return confirm('Tem certeza que deseja cancelar este agendamento?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="act-btn act-cancel">
                                                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                            <path d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                        Cancelar
                                                    </button>
                                                </form>
                                            </div>
                                        @else
                                            <span class="no-actions">Sem ações</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            @endif

        </div>
    </div>

</x-app-layout>