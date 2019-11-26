<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class inscricaoView extends Model
{
    protected $table = "inscricaoview";

    public function historico()
    {
        return $this->hasMany(historico::class, 'id_cand_insc','NINSC')->orderBy('created_at','desc');
    }
}
