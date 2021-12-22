<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BENSARGHIN</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="bensarghin hamid">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="{{asset('css/app.css')}}" rel="stylesheet" >
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{asset('css/all.min.css')}}" rel="stylesheet" >
    <link href="{{ asset('css/front.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
</head>
<body>

		
	<div class="body-bg"></div>
	<div id="body" class="container">
	<header>

		<!-- top navbar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
		  <div class="container-fluid">
		  	<a class="navbar-brand"><span>b</span><span>غ</span></a>
		      <ul class="navbar-nav m-auto">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="{{route('home')}}">{{__('layout.home')}}</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#">{{__('layout.about')}}</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#">{{__('layout.contact')}}</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#">{{__('layout.termes')}}</a>
		        </li>
		      </ul>
		      <ul class="navbar-nav me-auto">
		        <li class="nav-item">
		          <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" class="nav-link" href="#">English</a>
		        </li>
		        <li class="nav-item">
		        	<a class="nav-link">/</a>
		        </li>
		        <li class="nav-item">
		          <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" class="nav-link" href="#">عربية</a>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>

		<!-- bottom navbar -->
		<div class="main-header">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			  <div class="container-fluid">
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse" id="navbarNav">
			    	<!-- menu -->
			      <ul class="navbar-nav mr-auto">
			        <li class="nav-item">
			          <a class="nav-link active" aria-current="page" href="{{route('home')}}">Trends</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link active" aria-current="page" href="#">Recomanded</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="{{route('your.blogs')}}">Your-Blogs</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="{{route('create.blog')}}">New-Blog</a>
			        </li>
			        <li class="nav-item dropdown">
			          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			            Topics
			          </a>
			          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			            @foreach ($topics as $item)
						<li><a class="dropdown-item" href="#">{{$item->title}}</a></li>
						@endforeach
			          </ul>
			        </li>
			      </ul>
			      <!-- search form -->
			      <form class="d-flex">
					<div class="input-group">
					  <input type="search" class="form-control" placeholder="Search ..." aria-label="Recipient's username" aria-describedby="button-addon2">
					  <button class="btn btn-outline-light" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
					</div>
			      </form>
			      <!-- login and logout -->
			      <ul class="navbar-nav ml-auto">
    	            @if (Route::has('login'))
	                    @auth
			                <li class="register nav-item dropdown">
					          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					            {{Auth::user()->name}} {{Auth::user()->last_name}}
					          </a>
					          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						            @csrf
						      </form>
					          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					            <li>
					            	<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> 
					            	{{ __('Logout') }}</a>
					            </li>
					          </ul>
					        </li>
	                    @else
					      	<li class="register nav-item">
				                <div class="hidden fixed top-0 right-0 px-6 sm:block">
		                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

		                        @if (Route::has('register'))
		                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
		                        @endif
				                </div>
				            </li>
	                    @endauth
		           @endif
			      </ul>
			    </div>  

			  </div>
			</nav>
		</div>

	</header>

	<nav style="--bs-breadcrumb-divider: '/';--bs-breadcrumb-divider-color:'#FFF';" class="mt-4" aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="#">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">@yield('navbar')</li>
	  </ol>
	</nav>
