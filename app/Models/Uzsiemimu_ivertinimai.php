<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uzsiemimu_ivertinimai extends Model
{
    use HasFactory;
    protected $table = 'Uzsiemimu_ivertinimai';
    public $timestamps = false;

    public function iverinimastvarkarastis()
    {
        return $this->hasOne(Tvarkarascio_uzsiemimai::class, 'id_Tvarkarascio_Uzsiemimas', 'fk_Tvarkarascio_Uzsiemimas');
    }

    public function iverinimasMokinys()
    {
        return $this->hasOne(Mokiniai::class, 'id_Mokinys', 'fk_Mokinys');
    }
}
