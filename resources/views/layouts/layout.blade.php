<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">BLOG</a>
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link @linkactive('/')" href="/" >Главная</a>
                        <a class="nav-link @linkactive('articles')" href="/articles">Статьи</a>
                    @can('moderator', \App\Http\Controllers\ArticleController::class)
                        <a class="nav-link @linkactive('articles/create')" href="/articles/create">Создать</a>
                    @yield('link')
                        <a class="nav-link @linkactive('comment')" href="/comment">Комментарии</a>
                        <a class="nav-link @linkactive('reader')" href="/reader">Читатели</a>
                    @endcan
                    </div>
                </div>
                </div>
                <div class="navbar-nav">
                        @if(Auth::guest())
                            <a class="nav-link" href="/registration">Регистрация</a>
                            <a class="nav-link active" href="/auth/signin">Вход</a>
                        @else
                            <a class="nav-link active" href="/signout">Выход</a>
                        @endif
                </div>
            </div>
        </nav>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
