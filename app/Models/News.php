<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $connection = 'ppid_mysql';
    protected $fillable =[
        'title',
        'text',
        'cover',
        'slug',
        'file',
        'announcement',
        'count_view',
        'user_id',
        'office_id',
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
