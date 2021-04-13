@extends('vagas/layout')

@section('titulo', 'Buscar')

@section('conteudo')
    @livewireStyles

    @livewire('search-vagas')
    @livewireScripts

@endsection
