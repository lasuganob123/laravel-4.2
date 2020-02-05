@extends('template')

@section('content')
    {{ Form::open(array('action'=>'PagesController@postSignin', 'method'=>'patch', 'class'=>'form-signin')) }}
        <h2 class="form-signin-heading">Please Login</h2>
        <hr>
        <div class="form-group">
            {{ Form::text('email', null, array('class'=>'input-block-level form-control', 'placeholder'=>'Email Address')) }}
        </div>
        
        <div class="form-group">
            {{ Form::password('password', array('class'=>'input-block-level form-control', 'placeholder'=>'Password')) }}
        </div>
    
        {{ Form::submit('Login', array('class'=>'btn btn-large btn-primary btn-block'))}}
    {{ Form::close() }}

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
@stop