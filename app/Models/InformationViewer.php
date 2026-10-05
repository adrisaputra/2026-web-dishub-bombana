<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationViewer extends Model
{
    use HasFactory;
    protected $fillable =[
        'information_id',
        'ip_address',
    ];

    ## Relation
    public function information()
    {
        return $this->belongsTo('App\Models\Information');
    }
}
