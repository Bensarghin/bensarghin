@extends('Guests.layouts.app')
@section('content')
@section('navbar','Write new blog')
<div class="row">
  <div class="col-md-8">
	       <div class="card">
          <div class="card-body">
            <form action="{{route('store.blog')}}" method="POST">
                @csrf
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">{{__('labels.title')}} :</label>
                    <input type="text" class="form-control" value="{{old('title')}}" placeholder="{{__('labels.title')}} :" name="title">
                    <span class="text-danger">@error('title') {{$message}} @enderror</span>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">{{__('labels.post')}} :</label>
                    <textarea class="form-control" name="body" value="{{old('title')}}" placeholder="{{__('labels.post')}} :" rows="5"></textarea>
                    <span class="text-danger">@error('body') {{$message}} @enderror</span>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="#inlineCheckbox1">
                      Categories :
                    </label><br>
                      <select class="js-example-basic-multiple form-control" name="categories[]" multiple="multiple">
                      @foreach ($categories as $item)
                        <option value="{{$item->id}}" {{in_array($item->id,old('categories')?: [])?'selected':''}}>{{$item->title}}</option>
                      @endforeach
                      </select>
                   <span class="text-danger">@error('categories') {{$message}} @enderror</span>
                  </div>
                  <button class="btn btn-primary" type="submit">Post <i class="fas fa-paper-plane"></i></button>
            </form>
          </div>
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
@endsection