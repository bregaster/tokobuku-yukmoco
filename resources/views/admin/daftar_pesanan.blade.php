@extends('admin.layouts.app')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Daftar Pesanan</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Table Basic</h5>
            <div class="card-body" <div class="table-responsive text-nowrap">
                <table id="example" class="table">
                    <thead>
                        <tr>
                            <th>Nama Pemesan</th>
                            <th>Jumlah item</th>
                            <th>Total Pesanan</th>
                            <th>No Telepon</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($pesanans as $pesanan)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                <strong>{{$pesanan->nama_pemesan}}</strong>
                            </td>
                            <td>{{$pesanan->jumlah_item}}</td>
                            <td>{{$pesanan->total_pesanan}}
                            </td>
                            <td>{{$pesanan->no_telepon}}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('konfirmasi-pesanan',$pesanan->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i>
                                            Lihat Detail Pesanan</a>
                                        <a class="dropdown-item" data-bs-toggle="modal" href=""
                                            data-bs-target="#modalCenter-{{$pesanan->id}}"><i
                                                class="bx bx-trash me-1"></i>
                                            Lihat Bukti
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter-{{$pesanan->id}}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                @if($pesanan->bukti_konfirmasi != null)
                                <img src="{{asset($pesanan->bukti_konfirmasi)}}">
                                @else
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <p>Belum ada bukti konfirmasi pembayaran</p>
                                        </div>
                                    </div>
                                </div>
                                @endif

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