@extends('layout')

@section('yieldPlace')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-3 d-flex justify-content-center fs-5 pt-3 pb-3">
                {{ __('Author') }}
            </div>
            <div class="col-6 d-flex justify-content-center fs-5 pt-3 pb-3">
                {{ __('Title') }}
            </div>
        </div>
        @foreach ($ebooks as $ebook)
            <div class="row justify-content-center">
                <div class="col-3 border fs-5 pt-3 pb-3">
                    {{ $ebook->author }}
                </div>
                <div class="col-6 border fs-5 pt-3 pb-3">
                    <a href="/home/ebook/{{ $ebook->ebook_id }}">{{ $ebook->title }}</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
