@extends('layouts.app')

@section('content')
@section('list','control')
@section('action','panel')

<div class="container"  id="app">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card text-light bg-success">
                <div class="card-body">
                  <li class="list-inline">
                        <li class="list-inline-item">
                            <i class="fas fa-book-reader fa-5x"></i>
                        </li>
                        <li class="list-inline-item ml-2">
                             <h6><a href="" class="text-light">Active Bloggers  </a></h6>
                             <h1>{{$active_users->count()}}</h1>
                        </li>
                    </li>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-light bg-primary">
                <div class="card-body">
                    <li class="list-inline">
                        <li class="list-inline-item">
                            <i class="fas fa-feather-alt fa-5x"></i>
                        </li>
                        <li class="list-inline-item ml-2">
                             <h6>Today Posts</h6>
                             <h1>{{$blogs->count()}}</h1>
                        </li>
                    </li>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-light bg-danger">
                <div class="card-body text-center">
                    <li class="list-inline">
                        <li class="list-inline-item">
                            <i class="fas fa-mouse-pointer fa-5x"></i>
                        </li>
                        <li class="list-inline-item ml-2">
                             <h6>Today Visits</h6>
                             <h1>30</h1>
                        </li>
                    </li>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-light bg-secondary">
                <div class="card-body text-center">
                    <li class="list-inline">
                        <li class="list-inline-item">
                            <i class="fas fa-user-plus fa-5x"></i>
                        </li>
                        <li class="list-inline-item ml-2">
                             <h6>Today register</h6>
                             <h1>30</h1>
                        </li>
                    </li>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <div class="row">
            <div class="col-md-8">
                <new-blog-component></new-blog-component>
            </div>
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item">
                        <h4>Top Categories</h4>
                    </li>
                    @foreach($categories as $category) 
                    <li class="list-group-item">
                        {{$category->title}}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <div class="row">
            <div class="col-md-8">
                <new-register-component></new-register-component>
            </div>
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item">
                        <h4>Top posts</h4>
                    </li>
                    @foreach($top_blogs as $post) 
                    <li class="list-group-item">
                        {{$post->title}}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
