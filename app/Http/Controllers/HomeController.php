<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{

    public function __construct(){

        $this->middleware('auth',
            ['except'   =>  ['index',
                            'read',
                            'search',
                            'category',
                            'getComments',
                            'languages']]);

        //its just a dummy data object.
        $topics = Topic::all();
        $categories = Category::all();
        // Sharing is caring
        View::share([
            'categories'=> $categories,
            'topics'=> $topics,
    ]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	$blogs = Blog::orderBy('created_at','DESC')->paginate(10);
        return view('home',[
        	'blogs' => $blogs
        ]);
    }

    public function createBlog()
    {
        $users = Auth::guard('web')->user();
        return view('Guests.create',[
        'users'        => $users
        ]);

    }

    public function storeBlog(Request $request)
    {
        $blog = Blog::create([
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

    public function read($blog)
    {
        session(['blog' => $blog]);
        $blog = Blog::find($blog);
        if($blog)
        return view('Guests.read')->with([
            'blog' => $blog
        ]);
        else
            return abort('404');
    }

    public function yourBlogs()
    {
        $blogs = Auth::user()->blog()->orderBy('created_at','DESC')->paginate(10);
        return view('home',[
            'blogs' => $blogs
        ]);

    }

    public function category($category)
    {
        $categories = Category::find($category)->blog();
        $blogs = $categories->paginate(10);
        if($categories)
        return view('Guests.category',[
            'blogs' => $blogs
        ]);
        else
            return abort('404');
    }

    public function search()
    {
        # code...
    }

    // ===============  vuejs request
    public function getComments()
    {
        $blog = Session::get('blog');
        $comments = Comment::where('blog_id',$blog)->orderBy('created_at','DESC')->with('user')->get();
        return response()->json($comments);
    }

    public function storeComment(Request $request) {

        $blog_id = Session::get('blog');
        $user_id = Auth::id();
        Comment::insert([
           'content' => $request->content,
           'blog_id' => $blog_id,
           'user_id' => $user_id
        ]);
    }
}
