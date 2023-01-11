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
            <div class="col-lg-6 col-lx-4">
                <div class="single_confirmation_details">
                    <h4>Informasi Akun</h4>
                    <ul>
                        <li>
                            <p>Nama</p><span>: {{$user->name}}</span>
                        </li>
                        <li>
                            <p>Email</p><span>: {{$user->email}}</span>
                        </li>
                        <li>
                            <p>No Telepon</p><span>: {{$user->no_telepon}}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-lx-4">
                <div class="single_confirmation_details">
                    <h4>shipping Address</h4>
                    <ul>
                        <li>
                            <p>Street</p><span>: 56/8</span>
                        </li>
                        <li>
                            <p>city</p><span>: Los Angeles</span>
                        </li>
                        <li>
                            <p>country</p><span>: United States</span>
                        </li>
                        <li>
                            <p>postcode</p><span>: 36952</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-lx-4">
                <div class="single_confirmation_details">
                    <h4>Alamat Pengiriman</h4>
                    <ul>
                        <li>
                            <p>Alamat Lengkap</p><span>: {{$user->alamat}}</span>
                        </li>
                        <li>
                            <p>Provinsi</p><span>: {{$namakotaprovinsi['province']}}</span>
                        </li>
                        <li>
                            <p>Kota</p><span>: {{$namakotaprovinsi['city_name']}}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-top-border">
            <h3 class="mb-30">Table</h3>
            <div class="progress-table-wrap">
                <div class="progress-table">
                    <div class="table-head">
                        <div class="serial">#</div>
                        <div class="country">Tanggal</div>
                        <div class="visit">Item</div>
                        <div class="percentage">Jumlah</div>
                    </div>
                    @foreach ($listpesanan as $pesanan)
                    <div class="table-row">
                        <div class="serial">{{$loop->iteration}}</div>
                        <div class="country">{{$pesanan[0]->created_at}}</div>
                        <div class="visit">{{$pesanan[0]->judul_buku}}</div>
                        <div class="percentage">{{$pesanan[0]->jumlah_item}}</div>
                    </div>
                    @endforeach

                    <div class="table-row">
                        <div class="serial">02</div>
                        <div class="country"> <img src="img/elements/f2.jpg" alt="flag">Canada</div>
                        <div class="visit">645032</div>
                        <div class="percentage">
                            <div class="progress">
                                <div class="progress-bar color-2" role="progressbar" style="width: 30%"
                                    aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="serial">03</div>
                        <div class="country"> <img src="img/elements/f3.jpg" alt="flag">Canada</div>
                        <div class="visit">645032</div>
                        <div class="percentage">
                            <div class="progress">
                                <div class="progress-bar color-3" role="progressbar" style="width: 55%"
                                    aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="serial">04</div>
                        <div class="country"> <img src="img/elements/f4.jpg" alt="flag">Canada</div>
                        <div class="visit">645032</div>
                        <div class="percentage">
                            <div class="progress">
                                <div class="progress-bar color-4" role="progressbar" style="width: 60%"
                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="serial">05</div>
                        <div class="country"> <img src="img/elements/f5.jpg" alt="flag">Canada</div>
                        <div class="visit">645032</div>
                        <div class="percentage">
                            <div class="progress">
                                <div class="progress-bar color-5" role="progressbar" style="width: 40%"
                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="serial">06</div>
                        <div class="country"> <img src="img/elements/f6.jpg" alt="flag">Canada</div>
                        <div class="visit">645032</div>
                        <div class="percentage">
                            <div class="progress">
                                <div class="progress-bar color-6" role="progressbar" style="width: 70%"
                                    aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="serial">07</div>
                        <div class="country"> <img src="img/elements/f7.jpg" alt="flag">Canada</div>
                        <div class="visit">645032</div>
                        <div class="percentage">
                            <div class="progress">
                                <div class="progress-bar color-7" role="progressbar" style="width: 30%"
                                    aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="serial">08</div>
                        <div class="country"> <img src="img/elements/f8.jpg" alt="flag">Canada</div>
                        <div class="visit">645032</div>
                        <div class="percentage">
                            <div class="progress">
                                <div class="progress-bar color-8" role="progressbar" style="width: 60%"
                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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