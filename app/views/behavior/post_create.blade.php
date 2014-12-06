@extends('behavior-base')
@section('title')
		<title>Create Post</title>
@stop
@section('body')

<h1>Add a New Post</h1>


	{{ Form::open(array('url' => 'behavior/create-post', 'method' => 'POST')) }}


		<div class='form-group'>
			{{ Form::label('title') }}<br>
			{{ Form::text('title', $value = null, array('class' => 'title-field', 'required' => 'required')) }}
		</div>

		<div class='form-content'>
			<br>
			{{ Form::label('content') }}<br>
			{{ Form::textarea('content', $value = null, array('class' => 'content-field', 'required' => 'required'))}}
		</div>
		<br>

		{{ Form::submit('Submit') }}

	{{ Form::close() }}


@stop

