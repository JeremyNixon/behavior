@extends('behavior-base')
@section('title')
		<title>Create Comment</title>
@stop
@section('body')

<h1>Add a New Comment</h1>


	{{ Form::open(array('url' => "behavior/create-comment/$id", 'method' => 'POST')) }}


		<div class='form-group'>
			{{ Form::label('content') }}<br>
			{{ Form::textarea('content', $value = null, array('class' => 'content-field-comment', 'required' => 'required'))}}
		</div>

		{{ Form::submit('Add') }}

	{{ Form::close() }}

@stop