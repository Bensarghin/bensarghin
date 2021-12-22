<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:admin');
    }

    public function index(){

        $users = User::all();
        return view('Backoffice.Users.index',['users'=>$users]);
    }

    public function show(User $user)
    {
        $users = User::find($user)->first();
        if($users)
        return view('Backoffice.Users.show',[
            'users'        =>$users
        ]);
        else
        abort(404);
    }

    

    public function create()
    {
        return view('admin_pages.Users.create');

    }
    
    public function store(User $user)
    {
        $users = User::find($user);
        if($users){
            $users->delete();
        }
        else{
            return redirect()->route('user');
        }

    }

    public function edit(User $user)
    {
        $users = User::find($user);
        if($user)
        return view('Backoffice.Users.show',[
            'users'        =>$users
        ]);
        else
        abort(404);
    }

    public function destroy(User $user)
    {
        $users = User::find($user);
        if($users){
            $users->delete();
        }
        else{
            return redirect()->route('user');
        }

    }
}
