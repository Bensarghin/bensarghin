<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    public $timestamps = true;
    protected $casts = [
        'created_at'   => 'date:Y M d H:i',
    ];

    public function blog(){
        return $this->belongsTo('App\Models\blog','blog_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\user','user_id');
    }
}
