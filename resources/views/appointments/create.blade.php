<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Novo Agendamento</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow-sm sm:rounded-lg">
                
                <div class="mb-6">
                    <label class="block font-bold mb-2">1. Selecione o dia:</label>
                    <input type="date" id="date_filter" class="rounded-md border-gray-300" 
                           value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}">
                </div>

                <form action="{{ route('appointments.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="slot_id" id="selected_slot_id" required>

                    <div class="space-y-6">
                        <div>
                            <h4 class="text-blue-600 font-bold mb-2">☀️ MANHÃ</h4>
                            <div id="morning_grid" class="grid grid-cols-4 md:grid-cols-8 gap-2"></div>
                        </div>
                        <div>
                            <h4 class="text-orange-600 font-bold mb-2">🌙 TARDE/NOITE</h4>
                            <div id="afternoon_grid" class="grid grid-cols-4 md:grid-cols-8 gap-2"></div>
                        </div>
                        <div id="empty_msg" class="hidden text-gray-400 italic">Nenhum horário disponível para este momento.</div>
                    </div>

                    <div class="mt-8 pt-4 border-t flex justify-end">
                        <button type="submit" id="submit_btn" disabled 
                                class="bg-blue-600 text-white px-6 py-2 rounded disabled:opacity-50 font-bold">
                            Confirmar Agendamento
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const slots = {!! json_encode($availableSlots) !!};

        function render() {
            const morning = document.getElementById('morning_grid');
            const afternoon = document.getElementById('afternoon_grid');
            const selectedDate = document.getElementById('date_filter').value;
            const slotInput = document.getElementById('selected_slot_id');
            const btn = document.getElementById('submit_btn');

            morning.innerHTML = '';
            afternoon.innerHTML = '';
            slotInput.value = '';
            btn.disabled = true;

            // Obter data e hora atual do sistema
            const agora = new Date();
            // Formato YYYY-MM-DD para comparar com o input date
            const dataHoje = agora.getFullYear() + '-' + 
                             String(agora.getMonth() + 1).padStart(2, '0') + '-' + 
                             String(agora.getDate()).padStart(2, '0');
            
            const horaAtual = agora.getHours();
            const minutoAtual = agora.getMinutes();

            const filtered = slots.filter(slot => {
                // Primeiro, verifica se é a data selecionada
                if (slot.data !== selectedDate) return false;

                // Se for hoje, filtra horários passados
                if (selectedDate === dataHoje) {
                    const [horaSlot, minutoSlot] = slot.hora.split(':').map(Number);
                    
                    // Se a hora do slot já passou da hora atual, descarta
                    if (horaSlot < horaAtual) return false;
                    
                    // Se for a mesma hora, mas o minuto do slot já passou ou é o atual, descarta
                    // (Dando uma margem de segurança de alguns minutos se preferir)
                    if (horaSlot === horaAtual && minutoSlot <= minutoAtual) return false;
                }

                return true;
            });

            if (filtered.length === 0) {
                document.getElementById('empty_msg').classList.remove('hidden');
                return;
            }
            document.getElementById('empty_msg').classList.add('hidden');

            filtered.forEach(slot => {
                const card = document.createElement('div');
                card.className = "p-2 border rounded text-center cursor-pointer hover:bg-gray-100 font-bold slot-card";
                card.innerText = slot.hora;
                
                card.onclick = () => {
                    document.querySelectorAll('.slot-card').forEach(c => c.classList.remove('bg-blue-600', 'text-white'));
                    card.classList.add('bg-blue-600', 'text-white');
                    slotInput.value = slot.id;
                    btn.disabled = false;
                };

                const hour = parseInt(slot.hora.split(':')[0]);
                if (hour < 12) morning.appendChild(card);
                else afternoon.appendChild(card);
            });
        }

        document.getElementById('date_filter').addEventListener('change', render);
        window.onload = render;
    </script>
</x-app-layout>