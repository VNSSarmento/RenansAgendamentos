<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // ESSA LINHA É A QUE FALTAVA
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // Permite gravar os dados no banco (RF02)
    protected $fillable = [
        'user_id',
        'slot_id',
        'status',
    ];

    // Relacionamento com o horário selecionado
    public function slot()
    {
        return $this->belongsTo(Slot::class);
    }

    // Relacionamento com o aluno que está logado
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}