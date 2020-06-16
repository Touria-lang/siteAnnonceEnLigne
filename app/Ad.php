<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = ['title', 'description', 'localisation', 'price', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
