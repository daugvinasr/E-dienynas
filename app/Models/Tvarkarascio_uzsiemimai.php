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
        return Uzsiemimu_ivertinimai::where('fk_Tvarkarascio_Uzsiemimas', $this->id_Tvarkarascio_Uzsiemimas)->get();
        //return $this->hasMany(Uzsiemimu_ivertinimai::class, 'id_Tvarkarascio_Uzsiemimas ', 'fk_Tvarkarascio_Uzsiemimas ');
    }
}
