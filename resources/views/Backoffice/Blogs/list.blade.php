@extends('layouts.app')
@section('content')
@section('list','blogs')
@section('action','list')

<div class="container">
    <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-8">
            <div class="input-group mb-3">
                <select class="form-control mr-2">
                    <option disabled selected>Topics</option>
                    <option>Marketing</option>
                    <option>Programming</option>
                    <option>Phones</option>
                    <option>All</option>
                </select>
                <input type="date" name="" class="form-control mr-2">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Bloger name ..." aria-label="Username">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <div class="form-check form-check-inline mb-3">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
              <label class="form-check-label" for="inlineCheckbox1">Most Read</label>
            </div>
            <div class="form-check form-check-inline mb-3">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
              <label class="form-check-label" for="inlineCheckbox2">Most Comments</label>
            </div>
            <div class="form-check form-check-inline mb-3">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
              <label class="form-check-label" for="inlineCheckbox3">Most active</label>
            </div>
         @foreach ($blogs as $blog)
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6"> 
                            <h1 class="text-bold text-capitalize">{{$blog->title}}</h1>
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
                    <h6 class="p-1 text-capitalize">{{$blog->user->name}} {{$blog->user->last_name}}</h6>
                    <h6 class="text-muted p-1"><i class="far fa-clock"></i> {{$blog->created_at->diffForHumans()}}</h6>
                    <p>{!!$blog->body!!}</p>
                </div>
                <div class="card-footer">
                    @foreach ($blog->category as $item)
                    <span class="ml-2">#{{$item->title}}</span>
                    @endforeach  
                    | <a href="">Reads {{$blog->read->count()}}</a> <a href="">Comments {{$blog->comment->count()}}</a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
@endsection