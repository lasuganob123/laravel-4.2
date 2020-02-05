<!-- firstname -->
<div class="form-group">
    {{ Form::label('firstname', 'First Name') }}
    {{ Form::text('firstname', null, array('class'=>'form-control')) }}
</div>

<!-- lastname -->
<div class="form-group">
    {{ Form::label('lastname', 'Last Name') }}
    {{ Form::text('lastname', null, $attributes = array('class'=>'form-control')) }}      
</div>

<!-- emai -->
<div class="form-group">
    {{ Form::label('email', 'Email Address') }}
    {{ Form::email('email', null, $attributes = array('class'=>'form-control')) }}      
</div>

<!-- password -->
<div class="form-group">
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', array('class'=>'form-control')) }}      
</div>

<!-- confirm password -->
<div class="form-group">
    {{ Form::label('password_confirmation', 'Confirm Password') }}
    {{ Form::password('password_confirmation', array('class'=>'form-control')) }}      
</div>

<div class="form-group">
    {{ Form::submit($submitButtonText, ['class'=>'btn btn-success form-control']) }}
</div>