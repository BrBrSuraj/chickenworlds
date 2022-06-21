@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header bg-info">
            {{ __('Create New Category') }}
        </div>
        <div class="card-body">
            <form action="{{ route('vaicheles.store') }}" method="POST">
                @csrf
                <div class="input-group mb-3 col-6"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-taxi') }}"></use>
                        </svg></span>
                    <input class="form-control @error('type') is-invalid @enderror" type="text" name="type"
                        placeholder="{{ __('Enter Type of Vaichele') }}" required autofocus>
                    @error('type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                   <div class="input-group mb-3 col-6"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-taxi') }}"></use>
                        </svg></span>
                    <input class="form-control @error('number') is-invalid @enderror" type="text" name="number"
                        placeholder="{{ __('Enter Vaichele Number') }}" required autofocus>
                    @error('number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row ">
                    <div class="col-6 ml-3">
                        <button class="btn btn-primary px-4" type="submit">{{ __('Create') }}</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
