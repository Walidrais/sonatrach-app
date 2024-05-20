@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 shadow-lg rounded-xl">
                
                <div class="prose">
                <h2>Créer une nouvelle demande</h2>
                </div>
                <hr>

                    @livewire('multi-step-form')

            </div>
        </div>
    </div>
@endsection

