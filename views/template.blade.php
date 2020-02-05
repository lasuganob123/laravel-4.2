<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <title>Laravel 4.2 | Practice Sessions</title>
</head>
<body>
    <header>
        <!-- As a heading -->
        <nav class="nav navbar justify-content-end navbar-light bg-light">
            <ul class="nav justify-content-end">
                @if(!Auth::check())
                    <li class="nav-item"><a href="{{ action('PagesController@register'); }}" class="nav-link">Register</a></li> 
                    <li class="nav-item"><a href="{{ action('PagesController@login'); }}" class="nav-link">Login</a></li> 
                @else
                    <li class="nav-item"><a href="{{ action('PagesController@getLogout'); }}" class="nav-link">Logout</a></li> 
                @endif
            </ul>
        </nav>
    </header>
    <div class="container">
        @yield('content')
    </div>
    
    @yield('footer')
</body>
</html>