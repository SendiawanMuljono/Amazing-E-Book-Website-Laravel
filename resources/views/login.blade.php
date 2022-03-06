@extends('layout')

@section('yieldPlace')
    <div class="container">
        <div class="fs-3 mb-3"><u>{{ __('Log In') }}</u></div>
        <form action="/login" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center mb-3 mt-3">
                <div class="col-2 d-flex justify-content-end">
                    <p class="fs-5">{{ __('Email Address') }}: </p>
                </div>
                <div class="col-3">
                    <input class="form-control" type="text" name="email">
                </div>
            </div>
            <div class="row justify-content-center mb-3 mt-3">
                <div class="col-2 d-flex justify-content-end">
                    <p class="fs-5">{{ __('Password') }}: </p>
                </div>
                <div class="col-3">
                    <input class="form-control" type="password" name="password">
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <button class="btn btn-warning w-25" type="submit">{{ __('Submit') }}</button>
            </div>
            <div class="text-center mt-1">
                <div>
                    <a href="/signup">{{ __("Don't have an account? click here to sign up") }}</a>
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
        </form>
    </div>
@endsection
