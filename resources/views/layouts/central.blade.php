@extends('layouts.app')
@section('options_btn')
    @include('layouts.menu.includes.status_cards')
@endsection
{{-- @section('card_title', @yield('card')) --}}
@section('content')
    <div class="row">
        @yield('adicionais')
    </div>
    <div class="container table-responsive pt-2">
        @yield("table")
    </div>
@endsection