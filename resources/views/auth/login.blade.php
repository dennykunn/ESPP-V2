@extends('layouts.authentication.master')
@section('title', 'Login')
@section('content')
    <div class="px-4 d-flex justify-content-center align-items-center" style="height: 100vh; width: 100%;">
        <div class="wrapper">
            <div class="logo d-flex justify-content-center align-items-center">
                <img src="{{ url('assets/img/logo/default.png') }}" alt="Logo SMK Taruna Persada Dumai">
            </div>
            <div class="text-center mt-4 name">
                ESPP
            </div>
            <form class="p-3 mt-3" action="{{ route('process_login') }}" method="POST">
                @csrf

                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span>
                    <input type="email" name="email" id="email" placeholder="Email">
                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <input type="password" name="password" id="pwd" placeholder="Password">
                </div>
                <button class="btn mt-3">Login</button>
            </form>
        </div>
    </div>
@endsection
