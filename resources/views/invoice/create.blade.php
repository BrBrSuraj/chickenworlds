@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header bg-info">
            {{ __('Create New Invoice') }}
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-md-12">
                        @can('is_ShopKeeper')
                            @livewire('invoice',['id'=>$product_id,'name'=>$name])
                        @endcan


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
