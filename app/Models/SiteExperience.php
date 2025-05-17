<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteExperience extends Model
{
    //
    // app/Models/SiteExperience.php
// ...
    public function comments()
    {
        // Morph relation to Comment where target_type = 'SiteExperience' and target_id = experience_id
        return $this->morphMany(Comment::class, 'target', 'target_type', 'target_id');
        // Explanation of parameters:
        // 'target': The name of the morph relationship in the Comment model (public function target())
        // 'target_type': The column in the Comments table that stores the target model's type (defaults to target_type)
        // 'target_id': The column in the Comments table that stores the target model's ID (defaults to target_id)
        // No need to specify primary key if it's 'id' or standard convention.
    }

     public function ratings()
    {
         // Morph relation to Rating where target_type = 'SiteExperience' and target_id = experience_id
         return $this->morphMany(Rating::class, 'target', 'target_type', 'target_id');
    }

     public function favorites()
    {
         // Morph relation to Favorite where target_type = 'SiteExperience' and target_id = experience_id
         return $this->morphMany(Favorite::class, 'target', 'target_type', 'target_id');
    }
// ...
}
