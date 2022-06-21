@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header bg-info">
            {{ __('Update Product') }}
        </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">{{ $message }}</div>
            @endif

            <form action="{{ route('products.update',$product ) }}"  method="POST">
                @csrf
                @method('patch')
                <h5 class="p-2 text-success underline">Category: {{ $product->category->name }}</h5>
                <div class="input-group mb-3"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                        </svg></span>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                        value="{{ $product->name }}" required autofocus>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                 <div class="input-group mb-3"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                        </svg></span>
                    <input class="form-control @error('price') is-invalid @enderror" type="text" name="price"
                        value="{{ $product->price }}" required autofocus>
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="row">
                    <div class="col-6">
                        <button class="btn btn-primary px-4" type="submit">{{ __('Update') }}</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
