@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Autorisation</div>

                    <div class="card-body">
                        <!-- Livewire Search Autorisation Component -->
                        @livewire('search-autorisation')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
