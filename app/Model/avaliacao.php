<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class avaliacao extends Model
{
    public $timestamps = false; 

    public function qtdInscritos()
    {
        return $this->hasMany(inscricao::class,'AVALIACAO_ID','id');
    }   
}
