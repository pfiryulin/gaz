<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
    ];
    // protected $table = 'category';
    public function productType(): HasMany
    {
        return $this->hasMany(ProductType::class);
    }
    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
