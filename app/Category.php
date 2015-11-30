<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Set Model "Category" to "categories" table
     *
     */
    protected $table = 'categories';

    /**
     * What user can change in "Category" model
     *
     */
    protected $fillable = ['title'];

    public function activities() {
        return $this->hasMany('App\Activity');
    }
}
