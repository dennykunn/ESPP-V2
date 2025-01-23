@extends('layouts.simple.master')
@section('title', 'Dashboard')
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <style>
        .btn.dropdown-toggle.dropdown-toggle {
            border: 1px solid gray;
        }
    </style>
@endsection
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
                                <h4 class="card-title">Download Data Pembayaran</h4>
                            </div>
                            <div class="card-body">
                                <form action="">
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label>Tahun</label>
                                            <select class="form-control selectpicker" data-live-search="true"
                                                id="formGroupDefaultSelect" name="tahun_akademik">
                                                @foreach ($tahun as $t)
                                                    <option value="{{ $t->id }}">{{ $t->kode }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Murid</label>
                                            <select class="form-control selectpicker" data-live-search="true"
                                                id="formGroupDefaultSelect" name="murid">
                                                @foreach ($siswa as $m)
                                                    <option value="{{ $m->id }}">{{ $m->fullname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary">Download</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('components.footer')
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
        $('.selectpicker').selectpicker();
    </script>
@endsection
