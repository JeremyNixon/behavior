<?php
error_reporting(E_ALL);       # Report Errors, Warnings, and Notices
ini_set('display_errors', 1); # Display errors on page (instead of a log file)
date_default_timezone_set ('america/new_york');
?>

<!doctype html>
<html>
<head>
	@yield('title')
	@section('head')
		<link rel=stylesheet type="text/css" href="{{ URL::asset('/behavior-style.css') }}">
		<link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
	@show
</head>
  <div id='header'>
    <ul id="navlist">
      <li><a href="/behavior">Behavioral Economics</a><li>
      <li><a href="/behavior/review">Book Reviews</a><li>
      <li><a href="/behavior/list">BE Reading List</a><li>
      <li><a href="/behavior/forum">Forum</a><li>
        @if(Auth::check())
      <li><a href="/behavior/logout">Logout</a></li>
    @else
    <li><a href="/behavior/signup">Sign Up</a>|<a href="/behavior/login">Login</a></li>
    @endif

    @if(Auth::check())
        <li>Hello {{ Auth::user()->name; }}!</li>
    @endif 
    </ul>
  </div><br><br>
  <div id="container">
<body>
@yield('body')

	</div>
</body>
</html>