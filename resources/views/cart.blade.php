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
        @if ($orders->count() > 0)
            <div class="row justify-content-center mb-3">
                <div class="col-6 d-flex justify-content-center fs-5">
                    {{ __('Title') }}
                </div>
                <div class="col-1 d-flex justify-content-center fs-5"></div>
            </div>
            @foreach ($orders as $order)
                <div class="row justify-content-center">
                    <div class="col-6 d-flex justify-content-center border fs-5 pt-3 pb-3">
                        {{ $order->ebook->title }}
                    </div>
                    <div class="col-1 fs-5 pt-3 pb-3">
                        <form action="/cart/delete/{{ $order->order_id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">{{ __('Delete') }}</button>
                        </form>
                    </div>
                </div>
            @endforeach
            <div class="row justify-content-center mt-5">
                <div class="col d-flex justify-content-center">
                    <form action="/cart/checkout" method="POST">
                        @csrf
                        @method('put')
                        <button class="btn btn-warning" type="submit">{{ __('Submit') }}</button>
                    </form>
                </div>
            </div>
        @else
            <div class="row justify-content-center mb-3 fs-3">
                {{ __('No E-Book in your cart yet, Rent Now!') }}
            </div>
        @endif
    </div>
@endsection
