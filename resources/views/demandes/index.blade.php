@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 shadow-xl rounded-xl">
                <div class="card prose-lg card-compact">
                    <div class="card-header">
                        <h2 class="mx-8 mt-6 -mb-0">Demandes Table</h2>
                    </div>
                    <div class="card-body w-full">
                        
                                    @livewire('filter')
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
