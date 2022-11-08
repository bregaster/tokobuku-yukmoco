@extends('admin.layouts.app')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Daftar Kupon</h4>

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
        <div class="card-body"
        <div class="table-responsive text-nowrap">
            <table id="example" class="table">
            <thead>
                <tr>
                <th>Nama Kupon</th>
                <th>Kode Kupon</th>
                <th>Jumlah Diskon</th>
                <th>Jumlah Kupon</th>
                <th>Status</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($kupons as $kupon)
                <tr>
                <td>{{$kupon->nama_kupon}}</td>
                <td>{{$kupon->kode_kupon}}</td>
                <td>{{$kupon->diskon_fix}}</td>
                <td>10</td>
                <td>
                    @if($kupon->status == 1)
                    <span class="badge bg-label-success me-1">Aktif</span>
                    @else
                    <span class="badge bg-label-danger me-1">Nonaktif</span>
                    @endif
                </td>
                <td>
                    <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                        >
                        <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="bx bx-trash me-1"></i> Delete</a
                        >
                    </div>
                    </div>
                </td>
                </tr>
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