@extends('Guests.layouts.app')
@section('content')
@section('navbar','Write new blog')
@include('Guests.layouts.user')
	<div class="card">
          <div class="card-body">
            <form action="{{route('update.blog',['id'=>$blog->id])}}" method="POST">
                @csrf
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">{{__('labels.title')}} :</label>
                    <input type="text" class="form-control" placeholder="{{__('labels.title')}} :" name="title" value="{{$blog->title}}">
                    <span class="text-danger">@error('title') {{$message}} @enderror</span>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">{{__('labels.post')}} :</label>
                    <textarea class="form-control"  name="body" placeholder="{{__('labels.post')}} :" rows="5">{{$blog->body}}</textarea>
                  <span class="text-danger">@error('body') {{$message}} @enderror</span>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="#inlineCheckbox1">
                      Categories :
                    </label><br>
                      <select class="js-example-basic-multiple form-control" name="categories[]" multiple="multiple">
                      @foreach ($categories as $item)
                        <option value="{{$item->id}}" 
                          {{in_array($item->id,$blog->category->pluck('id')->toArray())?'selected':''}}>
                          {{$item->title}}</option>
                      @endforeach
                      </select>
                      <span class="text-danger">@error('categories') {{$message}} @enderror</span>
                  </div>
                  <button class="btn btn-primary" type="submit">Post <i class="fas fa-paper-plane"></i></button>
            </form>
          </div>
        </div>

    </div>
    <div class="col-md-3">
    	@include('Guests.layouts.categories')
    </div>
</div>
@endsection