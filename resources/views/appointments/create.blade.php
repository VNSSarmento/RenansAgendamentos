<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color:#e8e8f0;">Novo Agendamento</h2>
    </x-slot>

    <style>
        .sched-wrap {
            font-family: 'Space Grotesk', sans-serif;
            background: #0e0e10;
            min-height: calc(100vh - 54px);
            padding: 2rem 1.5rem;
        }

        .sched-inner {
            max-width: 680px;
            margin: 0 auto;
        }

        /* ── TOPO ── */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 12.5px;
            font-weight: 500;
            color: #6b6b7a;
            text-decoration: none;
            margin-bottom: 1.5rem;
            transition: color .12s;
        }
        .back-link:hover { color: #AFA9EC; }
        .back-link svg   { width: 14px; height: 14px; }

        .page-top { margin-bottom: 2rem; }
        .page-top h1 { font-size: 20px; font-weight: 700; color: #e8e8f0; margin-bottom: 3px; }
        .page-top p  { font-size: 13px; color: #6b6b7a; }

        /* ── CARDS ── */
        .scard {
            background: #16161a;
            border: 1px solid #2a2a32;
            border-radius: 14px;
            padding: 1.5rem;
            margin-bottom: 1.25rem;
        }

        .step-label {
            font-size: 10px;
            font-weight: 700;
            color: #7F77DD;
            text-transform: uppercase;
            letter-spacing: .1em;
            margin-bottom: 1rem;
        }

        /* ── SELETOR DE DIAS ── */
        .date-row {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .date-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 64px;
            padding: 10px 6px;
            border-radius: 12px;
            background: #1e1e26;
            border: 1px solid #2a2a38;
            cursor: pointer;
            transition: all .15s;
        }

        .date-btn:hover        { border-color: #534AB7; background: #1a1828; }
        .date-btn.active       { background: #7F77DD; border-color: #7F77DD; }

        .date-btn .db-weekday  { font-size: 10px; font-weight: 600; color: #6b6b7a; text-transform: uppercase; letter-spacing: .06em; }
        .date-btn .db-day      { font-size: 20px; font-weight: 700; color: #e8e8f0; line-height: 1.1; margin: 2px 0; }
        .date-btn .db-month    { font-size: 10px; color: #6b6b7a; }

        .date-btn.active .db-weekday,
        .date-btn.active .db-month  { color: #CECBF6; }
        .date-btn.active .db-day    { color: #fff; }

        /* ── PERÍODOS ── */
        .period-head {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
        }

        .period-icon {
            width: 28px;
            height: 28px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .period-icon svg { width: 14px; height: 14px; }
        .period-icon.morning   { background: #1e1e12; border: 1px solid #633806; }
        .period-icon.afternoon { background: #0f1018; border: 1px solid #3C3489; }

        .period-name  { font-size: 12px; font-weight: 700; color: #8888a0; text-transform: uppercase; letter-spacing: .07em; }
        .period-count { font-size: 11px; color: #3a3a50; margin-left: auto; }

        .period-sep { height: 1px; background: #1e1e26; margin: 1.25rem 0; }

        /* ── GRID DE SLOTS ── */
        .slots-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(68px, 1fr));
            gap: 8px;
        }

        .slot-btn {
            padding: 10px 6px;
            border-radius: 10px;
            background: #1e1e26;
            border: 1px solid #2a2a38;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 13px;
            font-weight: 600;
            color: #AFA9EC;
            cursor: pointer;
            text-align: center;
            transition: all .15s;
        }

        .slot-btn:hover:not(:disabled)  { border-color: #534AB7; background: #1a1828; color: #CECBF6; }
        .slot-btn.selected              { background: #7F77DD; border-color: #7F77DD; color: #fff; }
        .slot-btn:disabled              { background: #1a1a1e; border-color: #1e1e26; color: #3a3a46; cursor: not-allowed; }

        .empty-msg {
            padding: 2rem;
            text-align: center;
            font-size: 13px;
            color: #3a3a50;
            font-style: italic;
        }

        /* ── BARRA DE CONFIRMAÇÃO ── */
        .confirm-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .selected-info .si-label { font-size: 11px; font-weight: 600; color: #6b6b7a; text-transform: uppercase; letter-spacing: .07em; display: block; margin-bottom: 4px; }
        .selected-info .si-val   { font-size: 18px; font-weight: 700; color: #AFA9EC; }
        .selected-info .si-empty { font-size: 13px; color: #3a3a50; font-style: italic; }

        .btn-confirm {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #7F77DD;
            color: #EEEDFE;
            border-radius: 10px;
            padding: 11px 24px;
            font-size: 14px;
            font-weight: 700;
            font-family: 'Space Grotesk', sans-serif;
            border: none;
            cursor: pointer;
            transition: background .15s;
        }

        .btn-confirm:disabled           { background: #2a2a38; color: #3a3a50; cursor: not-allowed; }
        .btn-confirm:not(:disabled):hover { background: #534AB7; }
        .btn-confirm svg { width: 16px; height: 16px; }

        @media (max-width: 500px) {
            .date-row { gap: 6px; }
            .date-btn { width: 54px; }
        }
    </style>

    <div class="sched-wrap">
        <div class="sched-inner">

            <a href="{{ route('dashboard') }}" class="back-link">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Voltar para o painel
            </a>

            <div class="page-top">
                <h1>Novo agendamento</h1>
                <p>Escolha o dia e o horário disponível para seu atendimento</p>
            </div>

            {{-- PASSO 1: DIA --}}
            <div class="scard">
                <div class="step-label">Passo 1 — Selecione o dia</div>
                <div class="date-row" id="dateRow"></div>
            </div>

            {{-- PASSO 2: HORÁRIOS --}}
            <form action="{{ route('appointments.store') }}" method="POST" id="schedForm">
                @csrf
                <input type="hidden" name="slot_id" id="selected_slot_id" required>

                <div class="scard">
                    <div class="step-label">Passo 2 — Escolha o horário</div>

                    <div class="period-head">
                        <div class="period-icon morning">
                            <svg fill="none" stroke="#EF9F27" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="5"/>
                                <path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/>
                            </svg>
                        </div>
                        <span class="period-name">Manhã</span>
                        <span class="period-count" id="morningCount">—</span>
                    </div>
                    <div class="slots-grid" id="morningGrid"></div>

                    <div class="period-sep"></div>

                    <div class="period-head">
                        <div class="period-icon afternoon">
                            <svg fill="none" stroke="#7F77DD" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                            </svg>
                        </div>
                        <span class="period-name">Tarde / Noite</span>
                        <span class="period-count" id="afternoonCount">—</span>
                    </div>
                    <div class="slots-grid" id="afternoonGrid"></div>

                    <div class="empty-msg" id="emptyMsg" style="display:none;">
                        Nenhum horário disponível para este dia.
                    </div>
                </div>

                {{-- PASSO 3: CONFIRMAR --}}
                <div class="scard">
                    <div class="step-label">Passo 3 — Confirme</div>
                    <div class="confirm-bar">
                        <div class="selected-info">
                            <span class="si-label">Horário selecionado</span>
                            <span id="selectedDisplay"><span class="si-empty">Nenhum selecionado ainda</span></span>
                        </div>
                        <button type="submit" class="btn-confirm" id="confirmBtn" disabled>
                            <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path d="M5 13l4 4L19 7"/>
                            </svg>
                            Confirmar agendamento
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </div>

    <script>
        const slots = {!! json_encode($availableSlots) !!};

        const DAYS   = ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb'];
        const MONTHS = ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'];

        let selectedDate = null;
        let selectedSlotId = null;

        function toYMD(d) {
            return d.getFullYear() + '-' +
                   String(d.getMonth() + 1).padStart(2, '0') + '-' +
                   String(d.getDate()).padStart(2, '0');
        }

        function buildDateRow() {
            const row = document.getElementById('dateRow');
            const today = new Date();

            for (let i = 0; i < 7; i++) {
                const d = new Date(today);
                d.setDate(today.getDate() + i);
                const ymd = toYMD(d);

                const btn = document.createElement('div');
                btn.className = 'date-btn' + (i === 0 ? ' active' : '');
                btn.innerHTML = `
                    <span class="db-weekday">${DAYS[d.getDay()]}</span>
                    <span class="db-day">${d.getDate()}</span>
                    <span class="db-month">${MONTHS[d.getMonth()]}</span>
                `;

                btn.addEventListener('click', () => {
                    document.querySelectorAll('.date-btn').forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                    selectedDate = ymd;
                    selectedSlotId = null;
                    document.getElementById('selected_slot_id').value = '';
                    document.getElementById('selectedDisplay').innerHTML = '<span class="si-empty">Nenhum selecionado ainda</span>';
                    document.getElementById('confirmBtn').disabled = true;
                    renderSlots();
                });

                if (i === 0) selectedDate = ymd;
                row.appendChild(btn);
            }
        }

        function renderSlots() {
            const mg  = document.getElementById('morningGrid');
            const ag  = document.getElementById('afternoonGrid');
            const em  = document.getElementById('emptyMsg');
            mg.innerHTML = '';
            ag.innerHTML = '';

            const now     = new Date();
            const todayStr = toYMD(now);

            const filtered = slots.filter(s => {
                if (s.data !== selectedDate) return false;
                if (selectedDate === todayStr) {
                    const [h, m] = s.hora.split(':').map(Number);
                    if (h < now.getHours()) return false;
                    if (h === now.getHours() && m <= now.getMinutes()) return false;
                }
                return true;
            });

            if (filtered.length === 0) {
                em.style.display = 'block';
                document.getElementById('morningCount').textContent = '0 horários';
                document.getElementById('afternoonCount').textContent = '0 horários';
                return;
            }

            em.style.display = 'none';
            let mc = 0, ac = 0;

            filtered.forEach(s => {
                const h   = parseInt(s.hora.split(':')[0]);
                const btn = document.createElement('button');
                btn.type      = 'button';
                btn.className = 'slot-btn';
                btn.textContent = s.hora;

                btn.addEventListener('click', () => {
                    document.querySelectorAll('.slot-btn').forEach(b => b.classList.remove('selected'));
                    btn.classList.add('selected');
                    selectedSlotId = s.id;
                    document.getElementById('selected_slot_id').value = s.id;

                    const activeDateBtn = document.querySelector('.date-btn.active');
                    const dayNum   = activeDateBtn ? activeDateBtn.querySelector('.db-day').textContent : '';
                    const monthNum = activeDateBtn ? activeDateBtn.querySelector('.db-month').textContent : '';
                    document.getElementById('selectedDisplay').innerHTML =
                        `<span class="si-val">${dayNum} ${monthNum} às ${s.hora}</span>`;
                    document.getElementById('confirmBtn').disabled = false;
                });

                if (h < 12) { mg.appendChild(btn); mc++; }
                else        { ag.appendChild(btn); ac++; }
            });

            document.getElementById('morningCount').textContent   = mc + ' horário' + (mc !== 1 ? 's' : '');
            document.getElementById('afternoonCount').textContent = ac + ' horário' + (ac !== 1 ? 's' : '');
        }

        buildDateRow();
        renderSlots();
    </script>

</x-app-layout>