<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Naudotojai extends Model
{
    use HasFactory;
    protected $table = 'Naudotojai';
    public $timestamps = false;

    public function naudotojasToMokinys()
    {
        return $this->belongsTo(Mokiniai::class, 'id_Naudotojas', 'fk_Naudotojas');
    }
    public function naudotojasToMokytojas()
    {
        return $this->belongsTo(Mokytojai::class, 'id_Naudotojas', 'fk_Naudotojas');
    }
}
