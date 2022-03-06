@extends('layout')

@section('yieldPlace')
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div class="d-flex align-items-center">
                <img src="{{ Auth::guard('account')->user()->display_picture_link }}" alt="" width="200px" height="200px">
            </div>
            <div>
                <form action="/profile/update" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row justify-content-center mb-3 mt-3">
                        <div class="col d-flex justify-content-end">
                            <p class="fs-5">{{ __('First Name') }}: </p>
                        </div>
                        <div class="col">
                            <input class="form-control" type="text" name="first_name" value="{{ Auth::guard('account')->user()->first_name }}">
                        </div>
                        <div class="col d-flex justify-content-end">
                            <p class="fs-5">{{ __('Middle Name') }}: </p>
                        </div>
                        <div class="col">
                            <input class="form-control" type="text" name="middle_name" value="{{ Auth::guard('account')->user()->middle_name ? Auth::guard('account')->user()->middle_name : "" }}">
                        </div>
                    </div>
                    <div class="row justify-content-center mb-3 mt-3">
                        <div class="col d-flex justify-content-end">
                            <p class="fs-5">{{ __('Last Name') }}: </p>
                        </div>
                        <div class="col">
                            <input class="form-control" type="text" name="last_name" value="{{ Auth::guard('account')->user()->last_name }}">
                        </div>
                        <div class="col d-flex justify-content-end">
                            <p class="fs-5">{{ __('Email Address') }}: </p>
                        </div>
                        <div class="col">
                            <input class="form-control" type="text" name="email" value="{{ Auth::guard('account')->user()->email }}">
                        </div>
                    </div>
                    <div class="row justify-content-center mb-3 mt-3">
                        <div class="col d-flex justify-content-end">
                            <p class="fs-5">{{ __('Gender') }}: </p>
                        </div>
                        <div class="col">
                            @if (Auth::guard('account')->user()->gender_id == 1)
                                <input class="form-check-input" type="radio" name="gender" value="1" checked>&nbsp;{{ __('Male') }}
                                <input class="form-check-input" type="radio" name="gender" value="2">&nbsp;{{ __('Female') }}
                            @else
                                <input class="form-check-input" type="radio" name="gender" value="1">&nbsp;{{ __('Male') }}
                                <input class="form-check-input" type="radio" name="gender" value="2" checked>&nbsp;{{ __('Female') }}
                            @endif
                        </div>
                        <div class="col d-flex justify-content-end">
                            <p class="fs-5">{{ __('Role') }}: </p>
                        </div>
                        <div class="col">
                            <input class="form-control" type="text" name="role" value="{{ Auth::guard('account')->user()->role->role_desc }}" disabled>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-3 mt-3">
                        <div class="col-3 d-flex justify-content-end">
                            <p class="fs-5">{{ __('Password') }}: </p>
                        </div>
                        <div class="col-3">
                            <input class="form-control" type="password" name="password" value="{{ Auth::guard('account')->user()->password }}">
                        </div>
                        <div class="col-3 d-flex justify-content-end">
                            <p class="fs-5">{{ __('Display Picture') }}: </p>
                        </div>
                        <div class="col-3">
                            <input class="form-control-file" type="file" name="image">
                        </div>
                    </div>
                    <div class="row justify-content-center mt-5">
                        <button class="btn btn-warning w-25" type="submit">{{ __('Save') }}</button>
                    </div>
                </form>
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
        </div>
    </div>
@endsection
