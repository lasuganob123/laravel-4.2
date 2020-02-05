@extends('template')

@section('content')
    <h1>Add Blog</h1>
    <hr>
    {{ Form::open(array('action' => 'BlogController@store', 'method' => 'POST')) }}

        @include('forms.blogs',['submitButtonText'=>'Submit Blog'])

    {{ Form::close() }}

    @include('errors.list')
@stop