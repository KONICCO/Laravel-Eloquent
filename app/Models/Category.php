<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = "categories";
    protected $primaryKey = "id";
    protected $keyType = "string";
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        "id",
        "name",
        "description"
    ];

    protected $casts = [
        'created_at' => 'datetime:U'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, "category_id", "id");
    }

    protected static function booted(): void
    {
        parent::booted();
        self::addGlobalScope(new IsActiveScope());
    }

    public function cheapestProduct(): HasOne
    {
        return $this->hasOne(Product::class, "category_id", "id")->oldest("price");
    }

    public function mostExpensiveProduct(): HasOne
    {
        return $this->hasOne(Product::class, "category_id", "id")->latest("price");
    }

    public function reviews(): HasManyThrough
    {
        return $this->hasManyThrough(Review::class, Product::class, "category_id", "product_id", "id", "id");
    }
}
