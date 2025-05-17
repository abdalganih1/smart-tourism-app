<?php
// app/Models/TouristSite.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TouristSite extends Model
{
    use HasFactory;

    protected $primaryKey = 'site_id';

    protected $fillable = [
        'name',
        'description',
        // ... other fillable fields
        'category_id',
        'added_by_user_id',
    ];

    // Relationships
    public function category()
    {
        return $this->belongsTo(SiteCategory::class, 'category_id');
    }

    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_by_user_id');
    }

    public function activities()
    {
        return $this->hasMany(TouristActivity::class, 'site_id');
    }

    public function experiences()
    {
        return $this->hasMany(SiteExperience::class, 'site_id');
    }

    // Polymorphic relationships (this site is the target)
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'target'); // 'target' is the base name for target_type and target_id
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'target');
    }

     public function favorites()
    {
        return $this->morphMany(Favorite::class, 'target');
    }
}