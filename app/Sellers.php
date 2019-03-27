<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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
     * Get the history ordered associated with the seller.
     */
    public function history()
    {
        $history = DB::table('orders_products')
                        ->join('products', 'orders_products.products_id', '=', 'products.id')
                        ->join('orders', 'orders_products.orders_id', '=', 'orders.id')
                        ->join('users', 'orders.user_id', '=', 'users.id')
                        ->select('orders_products.qty', 'orders_products.created_at', 
                            'products.name AS product_name', 'users.name AS customer', 
                            'users.phone_number')
                        ->where('products.sellers_id', $this->id)
                        ->orderBy('orders_products.id', 'desc')
                        ->get();
    
        return $history;
    }

}
