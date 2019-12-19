<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class inscricao extends Model
{
    public $timestamps = false;
    public function historico()
    {
        return $this->hasMany(historico::class, 'id_cand_insc','id')->orderBy('created_at','desc');
    }
}
