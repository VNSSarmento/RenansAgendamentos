<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;

    // Define quais campos podem ser preenchidos em massa (Mass Assignment)
    protected $fillable = [
        'start_time',
        'end_time',
        'is_available',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    /**
     * Relacionamento: Um slot pode ter um agendamento.
     */
    public function appointment()
    {
        return $this->hasOne(Appointment::class);
    }
}