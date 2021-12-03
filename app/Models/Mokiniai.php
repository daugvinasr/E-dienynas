<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mokiniai extends Model
{
    use HasFactory;

    protected $table = 'Mokiniai';
    public $timestamps = false;

    public function mokinysToNaudotojas()
    {
        return $this->belongsTo(Naudotojai::class, 'fk_Naudotojas', 'id_Naudotojas');
    }

}
