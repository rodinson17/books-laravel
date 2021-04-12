@extends('layouts.app')

@section('content')

    <form id="logout" method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="dropdown-item" href="page-auth-login-v2.html">
            <i class="mr-50" data-feather="power"></i>
            Cerrar Sesión
        </button>
    </form>
    <home></home>

@endsection

@push('styles')
    <style>
        #logout {
            background: #e4e2e25c;
            position: fixed;
            z-index: 777;
            right: 0;
        }
    </style>
@endpush
