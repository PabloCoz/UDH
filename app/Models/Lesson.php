<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getCompletedAttribute()
    {
        return $this->users->contains(auth()->user()->id);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }

    public function description()
    {
        return $this->hasOne(Description::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function resource()
    {
        return $this->morphOne(Resource::class, 'resourceable');
    }

    public function comments()
    {
        return $this->morphToMany(Comment::class, 'commentable');
    }
}
