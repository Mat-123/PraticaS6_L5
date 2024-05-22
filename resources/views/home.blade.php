@extends('templates.base')

@section('title', 'EpiFlix - Homepage')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 mx-auto mt-4">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><h2 class="card-title">Benvenuto nel sito di EpiFlix!</h2></li>
                    <li class="list-group-item"><p class="card-text">Esegui il login per visionare tutto il catalogo dei nostri Film!</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection