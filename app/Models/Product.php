<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'price',
        'category_type_id',
    ];
    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }
    public function purchases()
    {
        return $this->hasMan(Purchases::class);
    }
}
