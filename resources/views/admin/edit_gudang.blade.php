@extends('admin.layouts.app')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin/</span> Edit Gudang</h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
                @elseif($message = Session::get('error'))
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
                        <form action="{{ route('gudangs.update',$gudang->id)}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Gudang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" value="{{$gudang->nama_gudang}}"
                                        placeholder="Nama Gudang" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Alamat Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="basic-default-company" name="alamat"
                                        value="{{ $gudang->alamat_gudang }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-company">provinsi</label>
                                <div class="col-sm-10">
                                    <select name="provinsi" class="form-control">
                                        @if ($provinsi !== null)
                                        <option>Pilih Provinsi</option>
                                        @foreach ($provinsi as $row)
                                        <option value="{{$row['province_id']}}" {{ $gudang->
                                            kode_provinsi==$row['province_id']?"selected" :"" }}
                                            >{{$row['province']}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-company">kota</label>
                                <div class="col-sm-10 ">
                                    <select name="kota" class="form-control">
                                        @foreach ($kota as $row)
                                        <option value="{{$row['city_id']}}" {{$gudang->kode_kota==$row['city_id']
                                            ?
                                            "selected" :"" }}
                                            >{{$row['city_name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-company">kodepos</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="basic-default-company" name="kodepos"
                                        value="{{ $gudang->kode_pos }}" />
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