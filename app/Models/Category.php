<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\ProductType;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
    ];
    // protected $table = 'category';
    public function productTypes(): HasMany
    {
        return $this->hasMany(ProductType::class, 'category_id', 'id');
    }
    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    public function purchases(): HasMany
    {
        return $this->hasMany(Purchases::class);
    }
}
