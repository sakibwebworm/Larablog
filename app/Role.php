<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    const ROLE_ADMIN = 'admin';
    const ROLE_EDITOR = 'editor';
    const ROLE_SUBSCRIBER ='subscriber';
    /*A role belongs to a user*/
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
