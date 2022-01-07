<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Topic;
use App\Models\Read;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{

    public function __construct(){

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
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	$blogs = Post::orderBy('created_at','DESC')->paginate(10);
        return view('home',[
        	'blogs' => $blogs
        ]);
    }

    public function read($blog_id)
    {
        session(['blog' => $blog_id]);
        $blog_id = $blog_id;
        $blog = Post::find($blog_id);
        $user_id = Auth::id();
        if($blog){
            if(Auth::user()){
                DB::table('reads')
                ->insertOrIgnore([
                    'user_id' => $user_id,
                    'blog_id' => $blog_id
                ]);
            }
            return view('Guests.read')->with([
                'blog' => $blog
            ]);
        }
        else
            return abort('404');
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

    public function updateComment(Request $request)
    {
        $id = $request->comment_id;
        Comment::find($id)->update([
            'content' => $request->content
        ]);
    }

    public function deleteComment(Request $request)
    {
        $id = $request->id;
        Comment::find($id)->delete();
    }


}
