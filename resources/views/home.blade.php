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
                    <img src="{{ asset('img/logo.png') }}">
                    <p class="title-header">
                        Discografia
                    </p>
                </header>
                <form class="search" method="post" action="{{ route('home') }}">
                    @csrf
                    <input class="input-search" type="text" placeholder="Digite uma palavra chave" name="search_value" />
                    <input class="submit" value="Procurar" type="submit" />
                </form>
            </section>
        </main>
    </body>
</html>
