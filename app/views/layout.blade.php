<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Home Page for Registration</title>

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    </head>
    <body>

        <div class="container">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <!-- <a href="{{ action('RegistrationController@index') }}" class="navbar-brand">Registration Collection</a> -->
                </div>
            </nav>
            @yield('content')

        </div>

    </body>
</html>