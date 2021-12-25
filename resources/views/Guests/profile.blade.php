@extends('Guests.layouts.app')
@section('content')
	@section('navbar','Profile')
	@include('Guests.layouts.user')
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
	  		<table class="table">
	  			<tr>
	  				<td>Blogs</td>
	  				<td>Comments</td>
	  				<td>Read</td>
	  				<td>Rank</td>
	  			</tr>
	  			<tr>
	  				<td>100</td>
	  				<td>30</td>
	  				<td>360</td>
	  				<td>3</td>
	  			</tr>
	  		</table>
	  	</div>
	  </div>
	  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
	  	<!-- profile -->
			<form class="mt-4">
		      <div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text">Upload</span>
				  </div>
				  <div class="custom-file">
				    <input type="file" class="custom-file-input" accept="image/*" onchange="loadFile(event)">
				    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
				  </div>
				</div>
				<div class="form-group mb-3">
				   <label for="exampleFormControlInput1">Name :</label>
		   			<input type="text" class="form-control" id="exampleFormControlInput1" value="{{$user->name}}">
				</div>
				<div class="form-group mb-3">
				   <label for="exampleFormControlInput1">Family name :</label>
		    		<input type="text" class="form-control" id="exampleFormControlInput1" value="{{$user->last_name}}">
				</div>
				<div class="form-group mb-3">
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" {{$user->gender=='M'?'checked':''}}  id="gender" name="gender" class="custom-control-input">
					  <label class="custom-control-label" for="gender">Male</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" {{$user->gender=='F'?'checked':''}} id="gender2" name="gender" class="custom-control-input">
					  <label class="custom-control-label" for="gender2">Female</label>
					</div>
				</div>
				<div class="form-group mb-3">
				   <label for="exampleFormControlInput1">Date of birth :</label>
		    		<input type="date" class="form-control" id="exampleFormControlInput1"  value="{{$user->date_nais}}">
				</div>
				<button type="submit" class="btn btn-success">Save <i class="fas fa-save pl-2"></i></button>
			</form>
			<!-- end profile -->
	  </div>
	  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
	  	<!-- login -->
	  	<form class="mt-4">
	  		<div class="form-group mb-3">
			   <label for="exampleFormControlInput1">Email :</label>
	   			<input type="text" class="form-control" id="exampleFormControlInput1" value="{{$user->email}}">
			</div>
			<hr>
			<div class="form-group mb-3">
			   <label for="exampleFormControlInput1">old password :</label>
	    		<input type="password" class="form-control" id="exampleFormControlInput1">
			</div>
			<div class="form-group mb-3">
			   <label for="exampleFormControlInput1">new password :</label>
	    		<input type="password" class="form-control" id="exampleFormControlInput1">
			</div>
			<div class="form-group mb-3">
			   <label for="exampleFormControlInput1">confirm password :</label>
	    		<input type="password" class="form-control" id="exampleFormControlInput1">
			</div>
			<button type="submit" class="btn btn-success">Save <i class="fas fa-save pl-2"></i></button>
	  	</form>
		<!-- end login -->
	  </div>
	</div>
@endsection