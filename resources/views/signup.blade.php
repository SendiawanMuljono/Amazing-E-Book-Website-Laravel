@extends('layout')

@section('yieldPlace')
    <div class="container">
        <div class="fs-3 mb-3"><u>{{ __('Sign Up') }}</u></div>
        <form action="/signup" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center mb-3 mt-3">
                <div class="col-2 d-flex justify-content-end">
                    <p class="fs-5">{{ __('First Name') }}: </p>
                </div>
                <div class="col-3">
                    <input class="form-control" type="text" name="first_name">
                </div>
                <div class="col-2 d-flex justify-content-end">
                    <p class="fs-5">{{ __('Middle Name') }}: </p>
                </div>
                <div class="col-3">
                    <input class="form-control" type="text" name="middle_name">
                </div>
            </div>
            <div class="row justify-content-center mb-3 mt-3">
                <div class="col-2 d-flex justify-content-end">
                    <p class="fs-5">{{ __('Last Name') }}: </p>
                </div>
                <div class="col-3">
                    <input class="form-control" type="text" name="last_name">
                </div>
                <div class="col-2 d-flex justify-content-end">
                    <p class="fs-5">{{ __('Email Address') }}: </p>
                </div>
                <div class="col-3">
                    <input class="form-control" type="text" name="email">
                </div>
            </div>
            <div class="row justify-content-center mb-3 mt-3">
                <div class="col-2 d-flex justify-content-end">
                    <p class="fs-5">{{ __('Gender') }}: </p>
                </div>
                <div class="col-3">
                    <input class="form-check-input" type="radio" name="gender" value="1">&nbsp;{{ __('Male') }}
                    <input class="form-check-input" type="radio" name="gender" value="2">&nbsp;{{ __('Female') }}
                </div>
                <div class="col-2 d-flex justify-content-end">
                    <p class="fs-5">{{ __('Role') }}: </p>
                </div>
                <div class="col-3">
                    <select class="form-select" name="role" aria-label="Default select example">
                        <option value=""></option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->role_id }}">{{ $role->role_desc }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row justify-content-center mb-3 mt-3">
                <div class="col-2 d-flex justify-content-end">
                    <p class="fs-5">{{ __('Password') }}: </p>
                </div>
                <div class="col-3">
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="col-2 d-flex justify-content-end">
                    <p class="fs-5">{{ __('Display Picture') }}: </p>
                </div>
                <div class="col-3">
                    <input class="form-control-file" type="file" name="image">
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <button class="btn btn-warning w-25" type="submit">{{ __('Submit') }}</button>
            </div>
            <div class="text-center mt-1">
                <div>
                    <a href="/login">{{ __('Already have an account? click here to log in') }}</a>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ __(session()->get('message')) }}
                    </div>
                @endif
            </div>
        </form>
    </div>
@endsection
