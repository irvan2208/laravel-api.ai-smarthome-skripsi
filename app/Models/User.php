<?php

namespace App\Models;

use App\Models\Home;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait { restore as private restoreEntrust; }
    use SoftDeletes { restore as private restoreSoftDeletes; }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','email_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function homes()
    {
        return $this->hasMany(Home::class);
    }

    public function restore()
    {
        $this->restoreEntrust();
        $this->restoreSoftDeletes();
    }
}
