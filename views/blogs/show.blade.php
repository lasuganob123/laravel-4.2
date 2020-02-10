@extends('template')

@section('content')
    <h2>{{ $blog->title }}</h4>
        <small class="text-muted">Posted by: {{$blog->user->firstname}} {{$blog->user->lastname}}</small>
        |
        <small class="text-muted">Posted {{$blog->created_at->diffForHumans()}}</small>
        <br>
        @if(!$blog->tags->isEmpty())
            @foreach($blog->tags as $tag)
                <small class="p-1 bg-secondary text-white"><i>{{$tag->name}}</i></small>
            @endforeach
        @endif
    <hr>
    <blockquote class="blockquote">
        <p class="mb-0">{{$blog->content}}</p>
    </blockquote>
    <hr>
    <a href="{{url('/blogs/'.$blog->slug.'/edit')}}" class="btn btn-warning">Edit</a>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
        Delete
    </button>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Are you sure you want to delete this?</p>
                </div>
                <div class="modal-footer">
                    {{ Form::open([
                        'method' => 'DELETE',
                        'url' => '/blogs/'.$blog->slug
                    ]) }}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@stop