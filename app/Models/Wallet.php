<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Wallet extends Model
{
    
    protected $fillable = [
        'wallet_code',
        'main',
        'referral',
        'bonus',
        'user_id'
    ];


}
