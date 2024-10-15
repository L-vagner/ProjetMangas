@extends('layouts.master')
@section('content')
    <div>
        <div class="container">
            <div class="blanc">
                <h1>{{ $title }}</h1>
            </div>
            {!!  Form::open(['route' => 'postManga', 'files'=>true]) !!}
            <div class="col-md-9 well well-sm">
                <div class="form-group">
                    <label class="col-md-3 control-label">Titre :</label>
                    <div class="col-md-6">
                        <input type="hidden" name="hid_id" value="{{ $manga->id_manga }}"/>
                        <input type="text" name="txt_titre" value="{{ $manga->titre }}" class="form-control" required autofocus/>
                    </div>
                </div>
                <br><br>

                <div class="form-group">
                    <label class="col-md-3 control-label">Genre :</label>
                    <div class="col-md-6">
                        <select class="form-control" name="sel_genre" id="id_genre">
                            <option value="0" disabled >Sélectionner un genre</option>
                            @foreach ($genres as $unG)
                                <option value="{{$unG->id_genre}}"
                                @if ($unG->id_genre == $manga->id_genre)
                                    selected="selected"
                                    @endif
                                >
                                    {{$unG->lib_genre}}

                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br><br>

                <div class="form-group">
                    <label class="col-md-3 control-label">Dessinateur :</label>
                    <div class="col-md-6">
                        <select class="form-control" name="sel_dessi" id="id_dessinateur">
                            <option value="0" disabled >Sélectionner un dessinateur</option>
                            @foreach ($dessinateurs as $unD)
                                <option value="{{$unD->id_dessinateur}}"
                                        @if ($unD->id_dessinateur == $manga->id_dessinateur)
                                            selected="selected"
                                    @endif>
                                    {{$unD->prenom_dessinateur .' '. $unD->nom_dessinateur}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br><br>

                <div class="form-group">
                    <label class="col-md-3 control-label">Scénariste :</label>
                    <div class="col-md-6">
                        <select class="form-control" name="sel_scena" id="id_scenariste">
                            <option value="0" disabled >Sélectionner un scenariste</option>
                            @foreach ($scenaristes as $unS)
                                <option value="{{$unS->id_scenariste}}"
                                        @if ($unS->id_scenariste == $manga->id_scenariste)
                                            selected="selected"
                                    @endif>
                                    {{$unS->prenom_scenariste.' '.$unS->nom_scenariste}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br><br>

                <div class="form-group">
                    <label class="col-md-3 control-label">Prix :</label>
                    <div class="col-md-3">
                        <input type="number" step=".01" name="num_prix" value="{{ $manga->prix }}" class="form-control" required>
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
                                onclick="{ window.location = '{{ url('/') }}';}">
                            <span class="glyphicon glyphicon-remove"></span>Annuler
                        </button>
                    </div>
                </div>
                <br><br>

                <div class="form-group">
                    <label class="col-md-3 control-label">Couverture : </label>
                    <div class="col-md-6">
                        <input type="hidden" name="MAX_FILE_SIZE" value="204800"/>
                        <input type="file" accept="image/*" name="fil_couv"
                               class="btn btn-default btn-primary pull-left">
                    </div>
                </div>
                <br><br>
            </div>
        </div>
    </div>
@stop
