@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header bg-info">
            {{ __('Update Category Name') }}
        </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">{{ $message }}</div>
            @endif

            <form method="POST" action="{{ route('vaicheles.update', $vaichele) }}">
                @csrf
                @method('patch')
                <div class="input-group mb-3"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                        </svg></span>
                    <input class="form-control @error('type') is-invalid @enderror" type="text" name="type"
                        value="{{ $vaichele->type }}" required autofocus>
                    @error('type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                 <div class="input-group mb-3"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                        </svg></span>
                    <input class="form-control @error('number') is-invalid @enderror" type="text" name="number"
                        value="{{ $vaichele->number }}" required autofocus>
                    @error('number')
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
