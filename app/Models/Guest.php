<?php

namespace App\Models;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\Guest as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;

class Guest extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;
    use CanResetPassword;
    protected $guarded = ['id'];

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
}
