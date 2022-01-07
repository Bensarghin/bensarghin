<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index () {
    	$categories = Category::all();
    	return view('backoffice.blogs.mce',[
    		'categories' => $categories
    	]);
    }
}
