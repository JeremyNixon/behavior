@extends('behavior-base')
<title>Book Reviews</title>
@section('body')

<h1> Book Reviews! </h2>

@if(Auth::check())
<div id="create-post"><a href="/behavior/book_create">Create New Book Review</a></div><br>
@else
<p id="create-post">Login to Create New Review!</p>
@endif
 <?php

		$collection = Book::all();

		# loop through the Collection and access just the data
		?> <div id="post"> <?php
		foreach($collection as $book) {
		    echo  $book->title . "<br><br>" . $book->content . "<br><br><br>";
		}
		?></div><?php



?>


@stop

