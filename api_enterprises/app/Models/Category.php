<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];

    public function enterprises()
    {
        return $this->belongsToMany('App\Models\Enterprise', 'enterprises_categories', 'category_id', 'enterprise_id');

    }
}
