@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/lightslider.min.css')}}">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<!-- animate CSS -->
<link rel="stylesheet" href="{{asset('css/animate.css')}}">
<!-- owl carousel CSS -->
<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
<!-- font awesome CSS -->
<link rel="stylesheet" href="{{asset('css/all.css')}}">
<!-- flaticon CSS -->
<link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
<link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
<!-- font awesome CSS -->
<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
<!-- style CSS -->
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection
@section('content')
<!--================Single Product Area =================-->
<div class="product_image_area section_padding">
  <div class="container">
    <div class="row s_product_inner justify-content-between">
      <div class="col-lg-6 col-xl-6">
        <div class="product_slider_img">
          <div id="vertical">
            <div data-thumb="{{ asset($buku->gambar) }}">
              <img style="height:450px;width:450px " src="{{ asset($buku->gambar) }}" />
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-xl-6">
        <div class="s_product_text">
          <h5><a href="{{route('homes.show', $buku->id-1)}}">previous</a><span>|</span> <a
              href="{{route('homes.show', $buku->id+1)}}">next</a></h5>
          <h3>{{$buku->judul_buku}}</h3>
          <h2>{{$buku->harga}}</h2>
          <ul class="list">
            <li>
              <a class="active" href="#">
                <span>Category</span> : {{$buku->kategori}}</a>
            </li>
            <li>
              <a href="#"> <span>Availibility</span> : {{$buku ->jumlah_stok}}</a>
            </li>
          </ul>
          <p>
            First replenish living. Creepeth image image. Creeping can't, won't called.
            Two fruitful let days signs sea together all land fly subdue
          </p>
          <div class="card_area d-flex justify-content-between align-items-center">
            <div class="product_count">
              <span class="inumber-decrement"> <i class="ti-minus"></i></span>
              <input class="input-number" type="text" value="1" min="0" max="10">
              <span class="number-increment"> <i class="ti-plus"></i></span>
            </div>
            <a href="{{ url('add-to-keranjang/'.$buku->id) }}" class="btn_3">add to cart</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
  <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
          aria-selected="true">Description</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
          aria-selected="false">Specification</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        {!! $buku->deskripsi !!}
      </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="table-responsive">
          <table class="table">
            <tbody>
              <tr>
                <td>
                  <h5>Width</h5>
                </td>
                <td>
                  <h5>128mm</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Height</h5>
                </td>
                <td>
                  <h5>508mm</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Depth</h5>
                </td>
                <td>
                  <h5>85mm</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Weight</h5>
                </td>
                <td>
                  <h5>52gm</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Quality checking</h5>
                </td>
                <td>
                  <h5>yes</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Freshness Duration</h5>
                </td>
                <td>
                  <h5>03days</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>When packeting</h5>
                </td>
                <td>
                  <h5>Without touch of hand</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Each Box contains</h5>
                </td>
                <td>
                  <h5>60pcs</h5>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Product Description Area =================-->
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
<script src="{{asset('js/lightslider.min.js')}}"></script>
<!-- swiper js -->
<script src="{{asset('js/masonry.pkgd.js')}}"></script>
<!-- particles js -->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
<!-- slick js -->
<script src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('js/swiper.jquery.js')}}"></script>
<script src="{{asset('js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('js/waypoints.min.js')}}"></script>
<script src="{{asset('js/contact.js')}}"></script>
<script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('js/jquery.form.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/mail-script.js')}}"></script>
<script src="{{asset('js/stellar.js')}}"></script>
<!-- custom js -->
<script src="{{asset('js/theme.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
@endsection