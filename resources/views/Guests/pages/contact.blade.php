@extends('Guests.layouts.app')
   @section('content')
    @section('navbar','Conatact us')
    <div class="row">
    <form class="col-md-8">
	  <div class="form-group">
	    <label for="exampleInputEmail1">Your email</label>
	    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
	    <small id="emailHelp" class="form-text text-muted"></small>
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Subject :</label>
	    <input type="Subject :" class="form-control form-control-lg" id="exampleInputSubject :1" placeholder="Subject :">
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlTextarea1">Content :</label>
	    <textarea class="form-control form-control-lg" id="exampleFormControlTextarea1" rows="5" placeholder="Content :"></textarea>
	  </div>
	  <button type="submit" class="btn btn-primary pl-4 pr-4">Send</button>
	</form>	
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