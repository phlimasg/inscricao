<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class candidato extends Model
{
    public $timestamps = false;
    public function historico()
    {
        return $this->hasMany(historico::class, 'id_cand_insc','id')->orderBy('created_at','desc');
    }
    public function Mensagens()
    {
        return $this->hasMany(Mensagem::class,'CANDIDATO_ID','id');
    }

    public function respFin()
    {
        return $this->hasOne(respFin::class,'CPF','RESPFIN_CPF');
    }
}
