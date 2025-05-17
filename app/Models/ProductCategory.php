<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $primaryKey = 'category_id';
    public $timestamps = false; // No timestamps in schema

    protected $fillable = [
        'name',
        'description',
        'parent_category_id',
    ];

    // Hierarchical relationship
    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_category_id');
    }

    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'parent_category_id');
    }

    // Relationship to products in this category
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}