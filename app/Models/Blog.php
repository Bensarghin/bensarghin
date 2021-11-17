<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = ['title','body','user_id'];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function category(){
        return $this->belongsToMany('App\Models\Category','categ_blog','blog_id','categ_id');
    }

    public function comment(){
        return $this->hasMany('App\Models\Comment','blog_id');
    }

    
}
