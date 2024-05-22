@extends('templates.base')

@section('title', 'Epiflix - Create')

@section('content')
    <h1 class="mt-4">Films - create</h1>
    <form method="POST" action="{{ route('films.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Director</label>
            <input type="text" class="form-control" id="director" name="director">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price">
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Image url</label>
            <input type="text" class="form-control" id="img" name="img">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>


    </form>
@endsection