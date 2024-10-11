@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="blanc">
            <h1>Liste de mangas</h1>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Titre</th>
                <th>Genre</th>
                <th>Dessinateur</th>
                <th>Scenariste</th>
                <th>Prix</th>
                <th>Couververture</th>
                <th><span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier"></span></th>
                <th><span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="top" title="Supprimer"></span></th>
            </tr>
            </thead>
{{--            <tbody>--}}
                @foreach($desMangas as $unManga)
                <tr>
                    <td class="col-xs-2"><p>{{$unManga->titre}}</p>
                    </td>
                    <td class="col-xs-2"><p>{{$unManga->lib_genre}}</p>
                    </td>
                    <td class="col-xs-2"><p>{{$unManga->nom_dessinateur}}</p>
                    </td>
                    <td class="col-xs-2"><p>{{$unManga->nom_scenariste}}</p>
                    </td>
                    <td class="col-xs-2"><p>{{$unManga->prix}}</p>
                    </td>
                    <td class="col-xs-2"><img class="img-rounded"
                                              src="{{asset('assets/images/'.$unManga->couverture)}}" style="max-height: 150px;">
                    </td>
                    <td style="text-align:center;">
                        <a href="{{url('/modifierManga/'.$unManga->id_manga)}}">
                            <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top"
                                  title="Modifier"></span>
                        </a>
                    </td>
                    <td>
                        <a onclick="return confirm('vous êtes sûr de vouloir supprimer?')"
                           href="/supprimerManga/{{$unManga->id_manga}}">
                            <span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="top"
                                  title="Supprimer"></span>
                        </a>
                    </td>
                </tr>
                @endforeach
{{--            </tbody>--}}
        </table>
    </div>
@stop
