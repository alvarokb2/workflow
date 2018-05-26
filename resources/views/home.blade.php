@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session()->has('msg'))
            @if(!is_null(session('msg')))
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="alert alert-{{ session('msg')['class'] }}">
                            {!! session('msg')['value'] !!}
                        </div>
                    </div>
                </div>
            @endif
        @endisset
        <div class="row justify-content-center">
            <div class="col-md-10">
                @include('titulacion.home')
            </div>
        </div>
    </div>
@endsection
