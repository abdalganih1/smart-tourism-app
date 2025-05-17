<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    // If your primary key is not 'id'
    protected $primaryKey = 'user_id';

    // Disable auto-incrementing for PK as it's also FK
    public $incrementing = false;

    // Set primary key type if not integer (though user_id should be unsignedBigInteger)
    protected $keyType = 'int'; // Or 'string' if user_id was UUID/ULID

    // Disable timestamps if only 'updated_at' is used
    // public $timestamps = false; // Only updated_at in schema V2.1, but migration V2.1 added timestamps(). Let's use timestamps().

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'father_name',
        'mother_name',
        'passport_image_url',
        'bio',
        'profile_picture_url',
    ];

    // Define relationship back to User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}