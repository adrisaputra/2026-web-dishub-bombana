<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    protected $fillable =[
        'category',
        'title',
        'cover',
        'slug',
        'text',
        'file',
        'count_view',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    ## Relation
    public function news_viewer()
    {
        return $this->hasMany('App\Models\NewsViewer');
    }

}
