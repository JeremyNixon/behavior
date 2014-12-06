@extends('behavior-base')
<title>Sign Up</title>
@section('body')

<h1>Sign up</h1>

{{ Form::open(array('url' => '/behavior/signup')) }}

    {{ Form::label('Email') }} 
    {{ Form::text('email') }}<br><br>


    {{ Form::label('Name') }} 
	{{ Form::text('name') }}<br><br>

    {{ Form::label('Password') }} 
    {{ Form::password('password') }}<br><br>

    {{ Form::submit('Submit') }}

{{ Form::close() }}

@stop