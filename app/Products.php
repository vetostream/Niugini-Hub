<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
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

    public function cart()
    {
        return $this->belongsToMany('App\Cart');
    }

}
