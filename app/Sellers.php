<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

}
