@extends('admin.layouts.app')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $message }}</strong>
        </div>
        @elseif($message = Session::get('error'))
        <div class="alert alert-danger">
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <!-- Text alignment -->
        <h5 class="pb-1 mb-4">Pengaturan</h5>
        <div class="row mb-5 ">
            <div class="col-md-6 col-lg-4">
                <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
                    <div class="card-body">
                        <i class="bx bxs-book bx-lg"></i>
                        <h5 class="card-title">Katalog</h5>
                        <div class="text-muted fs-exact-14">Lihat dan tambah produk buku
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
                    <div class="card-body">
                        <i class="bx bxs-user-account bx-lg"></i>
                        <h5 class="card-title">User</h5>
                        <div class="text-muted fs-exact-14">lihat daftar user
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
                    <div class="card-body">
                        <i class="bx bxs-cart bx-lg"></i>
                        <h5 class="card-title">Pesanan</h5>
                        <div class="text-muted fs-exact-14">Lihat daftar pesanan
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
                    <div class="card-body">
                        <i class="bx bxs-package bx-lg"></i>
                        <h5 class="card-title">Gudang</h5>
                        <div class="text-muted fs-exact-14">Lihat dan tambah gudang
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
                    <div class="card-body">
                        <i class="bx  bxs-heart bx-lg"></i>
                        <h5 class="card-title">Marketing</h5>
                        <div class="text-muted fs-exact-14">Lihat dan tambah kupon
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Text alignment -->
    </div>
</div>
@endsection