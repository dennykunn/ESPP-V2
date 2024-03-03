@extends('layouts.simple.master')
@section('title', 'Dashboard')
@section('breadcrumb-title', 'Dashboard')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                @include('components.page-header', [
                    'pageTitle' => 'Data Pembayaran',
                    'link1Url' => '/data-pembayaran',
                    'link1Name' => 'Data Pembayaran',
                    'link2Url' => '',
                ])
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Sizing</h4>

                            </div>
                            <div class="card-body">
                                <p class="demo">
                                <div class="avatar avatar-xxl">
                                    <img src="../../assets/img/jm_denis.jpg" alt="..."
                                        class="avatar-img rounded-circle">
                                </div>

                                <div class="avatar avatar-xl">
                                    <img src="../../assets/img/jm_denis.jpg" alt="..."
                                        class="avatar-img rounded-circle">
                                </div>

                                <div class="avatar avatar-lg">
                                    <img src="../../assets/img/jm_denis.jpg" alt="..."
                                        class="avatar-img rounded-circle">
                                </div>

                                <div class="avatar">
                                    <img src="../../assets/img/jm_denis.jpg" alt="..."
                                        class="avatar-img rounded-circle">
                                </div>

                                <div class="avatar avatar-sm">
                                    <img src="../../assets/img/jm_denis.jpg" alt="..."
                                        class="avatar-img rounded-circle">
                                </div>

                                <div class="avatar avatar-xs">
                                    <img src="../../assets/img/jm_denis.jpg" alt="..."
                                        class="avatar-img rounded-circle">
                                </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('components.footer')
    </div>
@endsection
