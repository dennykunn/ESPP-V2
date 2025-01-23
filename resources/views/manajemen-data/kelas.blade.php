@extends('layouts.simple.master')
@section('title', 'Kelas')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                @include('components.page-header', [
                    'pageTitle' => 'Kelas',
                    'link1Url' => '#',
                    'link1Name' => 'Manajemen Data',
                    'link2Url' => '/manajemen-data/kelas',
                    'link2Name' => 'Kelas',
                ])
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title">Data Kelas</h4>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#addModal">Tambah</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>NAMA</th>
                                                <th>TAHUN AKADEMIK</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kelas as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->kode }}</td>
                                                    <td>{{ $item->tahunakademik->kode }}</td>
                                                    <td>
                                                        <div class="d-flex ">
                                                            <button class="btn btn-primary mr-2" type="button"
                                                                data-toggle="modal"
                                                                data-target="#editModal-{{ $item->id }}">Edit</button>
                                                            <form id="deleteForm-{{ $item->id }}"
                                                                action="{{ route('kelas.destroy', ['kela' => $item->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-danger"
                                                                    onclick="confirmDelete({{ $item->id }})">Delete</button>
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
                                            <form class="modal-content" action="{{ route('kelas.store') }}" method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addModalLabel">
                                                        Tambah Data Kelas
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="kode">Kode</label>
                                                        <input type="text" class="form-control" id="kode"
                                                            name="kode" placeholder="Enter Kode">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tahunakademik_id">Kode</label>
                                                        <select class="form-control input-square" id="tahunakademik_id"
                                                            name="tahunakademik_id">
                                                            @foreach ($tahunakademiks as $ta)
                                                                <option value="{{ $ta->id }}">{{ $ta->kode }}
                                                                </option>
                                                            @endforeach
                                                        </select>
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
                                    {{-- Modal Edit --}}
                                    @foreach ($kelas as $key => $item)
                                        <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form class="modal-content"
                                                    action="{{ route('kelas.update', ['kela' => $item->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">
                                                            Edit Data Kelas
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="kode">Kode</label>
                                                            <input type="text" class="form-control" id="kode"
                                                                name="kode" placeholder="Enter Kode"
                                                                value="{{ $item->kode }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tahunakademik_id">Kode</label>
                                                            <select class="form-control input-square" id="tahunakademik_id"
                                                                name="tahunakademik_id">
                                                                @foreach ($tahunakademiks as $ta)
                                                                    <option value="{{ $ta->id }}"
                                                                        {{ $item->tahunakademik_id == $ta->id ? 'selected' : '' }}>
                                                                        {{ $ta->kode }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
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
            $('#basic-datatables').DataTable();
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
