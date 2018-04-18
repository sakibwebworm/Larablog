<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //

    public function populateFormdata($id){
      $user=User::findOrFail($id);
      return $user;
    }
    public function populateForm(User $user){

       return $user->getFillable();

    }
}
