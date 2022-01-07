		@foreach($categories as $category)
		<a href="{{route('category.blogs',['category'=>$category->id])}}" class="btn btn-orange mb-1">#{{$category->title}}</a>
		@endforeach