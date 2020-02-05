@extends('template')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info alert-dismissible fade show">
            {{ Session::get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <h1>Blogs</h1>

    <a href="{{url('/blogs/create')}}" class="btn btn-success">Add New</a>

    <hr>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Author</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <th scope="row">{{$blog->id}}</td>
                    <td>{{$blog->title}}</td>
                    <td>{{$blog->slug}}</td>
                    <td>{{$blog->user->firstname}} {{$blog->user->lastname}}</td>
                    <td>
                        <a type="button" href="{{url('/blogs', $blog->slug)}}" class="btn btn-primary">Open</a>
                        <a type="button" href="{{url('/blogs/'.$blog->slug.'/edit')}}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop