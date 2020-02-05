@extends('template')

@section('content')
    <h1>Edit Blog</h1>
    <hr>
    {{ Form::model($blog, [
        'method' => 'put',
        'action' => ['BlogController@update',$blog->slug]
    ]) }}

        @include('forms.blogs',['submitButtonText'=>'Update Blog', 'disable'=>true])

    {{ Form::close() }}

    @include('errors.list')
@stop