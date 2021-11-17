@extends('layouts.app')
@section('content')

@include('layouts.sidebar')
@section('list','user')
@section('action','blogs')

@foreach ($users->blog as $blog)
<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="card-title">
                    {{$blog->title}} | <i class="fa fa-feather-alt"></i> {{$blog->created_at}}
                </h3>
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
        <p>{{$blog->body}}</p>
    </div>
    <div class="card-footer bg-light card-light">
        @foreach ($blog->category as $item)
           #<span class="ml-2">{{$item->title}}</span>
        @endforeach  
        | <a href="">Comments {{$blog->comment->count()}}</a>
    </div>
</div>
@endforeach

@endsection