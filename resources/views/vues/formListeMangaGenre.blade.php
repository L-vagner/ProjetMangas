@extends('layouts.master')
@section('content')
    <div>
        <div class="container">
            <div class="blanc">
                <h1>Liste des mangas par genre</h1>
            </div>
            {!!  Form::open(['route' => 'postGenre']) !!}
            <div class="col-md-9 well well-sm">
                <div class="form-group">
                    <label class="col-md-3 control-label">Genre :</label>
                    <div class="col-md-6">
                        <select class="form-control" name="sel_genre" id="id_genre">
                            <option value="0" disabled selected>Sélectionner un genre</option>
                            @foreach ($mesGenres as $unG)
                                <option value="{{$unG->id_genre}}">
                                    {{$unG->lib_genre}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br><br>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-default btn-primary"><span
                                class="glyphicon glyphicon-ok"></span> Valider
                        </button>
                        &nbsp;
                        <button type="button" class="btn btn-default btn-primary"
                                onclick="{ window.location = '{{ route('mangas') }}';}">
                            <span class="glyphicon glyphicon-remove"></span>Annuler
                        </button>
                    </div>
                </div>
                <br><br>
            </div>
        </div>
        @include('vues/erreur')
    </div>
@stop
