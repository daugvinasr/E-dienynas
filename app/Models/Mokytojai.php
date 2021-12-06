<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mokytojai extends Model
{
    use HasFactory;
    protected $table = 'Mokytojai';
    public $timestamps = false;

    public function mokytojasToNaudotojas()
    {
        return $this->belongsTo(Naudotojai::class, 'fk_Naudotojas', 'id_Naudotojas');
    }

    public function mokytojasPamoka()
    {
        return $this->hasMany(Pamokos::class, 'fk_Mokytojas', 'id_Mokytojas');
    }
}
