@extends('layouts.simple.master')
@section('title', 'Kelas')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                @include('components.page-header', [
                    'pageTitle' => 'Pembayaran Perbulan',
                    'link1Url' => '#',
                    'link1Name' => 'Manajemen Data',
                    'link2Url' => '/manajemen-data/pembayaran-perbulan',
                    'link2Name' => 'Pembayaran Perbulan',
                ])
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title">Data Table Pembayaran Perbulan</h4>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#addModal">Tambah</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="multi-filter-select" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Bulan</th>
                                                <th>Tahun</th>
                                                <th>Jumlah</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Bulan</th>
                                                <th>Tahun</th>
                                                <th>Jumlah</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($pembayaranPerbulan as $no => $pp)
                                                <tr>
                                                    <td>{{ $no + 1 }}</td>
                                                    <td>{{ $pp->bulan }}</td>
                                                    <td>{{ $pp->tahun }}</td>
                                                    <td>{{ $pp->jumlah }}</td>
                                                    <td>
                                                        <div class="d-flex ">
                                                            <button class="btn btn-primary mr-2" type="button"
                                                                data-toggle="modal"
                                                                data-target="#editModal-{{ $pp->id }}">Edit</button>
                                                            <form id="deleteForm-{{ $pp->id }}"
                                                                action="{{ route('pembayaran-perbulan.update', ['pembayaran_perbulan' => $pp->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-danger"
                                                                    onclick="confirmDelete({{ $pp->id }})">Delete</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    {{-- Modal Add --}}
                                    <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                                        aria-labelledby="addModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form class="modal-content" action="{{ route('pembayaran-perbulan.store') }}"
                                                method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addModalLabel">
                                                        Tambah Data Pembayaran Perbulan
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="bulan">Bulan</label>
                                                        <input type="number" class="form-control" id="bulan"
                                                            name="bulan" placeholder="01">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tahun">Tahun</label>
                                                        <input type="number" class="form-control" id="tahun"
                                                            name="tahun" placeholder="2024">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jumlah">Jumlah</label>
                                                        <input type="number" class="form-control" id="jumlah"
                                                            name="jumlah" placeholder="50000">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save data</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    @foreach ($pembayaranPerbulan as $no => $pp)
                                        <div class="modal fade" id="editModal-{{ $pp->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form class="modal-content"
                                                    action="{{ route('pembayaran-perbulan.update', ['pembayaran_perbulan' => $pp->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">
                                                            Edit Data Pembayaran Perbulan
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="bulan">Bulan</label>
                                                            <input type="number" class="form-control" id="bulan"
                                                                name="bulan" placeholder="01"
                                                                value="{{ $pp->bulan }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tahun">Tahun</label>
                                                            <input type="number" class="form-control" id="tahun"
                                                                name="tahun" placeholder="2024"
                                                                value="{{ $pp->tahun }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jumlah">Jumlah</label>
                                                            <input type="number" class="form-control" id="jumlah"
                                                                name="jumlah" placeholder="50000"
                                                                value="{{ $pp->jumlah }}">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save data</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
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

        function confirmDelete(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                buttons: {
                    cancel: {
                        visible: true,
                        text: 'No, cancel!',
                        className: 'btn btn-danger'
                    },
                    confirm: {
                        text: 'Yes, delete it!',
                        className: 'btn btn-success'
                    }
                }
            }).then((willDelete) => {
                if (willDelete) {
                    document.getElementById('deleteForm-' + id).submit();
                }
            });
        }
    </script>
@endsection
