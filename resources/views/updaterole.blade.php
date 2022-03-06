@extends('layout')

@section('yieldPlace')
    <div class="container">
        <div class="fs-3 mb-3">
            <u>
                @if ($account->middle_name)
                    {{ $account->first_name }}&nbsp;{{ $account->middle_name }}&nbsp;{{ $account->last_name }}
                @else
                    {{ $account->first_name }}&nbsp;{{ $account->last_name }}
                @endif
            </u>
        </div>
        <div class="row justify-content-center mb-3">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ __(session()->get('message')) }}
                </div>
            @endif
        </div>
        <form action="/accmaintenance/updaterole/{{ $account->account_id }}" method="POST">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <div class="col-1 d-flex justify-content-center fs-5 pt-3 pb-3">
                    {{ __('Role') }}:
                </div>
                <div class="col-5 d-flex justify-content-center fs-5 pt-3 pb-3">
                    <select class="form-select" name="role" aria-label="Default select example">
                        <option value="{{ $account->role_id }}">{{ $account->role->role_desc }}</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->role_id }}">{{ $role->role_desc }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <button class="btn btn-warning w-25" type="submit">{{ __('Save') }}</button>
            </div>
        </form>
    </div>
@endsection
