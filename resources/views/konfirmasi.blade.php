@extends('layouts.app')
@section('css')
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<!-- animate CSS -->
<link rel="stylesheet" href="{{asset('css/animate.css')}}">
<!-- owl carousel CSS -->
<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
<!-- nice select CSS -->
<link rel="stylesheet" href="{{asset('css/nice-select.css')}}">
<!-- font awesome CSS -->
<link rel="stylesheet" href="{{asset('css/all.css')}}">
<!-- flaticon CSS -->
<link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
<link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
<!-- font awesome CSS -->
<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
<!-- swiper CSS -->
<link rel="stylesheet" href="{{asset('css/slick.css')}}">
<link rel="stylesheet" href="{{asset('css/price_rangs.css')}}">
<!-- style CSS -->
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection
@section('content')
<!--================ confirmation part start =================-->
<section class="confirmation_part section_padding">
  <div class="container">
    <div class="row">
      @if($pesanan->bukti_konfirmasi != null)
      <div class="col-lg-12">
        <div class="confirmation_tittle">
          <span>Terima kasih, Pesanan anda akan segera diproses</span>
        </div>
      </div>
      @endif
      <div class="col-lg-12">
        <div class="order_details_iner">
          <h3>Detail Pesanan</h3>
          <table class="table table-borderless">
            <thead>
              <tr>
                <th scope="col" colspan="2">Product</th>
                <th scope="col"></th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($keranjang as $gudang)
              @foreach ($gudang as $item )
              <tr>
                <th colspan="2"><span>{{$item->judul_buku}}</span></th>
                <th>x{{$item->jumlah}}</th>
                <th> <span>Rp. {{number_format($item->harga*$item->jumlah, 2, ',', '.')}}</span></th>
              </tr>
              @endforeach

              @endforeach
              <tr>
                <th colspan="2">Jasa Pengiriman <span>{{$dataKurir->nama_kurir}}</span></th>
                <th>{{$dataKurir->nama_servis}}</th>
                <th> <span>Rp. {{number_format($dataKurir->ongkir, 2, ',', '.')}}</span></th>
              </tr>
              @if($pesanan->total_diskon !=0)
              <tr>
                <th colspan="3">Diskon Kupon</th>
                <th> <span>- Rp. {{number_format($pesanan->total_diskon, 2, ',', '.')}}</span></th>
              </tr>
              @endif
            </tbody>
            <tfoot>
              <tr>
                <th scope="col" colspan="3">Total</th>
                <th> <span>Rp. {{number_format($jumlahtotal, 2, ',', '.')}}</span></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      @if($pesanan->bukti_konfirmasi == null)
      <div class="section-top-border text-left">
        <h3 class="mb-30">Transfer Pembayaran</h3>
        <div class="row">
          <div class="col-md-6">
            <p class="text-left">Silakan transfer pembayaran melalui nomor rekening disamping dengan uang
              sejumlah
            <h1><span>Rp. {{number_format($jumlahtotal, 2, ',', '.')}}</span></h1>
            </p>
          </div>
          <div class="col-md-6">
            <img src="{{asset('img/norek-bri.jpg')}}" alt="" class="img-fluid">
          </div>
        </div>
      </div>
      <div class="section-top-border text-left">
        <h3 class="mb-30">Kirim Bukti Pembayaran</h3>
        <div class="row">
          <div class="col-md-6">
            <p class="text-left">Setelah melakukan transfer silakan mengunggah nota bukti pembayaran
            </p>
          </div>
          <div class="col-md-6">
            <form action="{{route('konfirmasi-pembayaran')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="cupon_area" style="margin:1px">
                <input type="number" name="idpesanan" hidden value="{{$pesanan->id}}">
                <input class="form-control" name="gambar" type="file" id="formFile" placeholder="Masukkan kode kupon" />
                <button style="margin-left:40px" type="submit" class="btn_3">Kirim</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>
</section>
<!--================ confirmation part end =================-->
@endsection
@section('javascript')
<!-- jquery -->
<script src="{{asset('js/jquery-1.12.1.min.js')}}"></script>
<!-- popper js -->
<script src="{{asset('js/popper.min.js')}}"></script>
<!-- bootstrap js -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- easing js -->
<script src="{{asset('js/jquery.magnific-popup.js')}}"></script>
<!-- swiper js -->
<script src="{{asset('js/swiper.min.js')}}"></script>
<!-- swiper js -->
<script src="{{asset('js/masonry.pkgd.js')}}"></script>
<!-- particles js -->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
{{-- <script src="js/jquery.nice-select.min.js"></script> --}}
<!-- slick js -->
<script src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('js/waypoints.min.js')}}"></script>
<script src="{{asset('js/contact.js')}}"></script>
<script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('js/jquery.form.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/mail-script.js')}}"></script>
<script src="{{asset('js/stellar.js')}}"></script>
<script src="{{asset('js/price_rangs.js')}}"></script>
<!-- custom js -->
<script src="{{asset('js/custom.js')}}"></script>
@endsection