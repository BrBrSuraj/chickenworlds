@extends('layouts.app')

@section('content')

    <div class="card mb-4">
        <div class="card-header bg-info">
            {{ __('Create New Product') }}
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="input-group mb-3"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                        </svg></span>
                    <select class="form-control @error('name') is-invalid @enderror" name="category_id" required autofocus>
                        <option value="" disabled>Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                  <div class="input-group mb-3"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                        </svg></span>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                        placeholder="{{ __('Product Name') }}" required autofocus>
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
                        placeholder="{{ __('Association Rate') }}" required autofocus>
                    @error('price')
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
