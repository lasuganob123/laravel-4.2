@extends('template')

@section('content')

    <h1>Create User</h1>

    <hr>

    {{ Form::open(array('action' => 'UserController@store', 'method' => 'POST')) }}

        @include('forms.users',['submitButtonText'=>'Submit User'])

    {{ Form::close() }}

    @include('errors.list')

@stop