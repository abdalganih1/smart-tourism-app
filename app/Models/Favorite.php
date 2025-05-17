<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    // Note: If using composite PK in migration, Eloquent won't automatically handle incrementing PK
    // If using auto-increment PK 'favorite_id', define it: protected $primaryKey = 'favorite_id';

    protected $fillable = [
        'user_id',
        'target_type',
        'target_id',
        'added_at', // Fillable if not automatically set by DB
    ];

    protected $casts = [
        'added_at' => 'datetime',
    ];


    // Relationship to the user who favorited
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Polymorphic relationship to the favorited item (Site, Product, Article, Hotel)
    public function target()
    {
        return $this->morphTo();
    }
}