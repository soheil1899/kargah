<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class W_resworkshop extends Model
{

    public function workshop()
    {
        return $this->belongsTo(W_workshop::class,'w_workshop_id', 'id');
    }

    public function wuser()
    {
        return $this->belongsTo(W_user::class, 'w_user_id', 'user_id');
    }

}
