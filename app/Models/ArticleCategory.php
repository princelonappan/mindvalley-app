<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    public $timestamps = true;
    public $table = 'article_category';

    protected $fillable = [
        'article_id',
        'category_id'
    ];

    public function category()
    {
        return $this->hasMany('App\Models\Article');
    }
}
