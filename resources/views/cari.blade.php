@extends('layouts.app')
@section('css')
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- animate CSS -->
<link rel="stylesheet" href="css/animate.css">
<!-- owl carousel CSS -->
<link rel="stylesheet" href="css/owl.carousel.min.css">
<!-- nice select CSS -->
<link rel="stylesheet" href="css/nice-select.css">
<!-- font awesome CSS -->
<link rel="stylesheet" href="css/all.css">
<!-- flaticon CSS -->
<link rel="stylesheet" href="css/flaticon.css">
<link rel="stylesheet" href="css/themify-icons.css">
<!-- font awesome CSS -->
<link rel="stylesheet" href="css/magnific-popup.css">
<!-- swiper CSS -->
<link rel="stylesheet" href="css/slick.css">
<link rel="stylesheet" href="css/price_rangs.css">
<!-- style CSS -->
<link rel="stylesheet" href="css/style.css">
@endsection
@section('content')
<!--================Category Product Area =================-->
<section class="cat_product_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="left_sidebar_area">
                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Kategori</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                <li>
                                    <a href="/pencarian?kategori=Pendidikan">Pendidikan</a>
                                </li>
                                <li>
                                    <a href="/pencarian?kategori=Sastra">Sastra</a>
                                </li>
                                <li>
                                    <a href="/pencarian?kategori=Sains">Sains</a>
                                </li>
                                <li>
                                    <a href="/pencarian?kategori=Agama">Agama</a>
                                </li>
                                <li>
                                    <a href="/pencarian?kategori=Bibliografi">Bibliografi</a>
                                </li>
                                <li>
                                    <a href="/pencarian?kategori=Umum">Umum</a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product_top_bar d-flex justify-content-between align-items-center">
                            <div class="single_product_menu">
                                @if(isset($katakunci))
                                <p> Hasil Pencarian <span>'{{$katakunci}}' </span></p>
                                @else
                                <p> Kategori <span>'{{$kategori}}' </span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center latest_product_inner">
                    @foreach ($buku as $buku1)
                    <div class="col-lg-3 col-sm-6">
                        <div class="single_product_item">
                            <a href="{{route('homes.show', $buku1->id)}}">
                                <img src="{{$buku1->gambar}}" alt="">
                            </a>
                            <div class="single_product_text">
                                <h4>{{$buku1->judul_buku}}</h4>
                                <h3>Rp. {{number_format($buku1->harga, 2, ',', '.')}}</h3>
                                <a href="{{ url('add-to-keranjang/'.$buku1->id) }}" class="add_cart">+ add to
                                    cart</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @if (count($buku)==0)
                    <div class="row align-items-center latest_product_inner">
                        <p> Tidak ditemukan</p>
                    </div>
                    @endif
                </div>
                {{$buku->links("pagination::bootstrap-5")}}
            </div>
        </div>
    </div>
</section>
<!--================End Category Product Area =================-->
@endsection
@section('javascript')
<!-- jquery plugins here-->
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
@endsection