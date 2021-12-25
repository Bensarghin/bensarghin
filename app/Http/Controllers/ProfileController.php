<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Topic;

class ProfileController extends Controller
{	

	public function __construct(){

        $this->middleware('auth');

        //its just a dummy data object.
        $topics = Topic::all();
        $categories = Category::all();
        // Sharing is caring
        View::share([
            'categories'=> $categories,
            'topics'=> $topics,
    	]);
    }

    public function create()
    {
        $users = Auth::guard('web')->user();
        return view('Guests.create',[
        'users'        => $users
        ]);

    }
    public function index() {
    	$user = Auth::user();
    	return view('Guests.profile',[
    		'user' => $user
    	]);
    }
}
