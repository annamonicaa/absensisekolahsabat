<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'password',
        'role_id',
        'church_id',
        'ukss_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */


    // protected function role(): Attribute
    // {
    //     return new Attribute (
    //         get: fn ($value) => ["sekretaris", "admin", "staff", "konferens"][$value],
    //     );
    // }

    public function church ()
    {
        return $this->belongsTo('App\Models\Church');
    }

    public function role ()
    {
        return $this->belongsTo('App\Models\Role');
    }
    
    public function ukss ()
    {
        return $this->belongsTo('App\Models\Ukss');
    }
}
