@extends('behavior-base')
<title>Login</title>
@section('body')

<h1>Log in</h1>

{{ Form::open(array('url' => '/behavior/login')) }}

    Email<br>
    {{ Form::text('email') }}<br><br>

    Password:<br>
    {{ Form::password('password') }}<br><br>

    {{ Form::submit('Submit') }}

{{ Form::close() }}

@stop