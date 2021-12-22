@auth
@include('Guests.layouts.user')
@endauth
        @foreach($blogs as $blog)
        <div class="card mb-3" style="max-width: 40em">
          <div class="card-body">
            <h5 class="card-subtitle mb-2 text-muted">{{$blog->user->name}} {{$blog->user->last_name}}</h5>
            <h5 class="card-title">{{$blog->title}}</h5>
            <p class="card-text">{{$blog->body}}</p>
            <h6 class="card-subtitle mb-2 text-muted"><i class="far fa-clock"></i> : {{$blog->created_at->format('d M Y')}}</h6>
            <a href="{{route('read.blog',['blog'=>$blog->id])}}" class="card-link">Read</a>
            <a href="" class="card-link"><i class="far fa-comment"></i> {{$blog->comment->count()}}</a>
          </div>
          <div class="card-footer">
              
            @foreach($blog->category as $category)
            <a href="{{route('category.blogs',['category'=>$category->id])}}" class="btn btn-secondary btn-sm">#{{$category->title}}</a>
            @endforeach
          </div>
        </div>
        @endforeach
        <div>
            {{$blogs->links()}}
        </div>
    </div>
    @auth
	<div class="col-md-3">
	@else
	<div class="col-md-4">
	@endauth
		@include('Guests.layouts.categories')
	</div>
</div>