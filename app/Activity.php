<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * Set Model "Activities" to "user_activities" table
     *
     */
    protected $table = 'user_activities';

    /**
     * What user can change in "Category" model
     *
     */
    protected $fillable = [
        'title'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
