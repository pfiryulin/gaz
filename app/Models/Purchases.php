<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'bill_id',
        'product_id',
        'price_unit',
        'count',
        'total_price',
        'date',
        'category_id',
        'product_type_id'
    ];

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }
}
