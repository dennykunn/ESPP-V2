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
                                <h4 class="card-title">Data Pembayaran</h4>
                            </div>
                            <div class="card-body">
                                <form action="">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-default">
                                                <label>Tahun</label>
                                                <select class="form-control" id="formGroupDefaultSelect">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-default">
                                                <label>Murid</label>
                                                <select class="form-control" id="formGroupDefaultSelect">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
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
