<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = true;

    public $table = 'tag';
    
    protected $fillable = [
        'id',
        'name',
    ];
}
