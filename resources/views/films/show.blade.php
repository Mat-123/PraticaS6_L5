@extends('templates.base')

@section('title', "$film->title - EpiFlix!")

@section('content')
    <h1 class="mt-4">{{ $film->title }}</h1>

    @session('creation_success')
        <div class="alert alert-success" role="alert">
            Il libro è stato creato con successo
        </div>
    @endsession

    <h2>Director: {{ $film->director }}</h2>
    <img src="{{ $film->img }}" alt="">
@endsection
