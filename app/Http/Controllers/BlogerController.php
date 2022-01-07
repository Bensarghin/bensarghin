<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;


class BlogerController extends Controller
{    

	public function __construct(){

        $this->middleware('auth');

        //its just a dummy data object.
        $topics = Topic::all();
        $categories = Category::all();
        $top_blogs = Post::withCount('Read')->withCount('Comment')
        ->orderByDesc('read_count')->orderByDesc('comment_count')->paginate(8);
        // Sharing is caring
        View::share([
            'categories'=> $categories,
            'topics'=> $topics,
            'top_blogs' => $top_blogs
            
    	]);
    }
    public function create()
    {
        $users = Auth::guard('web')->user();
        return view('Guests.create',[
        'users'        => $users
        ]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'body'=>'required|min:90',
            'categories' => 'required'
        ]);
        $blog = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::id()
        ]);
        $blogs = Auth::user()->blog()->paginate(10);
        $blog->category()->attach($request->categories);
        return redirect()->route('your.blogs',[
            'blogs' => $blogs
        ]);
    }

    public function yourBlogs()
    {
        $blogs = Auth::user()->blog()->orderBy('created_at','DESC')->paginate(10);
        return view('home',[
            'blogs' => $blogs
        ]);

    }

    public function edit($id){
    	$blog = Post::where('id',$id)->first();
    	if($blog){
	    	if($blog->user->id === Auth::id()) {
	    		return view('Guests.edit',[
	    			'blog' => $blog
	    		]);
	    	}
	    	else {
	    		return abort('404');
	    	}
    	}
    	else {
    		return abort('404');
    	}
    }

    public function update(Request $request, $id){
    	$request->validate([
    		'title'=>'required',
    		'body'=>'required|min:90',
    		'categories' => 'required'
    	]);
    	Post::where('id',$id)
    	->update([
    		'title'=>$request->title,
    		'body'=>$request->body
    	]);
    	$blog = Post::find($id);
    	$blog->category()->sync($request->categories);
    	return redirect()->route('your.blogs');
    }

    public function destroy($id){
    	$blog = Post::where('id',$id)->first();
    	if($blog){
	    	if($blog->user->id === Auth::id()) {
	    		$blog->delete();
	    		return redirect()->route('your.blogs');
	    	}
	    	else {
	    		return abort('404');
	    	}
    	}
    	else {
    		return abort('404');
    	}
    }

    public function getUser(){
        $user = Auth::user();
        return response()->json($user);
    }
}
