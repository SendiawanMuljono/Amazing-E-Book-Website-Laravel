@extends('layout')

@section('yieldPlace')
    <div class="container">
        <div class="row justify-content-center mb-3">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ __(session()->get('message')) }}
                </div>
            @endif
        </div>
        <div class="row justify-content-center">
            <div class="col-4 d-flex justify-content-center fs-5 pt-3 pb-3">
                {{ __('Account') }}
            </div>
            <div class="col-4 d-flex justify-content-center fs-5 pt-3 pb-3">
                {{ __('Action') }}
            </div>
        </div>
        @foreach ($accounts as $account)
            <div class="row justify-content-center">
                <div class="col-4 d-flex justify-content-center border fs-5 pt-3 pb-3">
                    @if ($account->middle_name)
                        {{ $account->first_name }}&nbsp;{{ $account->middle_name }}&nbsp;{{ $account->last_name }}&nbsp;-&nbsp;{{ $account->role->role_desc }}
                    @else
                        {{ $account->first_name }}&nbsp;{{ $account->last_name }}&nbsp;-&nbsp;{{ $account->role->role_desc }}
                    @endif
                </div>
                <div class="col-4 d-flex justify-content-center justify-content-around border fs-5 pt-3 pb-3">
                    <div>
                        <a href="/accmaintenance/updaterole/{{ $account->account_id }}">
                            <button class="btn btn-success" type="submit">{{ __('Update Role') }}</button>
                        </a>
                    </div>
                    <div>
                        <form action="/accmaintenance/delete/{{ $account->account_id }}" method="POST">
                            @csrf
                            @method('put')
                            <button class="btn btn-danger" type="submit">{{ __('Delete') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
