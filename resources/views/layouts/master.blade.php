<!doctype html>
<html lang="fr">
<head>
    <title>Mangas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {!! Html::style('assets/css/bootstrap.css') !!}
    {!! Html::style('assets/css/monStyle.css') !!}
    <link href="//fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet" type="text/css">
</head>
<body class="body">
<div class="container">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#navbar-collapse-target">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route("home") }}">Mes Mangas</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-target">
                <ul class="nav navbar-nav">
                    <li><a href="{{ route("mangas")}}">Lister</a></li>
                    <li><a href="{{ route("selGenre") }}">Mangas par genre</a></li>
                    <li><a href="{{ route("insManga") }}">Ajouter</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="container">
 @yield('content')
</div>
{!! Html::script('assets/js/jsquery-3.1.1.js') !!}
{!! Html::script('assets/js/bootstrap.js') !!}
</body>
</html>
