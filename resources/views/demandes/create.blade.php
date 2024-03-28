@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                

                <h1>Créer une nouvelle demande</h1><hr>
                    @livewire('multi-step-form')
            </div>
        </div>
    </div>
@endsection

