@extends('behavior-base')

	<?php $collection = Post::findOrFail($id); ?>

@section('title')
		<title><?php echo $collection->title ?></title>
@stop
@section('body')


<div id='post'>	
<h1> <?php echo $collection->title; ?> </h2>
</div>

<br><br>
<div id='comment'>
<?php echo $collection->content . '<br>'; ?>
</div>
<br><br>
	@if(Auth::check())

<h2>Comments:</h2>
<?php
/* Create Post Form */

		?> <div id="create-comment"><a href="/behavior/comment_create/{{ $id }}">Comment on This Post</a></div><br> <?php

?>

<br>

	@else 
<br>
<h2>Comments:</h2>
<p>Login to Comment!</p>
	@endif
<div id='comments'>
<?php 

$collection = Comment::all();
foreach($collection as $comment){
	if($comment->post_id == $id){
		$user = User::where('id', 'LIKE', "$comment->user_id")->first();
		echo $user->name . ":  " . $comment->content . "<br>";
}}
?>
</div>

@stop