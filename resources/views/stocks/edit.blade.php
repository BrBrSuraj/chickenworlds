@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header bg-info">
            {{ __('Make ready your product to sell') }}
        </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">{{ $message }}</div>
            @endif

            <form method="POST" action="{{ route('stocks.update', $stock) }}">
                @csrf
                @method('patch')


                <div class="input-group mb-3"><span class="input-group-text">
                        <p class="pt-1">Available Quentity : {{ $stock->qty }} Num.</p>
                        <svg class="icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-weight') }}"></use>
                        </svg>
                    </span>
                    <input class="form-control @error('qty') is-invalid @enderror" type="text" name="qty" value=""
                        placeholder="Enter quantity for sell" autofocus>
                    @error('qty')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <p class="text-info">Average Weight : {{ round($stock->weight / $stock->qty, 3) }} Kg</p>
                <div class="row">
                    <div class="col-6">
                        <button class="btn btn-primary px-4" type="submit">{{ __('Extract') }}</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
