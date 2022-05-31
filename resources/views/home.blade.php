<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="{{ url(mix('css/styles.css')) }}">
    </head>
    <body>
        <main class="main" style="background-image: url({{asset('img/background.png')}})">
            <section>
                <header>
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('img/logo.png') }}">
                    </a>
                    <p class="title-header">
                        Discografia
                    </p>
                </header>
                @yield('content')
            </section>
        </main>
    </body>
</html>
