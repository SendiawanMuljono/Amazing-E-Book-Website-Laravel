@extends('layout')

@section('yieldPlace')
    <div class="row justify-content-center">
        <div class="col-md-4 text-center align-middle fs-3">
            <div class="circle d-flex flex-column justify-content-center">
                <p>{{ __('Success') }}!</p>
                <p class="fs-5"><a href="/home">{{ __('Click here to "Home"') }}</a></p>
            </div>
        </div>
    </div>
@endsection
