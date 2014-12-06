@extends('behavior-base')
<title>The Forum</title>
@section('body')

<h1> Welcome to the Behavior Forum! </h2>

@if(Auth::check())
<div id="create-post"><a href="/behavior/post_create">Create New Post</a></div><br>
@else
<p id="create-post">Login to Create a New Post!</p>
@endif
 <?php

		$collection = Post::all();

		# loop through the Collection and access just the data
		?> <div id="post-link"> <?php
		foreach($collection as $post) {
		    echo  "<a href=\"/behavior/post/" . $post->id . "\">" . $post->title . "</a>" . "<br><br>";
		}
		?></div><?php



?>


@stop

