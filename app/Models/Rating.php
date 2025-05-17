<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $primaryKey = 'rating_id';

    protected $fillable = [
        'user_id',
        'target_type',
        'target_id',
        'rating_value',
        'review_title',
        'review_text',
    ];

    protected $casts = [
        'rating_value' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function target()
    {
        return $this->morphTo();
    }
}