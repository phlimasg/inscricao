<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class escolaridade extends Model
{
    public $timestamps = false;

    public function integral()
    {
        return $this->hasOne(integral::class,'esc_id','ID');
    }
    
}
