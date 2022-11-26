@extends('admin.layouts.app')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Daftar Gudang</h4>
        <!-- Basic Bootstrap Table -->
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $message }}</strong>
        </div>
        @elseif($message = Session::get('success'))
        <div class="alert alert-danger">
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="card">
            <h5 class="card-header">Table Basic</h5>
            <div class="card-body" <div class="table-responsive text-nowrap">
                <table id="example" class="table">
                    <thead>
                        <tr>
                            <th>Nama Gudang</th>
                            <th>Alamat</th>
                            <th>Kode Pos</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($gudangs as $gudang)
                        <tr>
                            <td>{{$gudang->nama_gudang}}</td>
                            <td>{{$gudang->alamat_gudang}}</td>
                            <td>{{$gudang->kode_pos}}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('gudangs.edit',$gudang->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" data-bs-toggle="modal" href=""
                                            data-bs-target="#modalCenter-{{$gudang->id}}"><i
                                                class="bx bx-trash me-1"></i>
                                            Delete
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter-{{$gudang->id}}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <form action="{{ route('gudangs.destroy', $gudang->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalCenterTitle">Hapus Kupon</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="modal-body">Anda yakin ingin menghapus gudang
                                                {{$gudang->nama_gudang}}</div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn delete-btn btn-primary">Hapus</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->
</div>
</div>
@endsection