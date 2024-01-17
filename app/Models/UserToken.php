<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserToken extends Model
{
    public $timestamps = false;
    protected $table = 'user_token';

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
