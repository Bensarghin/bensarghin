@extends('Guests.layouts.app')
@section('content')
@section('navbar','read blog')
<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header text-capitalize">
				<h1 class="text-bold text-capitalize">{{$blog->title}}</h1>
			</div>
			<div class="card-body">
				<div class="p-2">
					<ul class="list-inline">
						<li class="list-inline-item">
						<img src="/uploads/avatar.jpg" height="35" width="35" class="rounded"></li>
						<li class="list-inline-item">
							<h5 class="text-muted text-capitalize p-2">Write by : {{$blog->user->name}} {{$blog->user->last_name}}</h5>
						</li>
					</ul>
					<h6 class="card-subtitle text-muted"> <i class="far fa-clock"></i> : {{$blog->created_at->diffForHumans()}}</h6>
				</div>
				<img class="card-img-top mt-2" src="/uploads/best.webp" alt="Card image cap">
				<p class="mb-4 mt-5">{{$blog->body}}</p>

					<h5 class="text-muted">Reads {{$blog->read->count()}}</h5>
				@foreach($blog->category as $category)
					<a href="" class="btn btn-primary">#{{$category->title}}</a>
				@endforeach
			</div>
		</div>
		@auth
		<div id="app">
			<comments-component></comments-component>
		</div>
		@else
		<div class="alert alert-info">
			if you want to see comments or create a blog try to <a href="{{route('login')}}">login</a> or <a href="{{route('register')}}">sign up</a>  
		</div>
		@endauth
	</div>
  @include('Guests.layouts.sidebar')
</div>
<script>
</script>
@endsection