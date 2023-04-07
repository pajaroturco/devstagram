@extends('layouts.app')

@section('titulo','Principal')

@section('contenido')

    <x-listar-posts :posts="$posts" />
@endsection