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
<!--================Cart Area =================-->
<section class="cart_area section_padding">
  <div class="container">
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
    <div class="cart_inner">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Product</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th style="width:20%" scope="col">Total</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @if (session('cart'))
            @foreach (session('cart') as $details)
            <tr>
              <td>
                <div class="media">
                  <div class="d-flex">
                    <img style="width:80px" src="{{asset($details['gambar'])}}" alt="" />
                  </div>
                  <div class="media-body">
                    <p><a href="{{route('homes.show', $details['id'])}}">{{$details['nama']}}</a></p>
                  </div>
                </div>
              </td>
              <td>
                <h5>Rp. {{number_format($details['harga'], 2, ',', '.')}}</h5>
              </td>
              <td>
                <div class="product_count">
                  <input class="input-number form-control jumlah" id="{{$details['id'] }}" type="number"
                    value="{{$details['jumlah']}}" min="0" max="10">
                </div>
              </td>
              <td>
                <h5>Rp. {{number_format($total[]=$details['harga'] * $details['jumlah'], 2, ',', '.')}}</h5>
              </td>
              <td>
                <ul class="list">
                  <li style="margin:5px">
                    <a class="btn_5 update-cart" data-id="{{$details['id'] }}" href="#">Update Item</a>
                  </li>
                  <li style="margin:5px">
                    <a class="btn_5 remove-from-cart" data-id="{{$details['id'] }}" href="#">Remove Item</a>
                  </li>
                </ul>
              </td>
            </tr>
            @endforeach
            @endif
            <tr class="bottom_button">

              @if(isset($kupon))
              <td>
                <div class="cupon_area">
                  <h2>
                    <p>Kupon berhasil diaktifkan</p>
                    <p>{{$kupon}}</p>

                  </h2>
                </div>
              </td>
              <td>
              </td>

              @else
              <td>
                <div class="cupon_area">
                  <h2>
                    <p>Punya Kupon? Masukkan disini</p>
                  </h2>
                </div>
              </td>
              <td>
              </td>
              <form method="POST" action="{{route('aktifkan-kupon')}}">
                @csrf
                <td>
                  <div class="cupon_area" style="margin:1px">
                    <input name="kodekupon" type="text" placeholder="Masukkan kode kupon" />
                  </div>
                </td>
                <td>
                  <div class="cupon_area" style="margin:1px">
                    <button type="submit" class="tp_btn">Aktifkan</button>
                  </div>
                </td>
              </form>
              @endif

            </tr>
            <tr>
              <td></td>
              <td></td>
              <td>
                <h5>Subtotal</h5>
              </td>
              <td>
                <h5>Rp. @if(isset($total))
                  {{number_format(array_sum($total), 2, ',', '.')}}
                  @else
                  0
                  @endif</h5>
              </td>
            </tr>
            <tr class="shipping_area">
              <td></td>
              <td></td>
              @if(auth()->user())
              <td>
              </td>
              <td>
                <div class="shipping_box">
                  <form action="{{ route('process-checkout')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input name="totalharga" hidden type="number" value="{{ isset($total) ? array_sum($total) : 0 }}" />
                    <input name="idkupon" hidden type="number" value="{{ isset($kupon) ? $kupon : '' }}" />
                    <input name="alamat" type="text" placeholder="Alamat" value="{{auth()->user()->alamat}}" />
                    <select name="provinsi" class="form-control shipping_select">
                      @if ($provinsi !== null)
                      <option>Pilih Provinsi</option>
                      @foreach ($provinsi as $row)
                      <option value="{{$row['province_id']}}" {{auth()->user()->kode_provinsi==$row['province_id'] ?
                        "selected" :"" }}
                        >{{$row['province']}}</option>
                      @endforeach
                      @endif
                    </select>
                    <select name="kota" class="form-control shipping_select section_bg">
                      @foreach ($kota as $row)
                      <option value="{{$row['city_id']}}" {{auth()->user()->kode_kota==$row['city_id'] ?
                        "selected" :"" }}
                        >{{$row['city_name']}}</option>
                      @endforeach
                    </select>
                    <input name="kodepos" type="text" placeholder="Kode Pos" />
                    <div class="checkout_btn_inner float-right">
                      <button type="submit" class="btn_3">Process Checkout</button>
                    </div>
                  </form>
                </div>
              </td>
              @else
              <td></td>
              <td>
                <div class="col-md-12 form-group">
                  <p>Silakan login atau register untuk melakukan pemesanan</p>
                  <a class="btn_3" href="{{route('login')}}">Login</a>
                  <br>
                  <a class="btn_3" href="{{route('register')}}">Register</a>
                </div>
              </td>
              @endif
            </tr>
          </tbody>
        </table>
      </div>
    </div>
</section>
<!--================End Cart Area =================-->
@endsection
@section('javascript')
<!-- jquery -->
<script src="js/jquery-1.12.1.min.js"></script>
<!-- popper js -->
<script src="js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- easing js -->
<script src="js/jquery.magnific-popup.js"></script>
<!-- swiper js -->
<script src="js/swiper.min.js"></script>
<!-- swiper js -->
<script src="js/masonry.pkgd.js"></script>
<!-- particles js -->
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<!-- slick js -->
<script src="js/slick.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/contact.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/stellar.js"></script>
<script src="js/price_rangs.js"></script>
<!-- custom js -->
<script src="js/custom.js"></script>
<script type="text/javascript">
  $(".update-cart").click(function (e) {
      e.preventDefault();
      var ele = $(this);
      $.ajax({
          url: '{{ url('update-cart') }}',
          method: "patch",
          data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), jumlah: ele.parents("tr").find(".jumlah").val()},
          success: function (response) {
              window.location.reload();
          }
      });
  });
  $(".remove-from-cart").click(function (e) {
      e.preventDefault();
      var ele = $(this);
      if(confirm("Are you sure")) {
          $.ajax({
              url: '{{ url('remove-from-cart') }}',
              method: "DELETE",
              data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
              success: function (response) {
                  window.location.reload();
              }
          });
      }
  });
</script>
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
            $('select[name="kota"]').append('<option value="'+ value.city_id +'">'+value.city_name+'</option>')
          })
          });
      }else{
        $('select[name="kota"]').empty();
      }
    })
  });
</script>
@endsection