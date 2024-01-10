<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Thread extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'body',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function getRouteKeyName()
    {
        return 'id';
    }

    public function votes()
    {
        return $this->hasMany('App\Models\Vote');
    }

    public function upvotes()
    {
    return $this->votes()->where('type', 'upvote');
    }

    public function downvotes()
    {
        return $this->votes()->where('type', 'downvote');
    }
}
