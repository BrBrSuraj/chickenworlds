@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header bg-info">
            {{ __('Update Good') }}
        </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">{{ $message }}</div>
            @endif

            <form method="POST" action="{{ route('goods.update',$good) }}">
                @csrf
                @method('patch')

                <div class="input-group mb-3 col-6"><span class="input-group-text">
                    <svg class="icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                    </svg></span>
                <select name="product_id" class="form-control @error('product_id') is-invalid @enderror"  autofocus>
                    <option value="{{ $good->product->id }}">{{ $good->product->name }}</option>
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
                        value="{{ $good->name }}" required autofocus>
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
                    <input class="form-control @error('price') is-invalid @enderror" type="number" name="sp"
                        value="{{ $good->sp }}" required autofocus>
                    @error('sp')
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
