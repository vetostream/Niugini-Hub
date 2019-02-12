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
     * Get the foreign key
     */
    public function category()
    {
        return $this->belongsTo('App\Categories');
    }

}
