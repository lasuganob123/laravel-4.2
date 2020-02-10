<!-- Hidden user_id -->
<div class="form-group">
    {{ Form::hidden('user_id',Auth::id()) }}
</div>

<!-- Title -->
<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, $attributes = array('class'=>'form-control')) }}      
</div>

<!-- Slug -->
<div class="form-group">
    {{ Form::label('slug', 'Slug') }}
    {{ Form::text('slug', null, $attributes = array('class'=>'form-control', $disabled)) }}
</div>

<!-- Content -->
<div class="form-group">
    {{ Form::label('content', 'Content') }}
    {{ Form::textarea('content', null, $attributes = array('id'=>'wysiwyg','class'=>'form-control')) }}      
</div>

<!-- Tag -->
<div class="form-group">
    {{ Form::label('tag_list', 'Tags') }}
    {{ Form::select('tag_list[]',$tags,null, ['id'=>'tagList','class'=>'form-control','multiple']) }}
</div>

<div class="form-group">
    {{ Form::submit($submitButtonText, ['class'=>'btn btn-success form-control']) }}
</div>

@section('footer')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $('#tagList').select2({
                placeholder: 'Select tag/s',
                theme: 'classic'
            });

            CKEDITOR.replace('wysiwyg');
        });
    </script>
@stop