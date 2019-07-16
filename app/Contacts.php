<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    //
    public $fillable = ['name', 'email', 'contact', 'address', 'pincode', 'user_email'];
}
