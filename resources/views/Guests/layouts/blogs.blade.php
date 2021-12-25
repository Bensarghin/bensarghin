<div class="row">
	<div class="col-md-8">
    
    @foreach($blogs as $blog)
    <div class="card mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-md-9">
            <h5 class="card-title">{{$blog->title}}</h5>
            <h5 class="card-subtitle mb-2 text-muted">{{$blog->user->name}} {{$blog->user->last_name}}</h5>
          </div>
          @auth
          @if($blog->user->id == Auth::id())
          <div class="col-md-3">
            <div class="action text-right" style="line-height: 4">
            <a href="{{route('edit.blog',['id'=>$blog->id])}}" class="text-secondary"><i class="fas fa-eraser"></i></a> | <a onclick="return confirm('Are sure wanna delete??!!')" href="{{route('delete.blog',['id'=>$blog->id])}}" class="text-danger"><i class="fas fa-times"></i></a>
            </div>
          </div>
          @endif
          @endauth
        </div>
      </div>
      <div class="row g-0">
        <div class="col-md-4">
          <img src="/uploads/best.webp" class="rounded-start" width="250" height="175" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <p class="card-text"><small class="text-muted"><i class="far fa-clock"></i> : {{$blog->created_at->format('d M Y')}}</small></p>
            <p class="card-text">{{Str::limit($blog->body,90)}}</p>
              <a href="{{route('read.blog',['blog'=>$blog->id])}}" class="card-muted">Read more</a>
              <a class="ml-4 text-muted"><i class="far fa-comment"></i> {{$blog->comment->count()}}</a>
         </div>
        </div>
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

	<div class="col-md-4">

    <div class="text-center">
        <ul class="list-inline">
          <li class="list-inline-item"><a class="h4 text-bold text-uppercase text-muted">Share :</a></li>
          <li class="list-inline-item"><a href="" style="color: #002087"><i class="fab fa-facebook-square fa-2x"></i></a></li>
          <li class="list-inline-item"><a href="" style="color: #de0023"><i class="fab fa-instagram-square fa-2x"></i></a></li>
          <li class="list-inline-item"><a href="" style="color: #000"><i class="fab fa-github-square fa-2x"></i></a></li>
          <li class="list-inline-item"><a href="" style="color: #1c99e6"><i class="fab fa-twitter-square fa-2x"></i></a></li>
          <li class="list-inline-item"><a href="" style="color: #091d2f"><i class="fab fa-linkedin fa-2x"></i></a></li>
        </ul>
    </div>
    <div class="text-center">
		    @include('Guests.layouts.categories')
    </div>
    <hr>
	</div>
</div>