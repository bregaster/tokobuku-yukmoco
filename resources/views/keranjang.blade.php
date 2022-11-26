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
<section class="cart_area padding_top">
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
    <div class="cart_inner">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Product</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Total</th>
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
                <h5>Rp. {{$details['harga']}}</h5>
              </td>
              <td>
                <div class="product_count">
                  <input class="input-number form-control jumlah" id="{{$details['id'] }}" type="number"
                    value="{{$details['jumlah']}}" min="0" max="10">
                </div>
              </td>
              <td>
                <h5>Rp. {{$details['harga'] * $details['jumlah']}}</h5>
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
              <td>
                <a class="btn_1" href="#">Update Cart</a>
              </td>
              <td></td>
              <td></td>
              <td>
                <div class="cupon_text float-right">
                  <a class="btn_1" href="#">Close Coupon</a>
                </div>
              </td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td>
                <h5>Subtotal</h5>
              </td>
              <td>
                <h5></h5>
              </td>
            </tr>
            <tr class="shipping_area">
              <td></td>
              <td></td>
              <td>
                <h5>Shipping</h5>
              </td>
              <td>
                <div class="shipping_box">
                  <ul class="list">
                    <li>
                      <a href="#">Flat Rate: $5.00</a>
                    </li>
                    <li>
                      <a href="#">Free Shipping</a>
                    </li>
                    <li>
                      <a href="#">Flat Rate: $10.00</a>
                    </li>
                    <li class="active">
                      <a href="#">Local Delivery: $2.00</a>
                    </li>
                  </ul>
                  <h6>
                    Calculate Shipping
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                  </h6>
                  <select class="shipping_select">
                    <option value="1">Bangladesh</option>
                    <option value="2">India</option>
                    <option value="4">Pakistan</option>
                  </select>
                  <select class="shipping_select section_bg">
                    <option value="1">Select a State</option>
                    <option value="2">Select a State</option>
                    <option value="4">Select a State</option>
                  </select>
                  <input type="text" placeholder="Postcode/Zipcode" />
                  <a class="btn_1" href="#">Update Details</a>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="checkout_btn_inner float-right">
          <a class="btn_1" href="#">Continue Shopping</a>
          <a class="btn_1 checkout_btn_1" href="{{route('proces-checkout')}}">Proceed to checkout</a>
        </div>
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
@endsection