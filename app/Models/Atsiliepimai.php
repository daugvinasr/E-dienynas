<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atsiliepimai extends Model
{
    use HasFactory;

    protected $table = 'Atsiliepimai';
    public $timestamps = false;


    public function atsiliepimasToMokinys()
    {
        return $this->belongsTo(Mokiniai::class, 'fk_Mokinys', 'id_Mokinys');
    }
}
