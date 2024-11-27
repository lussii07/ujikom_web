<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Petugas extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'petugas';

    protected $fillable = ['username', 'password'];

    protected $hidden = ['password'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}