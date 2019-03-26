<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $timestamps = true;

    public $table = 'article';
    
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'category_id',
        'status'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    
    public function articleTags()
    {
        return $this->hasMany('App\Models\ArticleTag');
    }
}
