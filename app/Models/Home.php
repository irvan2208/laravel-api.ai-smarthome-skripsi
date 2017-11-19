<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $fillable = [
        'name', 'user_id','address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
