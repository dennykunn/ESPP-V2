@extends('layouts.simple.master')
@section('title', 'Dashboard')
@section('breadcrumb-title', 'Dashboard')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                @include('components.page-header', [
                    'pageTitle' => 'Pembayaran',
                    'link1Url' => '/pembayaran',
                    'link1Name' => 'Pembayaran',
                    'link2Url' => '',
                ])
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pembayaran Murid</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="multi-filter-select" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th style="text-wrap: nowrap">NAMA MURID</th>
                                                <th style="text-wrap: nowrap">PEMBAYARAN BULAN</th>
                                                <th style="text-wrap: nowrap">JUMLAH PEMBAYARAN</th>
                                                <th style="text-wrap: nowrap">TANGGAL PEMBAYARAN</th>
                                                <th>METODE</th>
                                                <th style="text-wrap: nowrap">BUKTI PEMBAYARAN</th>
                                                <th>KETERANGAN</th>
                                                <th>STATUS</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <td>NO</td>
                                                <td>NAMA MURID</td>
                                                <td>PEMBAYARAN BULAN</td>
                                                <td>JUMLAH PEMBAYARAN</td>
                                                <td>TANGGAL PEMBAYARAN</td>
                                                <td>METODE</td>
                                                <td>BUKTI PEMBAYARAN</td>
                                                <td>KETERANGAN</td>
                                                <td>STATUS</td>
                                                <td>ACTION</td>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Tom</td>
                                                <td>Maret - April</td>
                                                <td>100.000</td>
                                                <td>3 Maret 2024</td>
                                                <td>Transfer</td>
                                                <td></td>
                                                <td>Pembayaran bulan Maret dan April</td>
                                                <td>SUKSES</td>
                                                <td class="d-flex justify-content-center align-items-xl-center ">
                                                    <a class="mr-2" href="">EDIT</a>
                                                    <a href="">DELETE</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
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
    <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="../assets/js/plugin/datatables/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#multi-filter-select').DataTable({
                "pageLength": 5,
                initComplete: function() {
                    this.api().columns().every(function() {
                        var column = this;
                        var select = $(
                                '<select class="form-control"><option value=""></option></select>'
                            )
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d +
                                '</option>')
                        });
                    });
                }
            });

            // Add Row
            $('#add-row').DataTable({
                "pageLength": 5,
            });

            var action =
                '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

            $('#addRowButton').click(function() {
                $('#add-row').dataTable().fnAddData([
                    $("#addName").val(),
                    $("#addPosition").val(),
                    $("#addOffice").val(),
                    action
                ]);
                $('#addRowModal').modal('hide');

            });
        });
    </script>
@endsection
