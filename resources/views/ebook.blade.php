@extends('layout')

@section('yieldPlace')
    <div class="container">
        <div class="fs-3 mb-3"><u>{{ __('E-Book Detail') }}</u></div>
        <div class="row justify-content-center mb-3">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ __(session()->get('message')) }}
                </div>
            @endif
        </div>
        <div class="row justify-content-center mb-3 mt-3">
            <div class="col-2">
                <p class="fs-5">{{ __('Title') }}: </p>
            </div>
            <div class="col-6">
                <p class="fs-5">{{ $ebook->title }}</p>
            </div>
        </div>
        <div class="row justify-content-center mb-3 mt-3">
            <div class="col-2">
                <p class="fs-5">{{ __('Author') }}: </p>
            </div>
            <div class="col-6">
                <p class="fs-5">{{ $ebook->author }}</p>
            </div>
        </div>
        <div class="row justify-content-center mb-3 mt-3">
            <div class="col-2">
                <p class="fs-5">{{ __('Description') }}: </p>
            </div>
            <div class="col-6">
                <p class="fs-5">{{ $ebook->description }}</p>
            </div>
        </div>
        <div class="row justify-content-center mb-3 mt-3">
            <div class="col-2"></div>
            <div class="col-6 d-flex justify-content-end">
                <form action="/home/ebook/{{ $ebook->ebook_id }}" method="POST">
                    @csrf
                    <button class="btn btn-warning" type="submit">{{ __('Rent') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
