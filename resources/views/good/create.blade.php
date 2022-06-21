@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header bg-info">
            {{ __('Create New Goods') }}
        </div>
        <div class="card-body">
            <form action="{{ route('goods.store') }}" method="POST">
                @csrf
                <div class="input-group mb-3 col-6"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                        </svg></span>
                    <select name="product_id" class="form-control @error('product_id') is-invalid @enderror" autofocus>
                        <option value="" disabled selected>--Chose Product--</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="input-group mb-3 col-6"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                        </svg></span>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                        placeholder="{{ __('Good Name') }}" autofocus>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="input-group mb-3 col-6"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                        </svg></span>
                    <input class="form-control @error('sp') is-invalid @enderror" type="number" name="sp"
                        placeholder="{{ __('Selling price of Goods') }}" autofocus>
                    @error('sp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-6">
                        <button class="btn btn-primary px-4" type="submit">{{ __('Create') }}</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
