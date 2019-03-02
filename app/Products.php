<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'qty'
    ];

    /**
     * Get the foreign key
     */
    public function category()
    {
        return $this->belongsTo('App\Categories');
    }

    public function seller()
    {
        return $this->belongsTo('App\Sellers');
    }

    public function cart()
    {
        return $this->belongsToMany('App\Cart');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Orders');
    }

}
