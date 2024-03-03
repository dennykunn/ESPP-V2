@extends('layouts.simple.master')
@section('title', 'Dashboard')
@section('breadcrumb-title', 'Dashboard')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h2 class="text-white pb-2 fw-bold">@yield('breadcrumb-title')</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('components.footer')
    </div>
@endsection
