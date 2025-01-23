@extends('layouts.simple.master')
@section('title', 'Users')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
        integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('breadcrumb-title', 'Users')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                @include('components.page-header', [
                    'pageTitle' => 'Users',
                    'link1Url' => '/users',
                    'link1Name' => 'Users',
                    'link2Url' => '',
                ])
                <div class="row">
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title">Data Users</h4>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#addModal">Tambah</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    <table id="basic-datatables"
                                        class="table-responsive display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>USERNAME</th>
                                                <th>FULLNAME</th>
                                                <th>PHOTO</th>
                                                <th>EMAIL</th>
                                                <th class="text-nowrap">BIRTH DATE </th>
                                                <th>ROLE</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->username }}</td>
                                                    <td class="text-nowrap">{{ $item->fullname }}</td>
                                                    <td>
                                                        <div class="avatar-sm text-nowrap" style="overflow: hidden"
                                                            target="_blank">
                                                            <a href="{{ Storage::url($item->photo) }}">
                                                                <img class="avatar-img rounded-circle"
                                                                    src="{{ Storage::url($item->photo) }}"
                                                                    alt="Photo {{ $item->fullname }}">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->birth_date }}</td>
                                                    <td>{{ $item->role }}</td>
                                                    <td>
                                                        <div class="d-flex ">
                                                            <button class="btn btn-primary mr-2" type="button"
                                                                data-toggle="modal"
                                                                data-target="#editModal-{{ $item->id }}">Edit</button>
                                                            <button class="btn btn-warning mr-2" type="button"
                                                                data-toggle="modal"
                                                                data-target="#editPasswordModal-{{ $item->id }}">Edit
                                                                Password</button>
                                                            <form id="deleteForm-{{ $item->id }}"
                                                                action="{{ route('users.destroy', ['user' => $item->id]) }}"
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
                                            <form class="modal-content" action="{{ route('users.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addModalLabel">
                                                        Tambah Data User
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="username">Username</label>
                                                        <input type="text" class="form-control" id="username"
                                                            name="username" placeholder="Enter username"
                                                            aria-describedby="usernameHelp">
                                                        <small id="usernameHelp" class="form-text text-muted">Username tidak
                                                            boleh menggunakan spasi.</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fullname">Fullname</label>
                                                        <input type="text" class="form-control" id="fullname"
                                                            name="fullname" placeholder="Enter fullname">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control" id="email"
                                                            name="email" placeholder="Enter email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="birth_date">Birth Date</label>
                                                        <input type="date" class="form-control" id="birth_date"
                                                            name="birth_date" placeholder="Enter birth date">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input type="password" class="form-control" id="password"
                                                            name="password" placeholder="Enter password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="photo">Photo</label>
                                                        <input type="file" class="form-control dropify" id="photo"
                                                            name="photo" placeholder="Enter photo">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Role</label>
                                                        <div class="selectgroup selectgroup-pills w-100">
                                                            <label class="selectgroup-item">
                                                                <input type="radio" name="role" value="murid"
                                                                    class="selectgroup-input" checked>
                                                                <span class="selectgroup-button">Murid</span>
                                                            </label>
                                                            <label class="selectgroup-item">
                                                                <input type="radio" name="role" value="wali-murid"
                                                                    class="selectgroup-input">
                                                                <span class="selectgroup-button">Wali Murid</span>
                                                            </label>
                                                            <label class="selectgroup-item">
                                                                <input type="radio" name="role" value="wali-kelas"
                                                                    class="selectgroup-input">
                                                                <span class="selectgroup-button">Wali Kelas</span>
                                                            </label>
                                                            <label class="selectgroup-item">
                                                                <input type="radio" name="role" value="petugas"
                                                                    class="selectgroup-input">
                                                                <span class="selectgroup-button">Petugas</span>
                                                            </label>
                                                            <label class="selectgroup-item">
                                                                <input type="radio" name="role"
                                                                    value="administrator" class="selectgroup-input">
                                                                <span class="selectgroup-button">Administrator</span>
                                                            </label>
                                                        </div>
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
                                    @foreach ($user as $item)
                                        <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form class="modal-content"
                                                    action="{{ route('users.update', ['user' => $item->id]) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addModalLabel">
                                                            Edit Data User
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="username">Username</label>
                                                            <input type="text" class="form-control" id="username"
                                                                name="username" placeholder="Enter username"
                                                                aria-describedby="usernameHelp"
                                                                value="{{ $item->username }}">
                                                            <small id="usernameHelp" class="form-text text-muted">Username
                                                                tidak
                                                                boleh menggunakan spasi.</small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="fullname">Fullname</label>
                                                            <input type="text" class="form-control" id="fullname"
                                                                name="fullname" placeholder="Enter fullname"
                                                                value="{{ $item->fullname }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control" id="email"
                                                                name="email" placeholder="Enter email"
                                                                value="{{ $item->email }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="birth_date">Birth Date</label>
                                                            <input type="date" class="form-control" id="birth_date"
                                                                name="birth_date" placeholder="Enter birth date"
                                                                value="{{ $item->birth_date }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="photo">Photo</label>
                                                            <input type="file" class="form-control dropify"
                                                                id="photo" name="photo" placeholder="Enter photo"
                                                                data-default-file="{{ Storage::url($item->photo) }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Role</label>
                                                            <div class="selectgroup selectgroup-pills w-100">
                                                                <label class="selectgroup-item">
                                                                    <input type="radio" name="role" value="murid"
                                                                        class="selectgroup-input"
                                                                        {{ $item->role == 'murid' ? 'checked' : '' }}>
                                                                    <span class="selectgroup-button">Murid</span>
                                                                </label>
                                                                <label class="selectgroup-item">
                                                                    <input type="radio" name="role"
                                                                        value="wali-murid" class="selectgroup-input"
                                                                        {{ $item->role == 'wali-murid' ? 'checked' : '' }}>
                                                                    <span class="selectgroup-button">Wali Murid</span>
                                                                </label>
                                                                <label class="selectgroup-item">
                                                                    <input type="radio" name="role"
                                                                        value="wali-kelas" class="selectgroup-input"
                                                                        {{ $item->role == 'wali-kelas' ? 'checked' : '' }}>
                                                                    <span class="selectgroup-button">Wali Kelas</span>
                                                                </label>
                                                                <label class="selectgroup-item">
                                                                    <input type="radio" name="role" value="petugas"
                                                                        class="selectgroup-input"
                                                                        {{ $item->role == 'petugas' ? 'checked' : '' }}>
                                                                    <span class="selectgroup-button">Petugas</span>
                                                                </label>
                                                                <label class="selectgroup-item">
                                                                    <input type="radio" name="role"
                                                                        value="administrator" class="selectgroup-input"
                                                                        {{ $item->role == 'administrator' ? 'checked' : '' }}>
                                                                    <span class="selectgroup-button">Administrator</span>
                                                                </label>
                                                            </div>
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

                                    {{-- Modal Edit Password --}}
                                    @foreach ($user as $item)
                                        <div class="modal fade" id="editPasswordModal-{{ $item->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="editPasswordModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form class="modal-content"
                                                    action="{{ route('users.update.password', ['id' => $item->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editPasswordModalLabel">
                                                            Edit Password User
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="previous_password">Previous Password</label>
                                                            <input type="password" class="form-control"
                                                                id="previous_password" name="previous_password"
                                                                placeholder="Enter previous password" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="new_password">New Password</label>
                                                            <input type="password" class="form-control" id="new_password"
                                                                name="new_password" placeholder="Enter new password"
                                                                required>
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
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $('.dropify').dropify();

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
