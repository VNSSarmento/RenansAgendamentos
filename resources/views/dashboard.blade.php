<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel do Aluno') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-blue-500">
                    <div class="text-sm font-medium text-gray-500">Agendamentos Ativos</div>
                    <div class="text-2xl font-bold text-gray-800">{{ $agendamentosAtivos }}</div>
                </div>
                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-green-500">
                    <div class="text-sm font-medium text-gray-500">Total no Histórico</div>
                    <div class="text-2xl font-bold text-gray-800">{{ $totalHistorico }}</div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-center">
                    <a href="{{ route('appointments.create') }}" class="w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition shadow-md">
                        + Novo Agendamento
                    </a>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-8">
                <h3 class="text-lg font-bold mb-4 text-gray-700 flex items-center">
                    <span class="mr-2">📅</span> Seu Próximo Atendimento
                </h3>
                <div class="flex flex-col md:flex-row md:items-center justify-between border-t pt-4 gap-4">
                    <div>
                        <p class="text-sm text-gray-500 italic">Data e Hora:</p>
                        <p class="font-semibold text-lg text-blue-600">
                            <p class="font-semibold text-lg text-blue-600">
                                @if($proximoAgendamento && $proximoAgendamento->slot)
                                    {{ \Carbon\Carbon::parse($proximoAgendamento->slot->start_time)->format('d/m/Y às H:i') }}
                                @else
                                    <span class="text-gray-400 font-normal">Nenhum agendamento futuro encontrado.</span>
                                @endif
                            </p>
                        </p>
                    </div>
                    <div>
                        @if($proximoAgendamento)
                            <a href="{{ route('appointments.pdf', $proximoAgendamento->id) }}" class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800 transition">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 2l4 4h-4V4z"></path></svg>
                                Baixar Comprovante (PDF)
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-2 text-gray-700">Gestão</h3>
                <p class="text-sm text-gray-600 mb-4">Acompanhe seus horários antigos e solicitações pendentes.</p>
                <div class="flex gap-4">
                    <a href="{{ route('appointments.list') }}" class="text-blue-600 hover:underline font-medium text-sm">
                        Ver histórico completo de agendamentos →
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>