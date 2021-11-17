@extends('layouts.app')
@section('content')
@section('list','blogs')
@section('action','list')

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="mb-4">
                <a href="#" class="btn btn-dark">
                    New Post
                </a>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Bloger name ..." aria-label="Username">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
        </div>
        <div class="col-sm-8">
         @foreach ($blogs as $blog)
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6"> 
                            <h5>{{$blog->user->name}} {{$blog->user->last_name}}</h5>
                         </div>
                         <div class="col-sm-6">
                             <div class="text-right">
                                <a href=""><i class="fas fa-trash"></i></a> | 
                                <a href=""><i class="fas fa-edit"></i></a>
                            </div>
                         </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title"> : {{$blog->title}}</h5>
                    <h6 class="mb-3 mb-2 card-subtitle"><i class="fa fa-feather-alt"></i> {{$blog->created_at}}</h6>
                    <p>{{$blog->body}}</p>
                </div>
                <div class="card-footer">
                    @foreach ($blog->category as $item)
                    #<span class="ml-2">{{$item->title}}</span>
                    @endforeach  
                    | <a href="">Comments {{$blog->comment->count()}}</a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
@endsection