<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleTag extends Model
{
    public $timestamps = true;
    public $table = 'article_tag';

    protected $fillable = [
        'article_id',
        'tag_id'
    ];

    public function article()
    {
        return $this->belongsTo('App\Models\Article');
    }
    
    public function tag()
    {
        return $this->belongsTo('App\Models\Tag');
    }
}
