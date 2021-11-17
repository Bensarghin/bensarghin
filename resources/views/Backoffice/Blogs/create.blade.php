@extends('layouts.app')
@section('content')
@section('list','blogs')
@section('action','new')

@include('layouts.sidebar')
        <div class="card">
          <div class="card-body">
            <form action="{{route('blog.insert')}}" method="POST">
                @csrf
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">{{__('labels.title')}} :</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{__('labels.title')}} :" name="title">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Categories :</label>
                   
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">{{__('labels.post')}} :</label>
                    <textarea class="form-control"  name="body" id="exampleFormControlTextarea1" placeholder="{{__('labels.post')}} :" rows="5"></textarea>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="#inlineCheckbox1">
                      Categories :
                    </label><br>
                      <select class="js-example-basic-multiple form-control" name="categories[]" multiple="multiple">
                      @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->title}}</option>
                      @endforeach
                      </select>
                  </div>
                  <button class="btn btn-primary" type="submit">Publier <i class="fas fa-paper-plane"></i></button>
            </form>
          </div>
        </div>
@endsection