		@foreach($categories as $category)
		<a href="{{route('category.blogs',['category'=>$category->id])}}" class="btn btn-primary mt-4">#{{$category->title}}</a>
		@endforeach