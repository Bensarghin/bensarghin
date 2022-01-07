@extends('Guests.layouts.app')
@section('content')
	@section('navbar','Profile')
	@include('Guests.layouts.user')
	  	@if(Session::has('success'))
  		<div class="alert alert-success alert-dismissible fade show">
  			<p>{{Session::get('success')}}</p>
  			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
  		</div>
  	@endif
  	@if($errors->any())
  	<div class="alert alert-danger alert-dismissible fade show">
  			@foreach($errors->all() as $error)
  			<li>{{$error}}</li>
  			@endforeach
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    	<span aria-hidden="true">&times;</span>
		  	</button>
  	</div>
  	@endif
	<nav>
	  <div class="nav nav-tabs" id="nav-tab" role="tablist">
	    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Statistics</a>
	    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
	    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Login</a>
	  </div>
	</nav>
	<div class="tab-content" id="nav-tabContent">
	  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
	  	<div class="mt-4">
	  		<table class="table table-striped table-bordered bg-dark table-secondary text-light">
	  			<tr>
	  				<td></td>
	  				<td>Blogs</td>
	  				<td>Comments</td>
	  				<td>Posts Read</td>
	  				<td>Rank</td>
	  			</tr>
	  			<tr>
	  				<td>Today</td>
	  				<td>{{$user->blog->count()}}</td>
	  				<td>{{$user->comment->count()}}</td>
	  				<td>{{$user->read->count()}}</td>
	  				<td>3</td>
	  			</tr>
	  			<tr>
	  				<td>All time</td>
	  				<td>{{$user->blog->count()}}</td>
	  				<td>{{$user->comment->count()}}</td>
	  				<td>{{$user->read->count()}}</td>
	  				<td>3</td>
	  			</tr>
	  		</table>
	  	</div>
	  </div>
	  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

	  	<!-- profile -->
			<form class="mt-4" action="{{route('user.update')}}" method="POST" enctype="multipart/form-data">
				@csrf
		      	<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text">Upload</span>
				  </div>
				  <div class="custom-file">
				    <input type="file" class="custom-file-input" onchange="loadFile(event)" name="image" accept="image/*">
				    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
				  </div>
				</div>
				<hr>
				<div class="row">
					<div class="form-group mb-3 col-6">
					   <label for="name">Name :</label>
			   			<input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
					</div>
					<div class="form-group mb-3 col-6">
					   <label for="family_name">Family name :</label>
			    		<input type="text" class="form-control" name="family_name" id="family_name" value="{{$user->last_name}}">
					</div>
				</div>
				<hr>
				<div class="row">
					
				<div class="form-group mb-3 col-6">
					<label for="exampleFormControlInput1">Gender :</label><br>
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" value="M" id="sexe" name="sexe" class="custom-control-input" {{$user->sexe =='M' ? 'checked' : ''}}  >
					  <label class="custom-control-label" for="sexe">Male</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" value="F" id="sexe2" name="sexe" class="custom-control-input" {{$user->sexe=='F'?'checked':''}} >
					  <label class="custom-control-label" for="sexe2">Female</label>
					</div>
					</div>
					<div class="form-group mb-3 col-6">
					   <label for="dateOfBirth">Date of birth :</label>
			    		<input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" value="{{$user->date_nais}}">
					</div>
				</div>
				<hr>
				<button type="submit" class="btn btn-primary">Save <i class="fas fa-save pl-2"></i></button>
			</form>
			<!-- end profile -->
	  </div>
	  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
	  	<!-- login -->
	  	<form class="mt-4">
	  		<div class="row">
		  		<div class="form-group mb-3 col-6">
				   <label for="exampleFormControlInput1">Email :</label>
		   			<input type="text" class="form-control" id="exampleFormControlInput1" value="{{$user->email}}">
				</div>
				<div class="form-group mb-3 col-6">
				   <label for="exampleFormControlInput1">old password :</label>
		    		<input type="password" class="form-control" id="exampleFormControlInput1">
				</div>
	  		</div>
			<hr>
			<div class="row">
				<div class="form-group mb-3 col-6">
				   	<label for="exampleFormControlInput1">new password :</label>
		    		<input type="password" class="form-control" id="exampleFormControlInput1">
				</div>
				<div class="form-group mb-3 col-6">
				   <label for="exampleFormControlInput1">confirm password :</label>
		    		<input type="password" class="form-control" id="exampleFormControlInput1">
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Save <i class="fas fa-save pl-2"></i></button>
	  	</form>
		<!-- end login -->
	  </div>
	</div>
@endsection