@extends('templates.base')

@section('title', 'EpiFlix - About')

@section('content')
    <h1 class="mt-4">Films Edit</h1>
    <form method="POST" action="{{ route('films.update', ['id' => $film]) }}">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $film->title }}">
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="director" name="director" value="{{ $film->director }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $film->description}}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $film->price }}">
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Image url</label>
            <input type="text" class="form-control" id="img" name="img" value="{{ $film->img }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection