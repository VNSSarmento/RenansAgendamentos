<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meus Agendamentos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                {{-- Mensagens de Sucesso --}}
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 font-medium">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Mensagens de Erro (Regra das 24h) --}}
                @if(session('error'))
                    <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 font-medium">
                        {{ session('error') }}
                    </div>
                @endif

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-gray-600 uppercase text-sm border-b">
                            <th class="py-4 px-2">Data</th>
                            <th class="py-4 px-2">Horário</th>
                            <th class="py-4 px-2 text-center">Status</th>
                            <th class="py-4 px-2">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($appointments as $app)
                            <tr class="border-b hover:bg-gray-50 transition">
                                <td class="py-4 px-2">
                                    {{ \Carbon\Carbon::parse($app->slot->start_time)->format('d/m/Y') }}
                                </td>
                                <td class="py-4 px-2">
                                    {{ \Carbon\Carbon::parse($app->slot->start_time)->format('H:i') }}
                                </td>
                                <td class="py-4 px-2 text-center">
                                    {{-- Compara convertendo para minúsculo para garantir a leitura --}}
                                    @if(strtolower($app->status) == 'active')
                                        <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold uppercase">Ativo</span>
                                    @else
                                        <span class="px-2 py-1 bg-gray-100 text-gray-500 rounded-full text-xs font-bold uppercase italic">Cancelado</span>
                                    @endif
                                </td>
                                <td class="py-4 px-2 flex gap-4 items-center">
                                    
                                    @if(strtolower($app->status) == 'active')
                                        {{-- Link do PDF --}}
                                        <a href="{{ route('appointments.pdf', $app->id) }}" class="text-blue-600 hover:text-blue-800 flex items-center gap-1 text-sm font-medium">
                                            PDF
                                        </a>

                                        <form action="{{ route('appointments.cancel', $app->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja cancelar?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">
                                                Cancelar
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-gray-400 text-xs italic">Sem ações</span>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($appointments->isEmpty())
                    <div class="py-8 text-center text-gray-500 italic">
                        Você ainda não possui agendamentos.
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>