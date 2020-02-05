@extends('template')

@section('content')
    <h4>Hello, {{$user->firstname }} {{$user->lastname}}</h4>
    <hr>
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
                        'url' => '/users/'.$user->id
                    ]) }}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
      
@stop