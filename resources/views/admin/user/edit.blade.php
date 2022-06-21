@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Update User') }}
        </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">{{ $message }}</div>
            @endif

            <form method="POST" action="{{ route('admin.users.update', $user) }}">
                @csrf
                @method('patch')
                <div class="input-group mb-3"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                        </svg></span>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                        value="{{ $user->name }}" required autofocus>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="input-group mb-3"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                        </svg></span>
                    <input class="form-control @error('email') is-invalid @enderror" type="text" name="email"
                        value="{{ $user->email }}" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- Build your select: -->

                <div class="input-group mb-3"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                        </svg></span>

                    <label class="label bg-secondary mb-0">
                        @foreach ($user->roles as $role)
                            <p class="m-1 p-1 float-right bg-success rounded"> {{ $role->name . ' ' }}</p>
                        @endforeach
                    </label>
                    <select id="role" class="selectpicker form-control @error('role') is-invalid @enderror" multiple
                        data-live-search="true" name="role[]" required autofocus multiple="multiple">
                        @foreach ($allRole as $allrole)
                            <option value="{{ $allrole->id }}">{{ $allrole->name }}</option>
                        @endforeach
                    </select>

                    @error('role')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- script for multiple secect --}}
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('role').selectpicker();
                    });
                </script>
                {{-- end --}}

                {{-- <div class="input-group mb-4"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-lock-locked') }}"></use>
                        </svg></span>
                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"
                        placeholder="{{ __('Password') }}">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> --}}

                <div class="input-group mb-3"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-lock-locked') }}"></use>
                        </svg></span>
                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"
                        placeholder="{{ __('New password') }}">
                    @error('password')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="input-group mb-4"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-lock-locked') }}"></use>
                        </svg></span>
                    <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password"
                        name="password_confirmation" placeholder="{{ __('New password confirmation') }}">
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
