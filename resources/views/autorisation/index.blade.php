@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 shadow-lg rounded-xl">
                <div class="card">
                    <div class="card-header bg-secondary text-secondary-content py-3 px-4">Autorisation</div>

                    <div class="card-body flex flex-col space-y-4">
                        <!-- Livewire Search Autorisation Component -->
                        @livewire('search-autorisation')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
