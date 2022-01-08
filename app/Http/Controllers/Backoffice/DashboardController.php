<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Read;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
    	$users = User::whereDate('created_at',date('Y-m-d'))->get();
    	$blogs = Post::whereDate('created_at',date('Y-m-d'))->get();
    	$top_blogs = Post::withCount('Read')->withCount('Comment')
    	->orderByDesc('read_count')->orderByDesc('comment_count')->get();
    	$top_categories = Category::withCount('Post')->orderBy('post_count','DESC')->get();
    	$active_users = User::where('active',1)->get();
        return view('Backoffice.Dashboard.index',[
        	'active_users' => $active_users,
        	'blogs' => $blogs,
        	'users' => $users,
        	'top_blogs' => $top_blogs,
        	'categories' => $top_categories
        ]);
    }

    public function getBlogs () {
        $blogs = Post::whereDate('created_at',date('Y-m-d'))
        ->with('user')
        ->with('category')
        ->with('read')
        ->with('comment')
        ->get();
        return response()->json($blogs);
    }

    public function getUsers () {
         $users = User::whereDate('created_at',date('Y-m-d'))->with('blog')->with('read')->with('comment')->get();
    return response()->json($users);
    }
}
