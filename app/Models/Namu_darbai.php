<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Namu_darbai extends Model
{
    use HasFactory;
    protected $table = 'Namu_darbai';
    public $timestamps = false;

    public function namuDarbasToTvarkarastis()
    {
        return $this->belongsTo(Tvarkarascio_uzsiemimai::class, 'fk_Tvarkarascio_Uzsiemimas', 'id_Tvarkarascio_Uzsiemimas');
    }
}
