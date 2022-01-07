<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Topic;
use App\Models\User;

class ProfileController extends Controller
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

    public function update(Request $request) {
        $request->validate([
            'name'  => 'required',
            'sexe'  => 'required',
            'dateOfBirth'  => 'required|date|before:12 years ago',
            'family_name'  => 'required',
            'photo'  => 'memes:jpg,jpeg,png,webp,gif,svg|max:2048'
        ]);

        $id  = Auth::id();
        User::where('id', $id)
        ->update([
            'name' => $request->name,
            'last_name' => $request->family_name,
            'date_nais' => $request->dateOfBirth,
            'sexe' => $request->sexe,

        ]);
        // update profile
        if($request->file('image') != null) {

            // check file exists before delete old image 
            if (File::exists(public_path('users/'.Auth::user()->profile)) 
                && Auth::user()->profile != "default.png") 
            {
                File::delete(public_path('users/'.Auth::user()->profile));
            }
            //upload new image
            $uploadedFile = $request->file('image');
            $filename = time().$uploadedFile->getClientOriginalName();
            $uploadedFile->move(public_path('users/'),$filename);
            // profile database update
            Auth::user()->profile = $filename;
            Auth::user()->save();
        }

        return redirect()->back()->with('success','Your profile has updated');
    }

    public function index() {
    	$user = Auth::user();
    	return view('Guests.profile',[
    		'user' => $user
    	]);
    }
}
