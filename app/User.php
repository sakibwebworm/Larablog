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
    /*a user can have many posts*/
    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }
    /*A user can have multiple roles*/
    public function roles()
    {
        return $this->belongsToMany('App\Role')->withTimestamps();
    }
    /*A user can have multiple comments*/
    public function comments()
    {
        return $this->hasMany(Comment::class,'author_id');
    }
    /*An user has one profile*/
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }
    /*String Replace*/
    public function replace($name,$search='-',$replace=' '){
        return str_replace($search,$replace,$name);
    }
    /*Find user by name*/

}
