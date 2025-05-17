<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPhoneNumber extends Model
{
    use HasFactory;

    protected $primaryKey = 'phone_id'; // If your primary key is not 'id'

    protected $fillable = [
        'user_id',
        'phone_number',
        'is_primary',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}