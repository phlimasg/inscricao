<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{

    protected $fillable = [
        'mensagem', 'CANDIDATO_ID'
    ];
}
