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
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{asset('css/all.min.css')}}" rel="stylesheet" >
    <link href="{{ asset('css/front.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Amita' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
<link
  rel="stylesheet"
  href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css"
  type="text/css"
/>
</head>
<body class="{{__('labels.dir')}}" >
	<div id="main">
	<header>

		<!-- bottom navbar -->
		<div class="main-header">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			  <div class="container">
			  <a class="navbar-brand">ar-solut</a>
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
			          <a class="nav-link" href="{{route('your.blogs')}}">Owner</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="{{route('create.blog')}}">Post <i class="fas fa-plus fa-xl"></i></a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="{{route('create.blog')}}">Blogs</a>
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
			      <!-- login and logout -->
			      <ul class="navbar-nav ml-auto">
    	            @if (Route::has('login'))
	                    @auth
			                <li class="register nav-item dropdown">
					          <a class="nav-link dropdown-toggle user" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					            <i class="fas fa-user fa-sm"></i>
					          </a>
					          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					            <li class="dropdown-item">
					            	<a href="{{ route('user.profile') }}"> 
					            	{{ __('Profile') }}</a>
					            </li>
					            <li class="dropdown-item">
					            	<a href="{{ route('user.profile') }}"> 
					            	{{ __('Edit Login') }}</a>
					            </li>
					            <li class="dropdown-item">
					            	<a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> 
					            	{{ __('Logout') }}</a>
							          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								            @csrf
								      </form>
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
	<div class="container">
		<nav class="navbar navbar-light bg-light" style="margin-bottom: 10px; background: transparent !important;">
		<a style="font-size:20px;cursor:pointer;color:#000;margin-right:20px" onclick="openNav()"><i class="fas fa-bars"></i></a>

		  	<p style="font-family: 'Amita';">Arab got developers</p>
	      <!-- search form -->
	      <form class="d-flex">
			<div class="input-group">
			  <input type="search" class="form-control" placeholder="Search ..." aria-label="Recipient's username" aria-describedby="button-addon2">
			</div>
	      </form>
		</nav>
		<div id="mySidenav" class="sidenav">
		  	<span style="font-size:30px;cursor:pointer;color:#fff;" href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</span>

          	<a class="nav-link active" aria-current="page" href="{{route('home')}}">{{__('layout.home')}}</a>
          	<a href="{{route('about')}}">{{__('layout.about')}}</a>
          	<a href="{{route('contact')}}">{{__('layout.contact')}}</a>
         	 <a href="#">{{__('layout.termes')}}</a>
         	 <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" href="#">English</a>
          	<a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" href="#">عربية</a>

		</div>
		<nav style="--bs-breadcrumb-divider: '/';--bs-breadcrumb-divider-color:'#FFF';"aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
		    <li class="breadcrumb-item active" aria-current="page">@yield('navbar')</li>
		  </ol>
		</nav>		
	</div>
	</header>
