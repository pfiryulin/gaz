<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
// App\Models\HasMany;
use App\Models\Category;

class ProductType extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'category_id',
    ];
    // protected $table = 'product_type';
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function purchases()
    {
        return $this->hasMany(Purchases::class);
    }
}
