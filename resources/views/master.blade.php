<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            vertical-align: middle;
            color: white
        }

        .header {
            width: auto;
            height: 150px;
            background: black;
        }

        .content {
            width: auto;
            height: 1000px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: gray;
        }

        .footer {
            width: auto;
            height: 150px;
            background: black;
        }

        .title {
            font-size: 96px;
        }

        .solgan {
            font-size: 69px;
        }
    </style>
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