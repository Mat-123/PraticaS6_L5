@extends('templates.base')

@section('title', "$film->title - EpiFlix!")

@section('content')
    @session('creation_success')
        <div class="alert alert-success mt-4" role="alert">
            Il film {{ $film->title }} è stato creato con successo.
        </div>
    @endsession
@endsection
