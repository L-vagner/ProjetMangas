@extends('layouts.master')
@section('content')
    <div>
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <p>Voici l'erreur : {{ $erreur }}</p>
    </div>
@stop
