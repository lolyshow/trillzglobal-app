<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class User_detail extends Model
{
    
    protected $fillable = [
        'name',
        'state',
        'address',
        'dob',
        'user_id'
    ];


}
