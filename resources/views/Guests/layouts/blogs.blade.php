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
            <a href="{{route('edit.blog',['id'=>$blog->id])}}" data-toggle="tooltip" data-placement="top" title="edit post" class="text-success"><i class="fas fa-check fa-sm"></i></a> <a onclick="return confirm('Are sure wanna delete??!!')" href="{{route('delete.blog',['id'=>$blog->id])}}" class="text-danger" data-toggle="tooltip" data-placement="top" title="delete post"><i class="fas fa-times fa-sm"></i></a>
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
            <p class="card-text"><small class="text-muted"><i class="far fa-clock"></i> : {{$blog->created_at->diffForHumans()}}</small></p>
            <p class="card-text">{{Str::limit($blog->body,90)}}</p>
              <a href="{{route('read.blog',['blog'=>$blog->id])}}" class="text-muted">Read <i class="ml-4 fas fa-book-reader"></i> {{$blog->read->count()}} </a>
              <a class="ml-4 text-muted"><i class="far fa-comment"></i> {{$blog->comment->count()}}</a>
         </div>
        </div>
      </div>
      <div class="card-footer">
        @foreach($blog->category as $category)
          <a href="{{route('category.blogs',['category'=>$category->id])}}" class="btn btn-orange btn-sm">#{{$category->title}}</a>
        @endforeach
      </div>
    </div>
    @endforeach
    <div>
      {{$blogs->links()}}
    </div>

  </div>
  @include('Guests.layouts.sidebar')
</div>