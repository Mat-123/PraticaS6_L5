@extends('templates.base')

@section('title', 'Epiflix - Dashboard')

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-xs-10 col-md-8 mx-auto">
                <div class="card">
                    <div class="cart-title py-5 px-3">
                    {{ __("You're logged in!") }}
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
