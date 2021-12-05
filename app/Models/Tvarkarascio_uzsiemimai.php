<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tvarkarascio_uzsiemimai extends Model
{
    use HasFactory;
    protected $table = 'Tvarkarascio_uzsiemimai';
    public $timestamps = false;

    public function tvarkarastisIvertinimas()
    {
        return $this->hasMany(Uzsiemimu_ivertinimai::class, 'fk_Tvarkarascio_Uzsiemimas', 'id_Tvarkarascio_Uzsiemimas');
    }

    public function tvarkarastispamoka()
    {
        return $this->hasOne(Pamokos::class, 'id_Pamoka', 'fk_Pamoka');
    }

}
