<?php

namespace Database\Seeders;

use App\Models\Slot;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlotSeeder extends Seeder
{
    public function run(): void
    {
        // Usar delete em vez de truncate para evitar erro de chave estrangeira
        DB::table('slots')->delete();

        $dataInicio = new \DateTime('2026-03-18');
        $dataFim = new \DateTime('2026-12-31');

        while ($dataInicio <= $dataFim) {
            if ($dataInicio->format('N') != 7) {
                for ($h = 8; $h <= 21; $h++) {
                    // Criamos a string na mão para não ter erro
                    $dataFormatada = $dataInicio->format('Y-m-d');
                    $horaFormatada = str_pad($h, 2, '0', STR_PAD_LEFT) . ":00:00";

                    Slot::create([
                        'start_time' => $dataFormatada . " " . $horaFormatada,
                        'end_time'   => $dataFormatada . " " . str_pad($h + 1, 2, '0', STR_PAD_LEFT) . ":00:00",
                        'is_available' => true,
                    ]);
                }
            }
            $dataInicio->modify('+1 day');
        }
    }
}