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
    protected $fillable = ['date', 'hours', 'user_id', 'location_id', 'category_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function location() {
        return $this->belongsTo('App\Location');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function getTagListAttribute() {
        $this->tags->lists('id');
    }
}
