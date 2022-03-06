@extends('layout')

@section('yieldPlace')
    <div class="row justify-content-center">
        <div class="col-md-4 text-center align-middle fs-3">
            <div class="circle">
                <p>{{ __('Log Out Success') }}!</p>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            window.location.href = "/index"
        }, 2000);
     </script>
@endsection
