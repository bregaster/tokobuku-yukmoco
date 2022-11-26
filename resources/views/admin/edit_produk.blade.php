@extends('admin.layouts.app')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Edit Produk</h4>

        <div class="row">
            <!-- try -->
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                Error occured.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
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
                <form action="{{ route('bukus.update',$buku->id)}}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Informasi Dasar</h5>
                            <small class="text-muted float-end">Default label</small>
                        </div>
                        <div class="card-body">

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input value="{{ $buku->judul_buku }}" type="text" class="form-control"
                                        name="nama" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea id="konten" name="deskripsi" class="form-control"
                                        aria-describedby="basic-icon-default-message2">{{ $buku->deskripsi }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                    <select value="{{ $buku->kategori }}" name="kategori" id="kategori"
                                        class="form-control kategori">
                                        <option value="nanas">naas</option>
                                        <option value="aple">apel</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Visibilitas</label>
                                <div class="col-sm-10">
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input name="visibilitas" class="form-check-input" type="radio"
                                                value="publish" id="defaultRadio1" {{ ($buku->status=="1")?
                                            "checked"
                                            : "" }}/>
                                            <label class="form-check-label"> Terbitkan </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input name="visibilitas" class="form-check-input" type="radio"
                                                value="hidden" id="defaultRadio2" {{ ($buku->status=="0")?
                                            "checked"
                                            : "" }} />
                                            <label class="form-check-label"> Sembunyikan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Harga</h5>
                            <small class="text-muted float-end">Default label</small>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-email">Harga Sebelum
                                    Diskon</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text" id="basic-default-email2">Rp.</span>
                                        <input value="{{ $buku->harga }}" type="text" class="form-control"
                                            name="hargasebelum" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-email">Harga Setelah
                                    Diskon</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text" id="basic-default-email2">Rp.</span>
                                        <input value="{{ $buku->hargasetelahdiskon }}" type="text" class="form-control"
                                            name="hargasetelah" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Inventaris</h5>
                            <small class="text-muted float-end">Default label</small>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">SKU</label>
                                <div class="col-sm-10">
                                    <input value="{{ $buku->sku}}" type="text" class="form-control"
                                        style="text-transform:uppercase" name="sku" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Berat</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input value="{{ $buku->berat }}" type="number" class="form-control"
                                            name="berat" />
                                        <span class="input-group-text">kg</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Jumlah Barang</label>
                                <div class="col-sm-10">
                                    <input value="{{ $buku->jumlah_stok }}" type="number" class="form-control"
                                        name="jumlahbarang" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Gambar</h5>
                            <small class="text-muted float-end">Default label</small>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <div class="row gy-3">
                                        <div class="col-md">
                                            <div class="form-text">Pilih Gambar</div>
                                            <input value="{{ $buku->gambar }}" class="form-control" type="file"
                                                name="gambar" id="formFile" onchange="readURL(this);" />
                                        </div>
                                        <div class="col-md">
                                            <div class="form-text">Preview</div>
                                            <img id="blah" src="{{ asset($buku->gambar) }}" alt=" your image"
                                                width="320px" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- / Content -->
    </div>
    <!-- Content wrapper -->
    <script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>
    <script>
        var konten = document.getElementById("konten");
        CKEDITOR.replace(konten,{
        language:'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
    </script>
    <script>
        $(function () {
                      $(".kategori").selectize(options);
                    });
    </script>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
    
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }
    
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    @endsection