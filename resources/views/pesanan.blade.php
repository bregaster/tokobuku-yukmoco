@extends('layouts.app')
@section('css')

<!-- animate CSS -->
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('css/animate.css')}}">
<!-- owl carousel CSS -->
<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
<!-- font awesome CSS -->
<link rel="stylesheet" href="{{asset('css/all.css')}}">
<link rel="stylesheet" href="{{asset('css/nice-select.css')}}">
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
<!-- select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<!--================Checkout Area =================-->
<section class="checkout_area section_padding">
  <div class="container">
    <div class="billing_details">
      <div class="row">
        <div class="col-lg-6">
          <h3>Billing Details</h3>
          <form class="row contact_form" action="#" method="post" novalidate="novalidate">
            <div class="col-md-12 form-group p_star">
              <input disabled type="text" class="form-control" id="first" name="name" value="{{auth()->user()->name}}"
                placeholder="First name" />
              <span class="placeholder"></span>
            </div>
            <div class="col-md-6 form-group p_star">
              <input disabled type="text" class="form-control" id="number" name="number"
                value="{{auth()->user()->no_telepon}}" placeholder="Phone number" />
              <span class=" placeholder"></span>
            </div>
            <div class=" col-md-6 form-group p_star">
              <input disabled type="text" class="form-control" id="email" name="compemailany"
                value="{{auth()->user()->email}}" placeholder="Email Address" />
              <span class="placeholder"></span>
            </div>
            <div class="col-md-12 form-group p_star">
              <input disabled type="text" class="form-control" id="add1" name="add1"
                value="{{$pesanan->alamat_penerima}}" />
              <span class="placeholder" placeholder="Address line 01"></span>
            </div>
            <div class="col-md-12 form-group p_star">
              <select disabled name="provinsi" class="form-control" disabled>a
                @if ($namaprovinsikota !== null)
                <option value="" selected>{{$namaprovinsikota['province']}}</option>
                @endif
              </select>
            </div>
            <div disabled class="col-md-12 form-group p_star">
              <select disabled name="kota" class="form-control">
                @if ($namaprovinsikota !== null)
                <option value="" selected>{{$namaprovinsikota['city_name']}}</option>
                @endif
              </select>
            </div>
            <div disabled class="col-md-12 form-group">
              <input type="text" disabled class="form-control" name="kodepos" value="{{$pesanan->kode_pos}}"
                placeholder="Kode Pos" />
            </div>
          </form>
        </div>
        <div class="col-lg-6">
          <div class="order_box">
            <h2>Silakan memilih jasa pengiriman</h2>
            <ul class="list">
              <li>
                <a href="#">Product
                  <span>Total</span>
                </a>
              </li>
              <form action="{{ route('konfirmasi')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @foreach ($keranjang as $gudang)
                <input hidden name="idpesanan" type="text" value="{{$gudang[0]['id_pesanan']}}">
                <input hidden name="idgudang" type="text" value="{{$gudang[0]['id_gudang']}}">

                <span>{{$gudang[0]->nama_gudang}}</span>
                @foreach ($gudang as $buku)
                <li>
                  <a href="#" class="d-flex w-full justify-content-between">
                    <span>{{$buku->judul_buku}}</span>
                    <div class="d-flex">
                      <span class="mr-2">x {{$buku->jumlah}}</span>
                      <span>Rp{{number_format($buku->harga, 2, ',', '.')}}</span>
                    </div>
                  </a>
                </li>
                @endforeach
                @endforeach
                <li>
                  <a href="#">Jasa Pengiriman
                    <select style="text-transform:uppercase" class="form-control hipping_select" name="ongkir[]">

                      @foreach ($ongkir as $item)
                      <option value="{{$item['name']}},{{$item['service']}},{{$item['cost']}}"> {{
                        $item['name'] ." -
                        ".
                        $item['service'] . " Rp".
                        number_format($item['cost'], 2, ',', '.')
                        }}</option>

                      @endforeach
                    </select>
                  </a>
                </li>

            </ul>
            <ul class="list list_2">
              <li>
                <a href="#">Subtotal

                  <span>Rp{{number_format($pesanan->total_pesanan, 2, ',','.')}}</span>
                </a>
              </li>
            </ul>
            <div class="payment_item">
              <button type="submit" class="btn_3">Proses Pembayaran</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!--================End Checkout Area =================-->
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
<script>
  $(document).ready(function() {
    $('select[name="provinsi"]').on('change', function(){
      console.log('asd');
      let provinceId = $(this).val();
      if(provinceId){
        $.get("/province/"+provinceId, function(data, status){
          console.log(data);
          $('select[name="kota"]').empty();
            $('select[name="kota"]').append('<option >Pilih Kota</option>')
          $.each(data, function(key, value){
            console.log(key, value);
            $('select[name="kota"]').append('<option value"'+ value.city_id +'">'+value.city_name+'</option>')
          })
          });
      }else{
        $('select[name="kota"]').empty();
      }
    })
  });
</script>
@endsection