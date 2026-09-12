<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
	protected $fillable =[
        'village_id',
        'title',
        'text',
        'cover'
    ];

    public function all_photo(){
        return $this->hasMany('App\Models\Photo');
    }

    public function photo(){
        return $this->hasOne('App\Models\Photo');
    }
}
