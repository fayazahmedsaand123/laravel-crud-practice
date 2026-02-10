<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'image',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // A user can have many posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // A user can like many posts
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // A user can comment many posts
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
