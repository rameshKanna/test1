<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \OwenIt\Auditing\Auditable;
use \OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use \OwenIt\Auditing\Contracts\UserResolver;





class User extends Authenticatable implements AuditableContract, UserResolver
{
    use Notifiable, Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function resolveId()
    {
        return Auth::check() ? Auth::user()->getAuthIdentifier() : null;
    }
}
