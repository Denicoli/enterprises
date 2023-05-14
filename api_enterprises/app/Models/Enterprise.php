<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'enterprises';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'enterprise_name', 'description', 'city',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'enterprises_categories', 'enterprise_id', 'category_id');
    }
}
