<?php

namespace App;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    protected $fillable = [
        'name', 'product_id', 'quantity', 'price', 'reward_points', 'status'
    ];

    /**
     * belongs To relation Product
     */

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
