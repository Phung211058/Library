<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Attachment;

class Admin extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $table = 'admins';
    protected $fiilable = [
        'email',
        'phone',
        'password',
        'role',
    ];
}
