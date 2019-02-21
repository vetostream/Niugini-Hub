<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_date', 'total', 'address', 'delivery_method', 'payment_status', 'payment_date'
    ];

    /**
     * Get the foreign key
     */
    public function category()
    {
        return $this->belongsTo('App\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Products')->withPivot('qty');;
    }

}
