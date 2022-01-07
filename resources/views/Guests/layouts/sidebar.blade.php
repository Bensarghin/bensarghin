	<div class="col-md-4">
	 <div class="text-center">
      <h3 class="text-bold">Follow us</h3>
        <ul class="list-inline">
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
		<div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item list-group-item-info">Top posts</li>
				@foreach($top_blogs as $blog)
				<li class="list-group-item">
					<h5>{{$blog->title}}</h5>
					<p>{{Str::limit($blog->body,65)}}</p>
					<a href="">Read more</a>
				</li>
				@endforeach
			</ul>
		</div>
	</div>