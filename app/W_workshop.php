<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class W_workshop extends Model
{
    public function resworkshops()
    {
        return $this->hasMany(W_resworkshop::class, 'w_workshop_id', 'id');
    }
}
