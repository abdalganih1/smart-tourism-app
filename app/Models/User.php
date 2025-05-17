<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // Import Sanctum trait

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; // Use HasApiTokens trait

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password_hash', // Use password_hash here
        'user_type',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password_hash', // Hide password_hash
        'remember_token', // Keep if remember_token exists
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime', // Keep if email verification is used
        'password_hash' => 'hashed', // Laravel's default 'password' cast uses 'hashed'.
                                    // If you renamed the column to 'password_hash',
                                    // ensure your authentication logic handles it correctly,
                                    // or rename the column back to 'password' in migration
                                    // and just update $fillable/user_type/is_active.
                                    // For API, often handle hashing manually during registration/password change.
                                    // Let's stick to the schema's password_hash for now, but be aware of this.
                                    // For simplicity with Auth::attempt, you might need to map password_hash
                                    // or use a custom guard/provider. A simpler approach is to keep the column name 'password'.
                                    // **Let's revert the column name back to 'password' in migration for easier Auth integration.**
                                    // Update: Given the schema explicitly uses password_hash, let's generate it that way
                                    // and add a note about potential Auth challenges or how to handle.
                                    // For Sanctum APIs, you'll typically manually verify password using Hash::check.
        'is_active' => 'boolean',
    ];

    // Define relationships here

    public function profile()
    {
        return $this->hasOne(UserProfile::class, 'user_id');
    }

    public function phoneNumbers()
    {
        return $this->hasMany(UserPhoneNumber::class, 'user_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'seller_user_id');
    }

    public function shoppingCartItems()
    {
         return $this->hasMany(ShoppingCartItem::class, 'user_id');
    }

    public function productOrders()
    {
         return $this->hasMany(ProductOrder::class, 'user_id');
    }

    public function touristSites()
    {
         // Assuming 'added_by_user_id' in TouristSites refers to a User
         return $this->hasMany(TouristSite::class, 'added_by_user_id');
    }

    public function touristActivities()
    {
         // Assuming 'organizer_user_id' in TouristActivities refers to a User
         return $this->hasMany(TouristActivity::class, 'organizer_user_id');
    }

     public function hotelsManaged()
    {
         // Assuming 'managed_by_user_id' in Hotels refers to a User
         return $this->hasMany(Hotel::class, 'managed_by_user_id');
    }

     public function hotelBookings()
    {
         return $this->hasMany(HotelBooking::class, 'user_id');
    }

     public function siteExperiences()
    {
         return $this->hasMany(SiteExperience::class, 'user_id');
    }

     public function articlesAuthored()
    {
         // Assuming 'author_user_id' in Articles refers to a User
         return $this->hasMany(Article::class, 'author_user_id');
    }

    // Polymorphic relationships (User is the source of the action)
    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'user_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    // Accessors or methods for role checking
    public function isAdmin()
    {
        return $this->user_type === 'Admin';
    }

     public function isVendor()
    {
        return $this->user_type === 'Vendor';
    }

    // ... methods for other user types
}