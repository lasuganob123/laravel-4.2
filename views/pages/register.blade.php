@extends('template')

@section('content')

    {{ Form::open(array('action' => 'PagesController@postCreate', 'method' => 'POST')) }}
        <h2 class="form-signup-heading">Please Register</h2>
        <hr>
        @include('forms.users',['submitButtonText'=>'Register'])

        @include('errors.list')
    {{ Form::close() }}
@stop