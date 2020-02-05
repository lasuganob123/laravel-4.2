@if (Session::has('message'))
    <div class="alert alert-danger">
        {{ Session::get('message') }}
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif