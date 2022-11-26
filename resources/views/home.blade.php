@extends('layouts.app')
@section('css')
<!-- Yukmoco StyleSheet -->
<!-- Bootstrap -->
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<!-- Magnific Popup -->
<link rel="stylesheet" href="{{asset('css/animate.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
<!-- Fancybox -->
<link rel="stylesheet" href="{{asset('css/all.css')}}">
<!-- Themify Icons -->
<link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
<!-- Nice Select CSS -->
<link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
<!-- Animate CSS -->
<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
<!-- Flex Slider CSS -->
<link rel="stylesheet" href="{{asset('css/slick.css')}}">
<!-- Owl Carousel -->
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection
@section('content')

<!-- product_list start-->
<section class="product_list section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product_list_slider owl-carousel">
                    <div class="single_product_list_slider">
                        <div class="row align-items-center justify-content-between">
                            @foreach ($buku as $buku1)
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <a href="{{route('homes.show', $buku1->id)}}">
                                        <img src="{{$buku1->gambar}}" alt="">
                                    </a>
                                    <div class="single_product_text">
                                        <h4>{{$buku1->judul_buku}}</h4>
                                        <h3>Rp. {{$buku1->harga}}</h3>
                                        <a href="{{ url('add-to-cart/'.$buku1->id) }}" class="add_cart">+ add to
                                            cart<i class="ti-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{$buku->links("pagination::bootstrap-5")}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product_list part start-->

@endsection
@section('javascript')
<!-- jquery plugins here-->
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
<!-- slick js -->
<script src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('js/waypoints.min.js')}}"></script>
<script src="{{asset('js/contact.js')}}"></script>
<script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('js/jquery.form.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/mail-script.js')}}"></script>
<!-- custom js -->
<script src="{{asset('js/custom.js')}}"></script>
@endsection