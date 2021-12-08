<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pranesimai extends Model
{
    use HasFactory;
    protected $table = 'Pranesimai';
    public $timestamps = false;

    public function pranesimasToMokytojas()
    {
        return $this->belongsTo(Mokytojai::class, 'fk_Mokytojas', 'id_Mokytojas');
    }
    public function pranesimasToMokinys()
    {
        return $this->belongsTo(Mokiniai::class, 'fk_Mokinys', 'id_Mokinys');
    }
}
