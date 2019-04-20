<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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


    public static function exitEmail($email){
        return self::where('email', $email)->first();
    }

    public function tour(){
        return $this->hasMany(Tour::class);
        // return $this->hasMany('App\Comment');

    }

    public function news(){
        return $this->hasMany(ourNew::class);
    }

    public function client(){
        return $this->hasMany(News::class);
    }
    
    public function role(){
        return self::belongsTo(Role::class);
    }

    public function golf(){
        return self::hasMany(ourNew::class);
    }


    // public function 

}
