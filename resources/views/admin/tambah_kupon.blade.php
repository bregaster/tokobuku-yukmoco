@extends('admin.layouts.app')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin/</span> Tambah Kupon</h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
                @elseif($message = Session::get('success'))
                <div class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                {{-- menampilkan error validasi --}}
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('tambah-kupon')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Kupon</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" value="{{ old('title') }}"
                                        placeholder="Nama Kupon" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Kode Kupon</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="basic-default-company"
                                        placeholder="KODEKUPON" name="kodekupon" value="{{ old('kodekupon') }}"
                                        style="text-transform:uppercase" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Jumlah Diskon</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="basic-default-company"
                                        placeholder="Rp. " name="jumlahdiskon" value="{{ old('jumlahdiskon') }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Jumlah Kupon</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="basic-default-company"
                                        placeholder="100 " name="jumlahkupon" value="{{ old('jumlahkupon') }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <div class="row gy-3">
                                        <div class="col-md-2">
                                            <div class="form-check">
                                                <input name="status" class="form-check-input" type="radio" value="aktif"
                                                    id="defaultRadio1" />
                                                <label class="form-check-label"> Aktif </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-check">
                                                <input name="status" class="form-check-input" type="radio"
                                                    value="nonaktif" id="defaultRadio2" checked />
                                                <label class="form-check-label"> Tidak Aktif</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Masa
                                        Aktif</label>
                                    <div class="col-sm-10">
                                        <div class="row gy-3">
                                            <div class="col-md">
                                                <div class="form-text">Tanggal mulai</div>
                                                <input class="form-control" type="date" value="2021-06-18"
                                                    name="tglmulai" value="{{ old('tglmulai') }}" id="tanggal-mulai" />
                                            </div>
                                            <div class="col-md">
                                                <div class="form-text">Tanggal selesai</div>
                                                <input class="form-control" type="date" value="2021-06-19"
                                                    name="tglselesai" value="{{ old('tglselesai') }}"
                                                    id="tanggal-selesai" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
<!-- Content wrapper -->
@endsection