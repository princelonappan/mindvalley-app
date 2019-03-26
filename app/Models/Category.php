<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = true;

    public $table = 'category';
    
    protected $fillable = [
        'id',
        'name',
    ];
    
    public function category()
    {
        return $this->hasMany('App\Models\Article');
    }
}
