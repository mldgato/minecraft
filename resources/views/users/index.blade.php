@extends('adminlte::page')

@section('content_header')
    <h1>Listado de Usuarios <span class="text-danger"><i class="fas fa-users"></i></span></h1>
@stop

@section('content')
    @livewire('users.show-users')
@stop

@section('css')
@stop

@section('js')
    <script></script>
@stop
