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
       // return $this->hasMany(Tvarkarascio_uzsiemimai::class, 'id_Pamoka', 'fk_Pamoka');
        return Tvarkarascio_uzsiemimai::where('fk_Pamoka', $this->id_Pamoka)->get();
    }


}
