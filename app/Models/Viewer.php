<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viewer extends Model
{
    use HasFactory;
    protected $connection = 'ppid_mysql';
    protected $fillable =[
        'news_id',
        'ip_address',
    ];

    ## Relation
    public function news()
    {
        return $this->belongsTo('App\Models\News');
    }
}
