<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'status'];
    protected $withCount = ['students', 'reviews'];
    const ELABORACION = 1;
    const REVISIÓN = 2;
    const PUBLICADO = 3;

    public function getRatingAttribute()
    {
        if ($this->reviews_count) {
            return round($this->reviews->avg('rating'), 1);
        }else{
            return 0;
        }
        
    }

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function scopeCategory($query, $category_id)
    {
        if($category_id){
            return $query->where('category_id', $category_id);
        }
    }

    public function scopeLevel($query, $level_id)
    {
        if ($level_id) {
            return $query->where('level_id', $level_id);
        }
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function price()
    {
        return $this->belongsTo(Price::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }

    public function audiences()
    {
        return $this->hasMany(Audience::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class, Module::class);
    }

    public function observation()
    {
        return $this->hasOne(Observation::class);
    }
}
