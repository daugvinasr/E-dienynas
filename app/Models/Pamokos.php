<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pamokos extends Model
{
    use HasFactory;
    protected $table = 'Pamokos';
    public $timestamps = false;

    public function pamokaTvarkarastis()
    {
        return $this->hasMany(Tvarkarascio_uzsiemimai::class, 'fk_Pamoka', 'id_Pamoka');
    }

    public function pamokamokytojas()
    {
        return $this->hasOne(Mokytojai::class, 'id_Mokytojas', 'fk_Mokytojas');
    }

}
