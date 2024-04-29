@extends('adminlte::page')

@section('content_header')
    <h1>Listado de Equipos <span class="text-danger"><i class="fas fa-user-friends"></i></span></h1>
@stop

@section('content')
    @livewire('teams.show-teams')
@stop

@section('css')
@stop

@section('js')
    <script></script>
@stop
