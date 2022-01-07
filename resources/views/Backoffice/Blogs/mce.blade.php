@extends('layouts.app')

@section('content')
@section('list','categories')
@section('action','list')

<form action="{{route('blog.insert')}}" method="POST">
    @csrf
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{__('labels.title')}} :</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{__('labels.title')}} :" name="title">
      </div>
      <div class="mb-3">
        <label class="form-label" for="#inlineCheckbox1">
          Categories :
        </label>
        <br>
          <select class="js-example-basic-multiple form-control" name="categories[]" multiple="multiple">
          @foreach ($categories as $item)
            <option value="{{$item->id}}">{{$item->title}}</option>
          @endforeach
          </select>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">{{__('labels.post')}} :</label>

        <textarea id="textarea" name="body"></textarea>
      </div>
      <button class="btn btn-primary" type="submit">Publier <i class="fas fa-paper-plane"></i></button>
</form>

@endsection