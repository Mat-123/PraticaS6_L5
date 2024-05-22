@extends('templates.base')

@section('title', 'Libreria - Index of Films')

@section('content')
    <h1 class="mt-4">Films list</h1>

    @session('saluto')
        <div class="alert alert-success" role="alert">
            {{ session('saluto') }}
        </div>
    @endsession

    @session('no_permission')
        <div class="alert alert-danger" role="alert">
            Non hai i permessi per modificare il post
        </div>
    @endsession

    @session('operation_success')
        <div class="alert alert-success" role="alert">
            Il Film "{{ session('operation_success')->title }}" è stato eliminato con successo
        </div>
    @endsession

    @session('update_success')
        <div class="alert alert-success" role="alert">
            Risorsa "{{ session('update_success')->title }}" aggiornata <a
                href="{{ route('films.show', ['id' => session('update_success')->id]) }}">Visualizza</a>
        </div>
    @endsession

    @if ($films->count())
            <div class="container-md m-5 mx-auto">
                <div class="row gx-3">
                        @foreach ($films as $film)
                        <div class="col-sm-6 col-md-4 col-lg-3 my-3">
                            <div class="card h-100">
                                <img src="{{ $film->img }}" class="card-img-top" alt="...">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">{{ $film->title }}</h5>
                                        <p class="card-text">{{ $film->description }}</p>
                                        <p class="card-text">Director: {{ $film->director }}</p>
                                        <p class="card-text">Price: {{ $film->price}}€</p>
                                        @auth
                                            @if (Auth::user()->id === $film->user_id)
                                            <div class="d-flex flex-column justify-content-around mt-auto">
                                                <a class="btn btn-warning" href="{{ route('films.edit', ['id' => $film]) }}">Edit</a>
                                                <form action="{{ route('films.destroy', ['id' => $film]) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger w-100 mt-2">Elimina</button>
                                                </form></div>
                                            @endif
                                        @endauth
                                    </div>
                            </div></div>
                        
                        @endforeach
                    </div>
            </div>
        {{ $films->links() }}
    @else
        <h2>Non ci sono libri</h2>
    @endif
@endsection
