<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'user-id',
        'good',
    ];


    public function comments()
    {
        return $this->hasMany(comment::class);
    }

    public function users()
    {
        return $this->belongsTo(user::class);
    }

    public function usersFavo()
    {
        return $this->belongsToMany(User::class);
        // return $this->belongsToMany(User::class, 'content_user', 'user_id', 'content_id');
    }


}

