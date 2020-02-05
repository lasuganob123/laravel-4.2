@extends('template')

@section('content')

    <h1>Create User</h1>

    <hr>

    {{ Form::model($user, [
        'method' => 'put',
        'action' => ['UserController@update',$user->id]
    ]) }}

        @include('forms.users',['submitButtonText'=>'Update User'])

    {{ Form::close() }}

    @include('errors.list')

@stop