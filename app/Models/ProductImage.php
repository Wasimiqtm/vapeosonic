<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage  extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_images';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public function getImageUrlAttribute()
    {
        return checkImage('products/' . $this->name);
    }

    public function getImageThumbAttribute()
    {
        return checkImage('products/thumbs/' . $this->name);
    }

    /**
     * belongs To relation Product
     */
    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id', 'name', 'default', 'is_active'];
}



