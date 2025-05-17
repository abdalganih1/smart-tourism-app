<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'seller_user_id',
        'name',
        'description',
        'color',
        'stock_quantity',
        'price',
        'main_image_url',
        'category_id',
        'is_available',
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'price' => 'decimal:2', // Cast price to decimal with 2 places
        'stock_quantity' => 'integer',
    ];

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_user_id');
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    // Polymorphic relationships (This product can have many ratings, comments, be favorited)
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'target');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'target');
    }

    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'target');
    }

    // Product can appear in many cart items and order items
    public function shoppingCartItems()
    {
        return $this->hasMany(ShoppingCartItem::class, 'product_id');
    }

     public function orderItems()
    {
        return $this->hasMany(ProductOrderItem::class, 'product_id');
    }
}