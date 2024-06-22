<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'total',
        'date',
    ];
    /**
     * Get all of the product for the Bill
     *
     * @return \Illuminate\DatabProductquent\Relations\HasMany
     */
    public function product(): HasMany
    {
        return $this->hasMany(Purchases::class);
    }
}
