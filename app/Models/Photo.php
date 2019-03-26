<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    public $timestamps = true;
    public $table = 'photo';

    protected $fillable = [
        'article_id',
        'name'
    ];

    public function announcement()
    {
        return $this->belongsTo('App\Models\Article');
    }
}
