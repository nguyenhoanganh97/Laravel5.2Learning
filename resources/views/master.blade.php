<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/template/css/mystyle.css') }}">
    
</head>

<body>
    <div class="container">
        <div class="header">

        </div>
        <div class="content">
            @yield('content')
        </div>
        <div class="footer">

        </div>
    </div>
</body>

</html>