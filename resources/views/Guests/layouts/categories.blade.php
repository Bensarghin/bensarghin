		@foreach($categories as $category)
		<a href="{{route('category.blogs',['category'=>$category->id])}}" class="btn btn-primary mb-2">#{{$category->title}}</a>
		@endforeach