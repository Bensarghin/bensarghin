<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;

class pageController extends Controller
{    public function __construct(){

        //its just a dummy data object.
        $topics = Topic::all();
        $categories = Category::all();
        // Sharing is caring
        View::share([
            'categories'=> $categories,
            'topics'=> $topics,
    ]);
    }
    public function contact(){
    	return view('Guests.pages.contact');
    }

    public function about(){
    	return view('Guests.pages.about');
    }
}
