@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Order Dertails') }}
        </div>
        <div class="card-body">
            {{-- livewire component to create a new order --}}
         @livewire('order-create')
        </div>
    </div>
@endsection
 