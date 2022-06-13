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
    ];


    public function comments()
    {
        return $this->hasMany(comment::class);
    }

    public function users()
    {
        return $this->belongsTo(user::class);
    }
}
