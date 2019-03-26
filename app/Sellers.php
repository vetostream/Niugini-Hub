<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Orders;

class Sellers extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sellers';

    /**
     * Get the foreign key
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the products associated with the seller.
     */
    public function products()
    {
        return $this->hasMany('App\Products');
    }

    /**
     * Get the products ordered associated with the seller.
     */
    public function orders()
    {
        $product_ids = $this->products->pluck('id');

        return Orders::whereHas('products', function($query) use($product_ids)
        {
            $query->whereIn('products_id', $product_ids);
        })->get();
    }

}
