<!-- firstname -->
<div class="form-group">
    {{ Form::hidden('user_id',Auth::id()) }}
</div>

<!-- lastname -->
<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, $attributes = array('class'=>'form-control')) }}      
</div>

<!-- emai -->
<div class="form-group">
    {{ Form::label('slug', 'Slug') }}
    {{ Form::text('slug', null, $attributes = array('class'=>'form-control','disabled'=>$disabled)) }}
</div>

<!-- password -->
<div class="form-group">
    {{ Form::label('content', 'Content') }}
    {{ Form::textarea('content', null, $attributes = array('class'=>'form-control')) }}      
</div>

<div class="form-group">
    {{ Form::submit($submitButtonText, ['class'=>'btn btn-success form-control']) }}
</div>