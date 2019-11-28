<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class W_user extends Model
{
    public function resworkshops()
    {
        return $this->hasMany(W_resworkshop::class, 'w_user_id', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
