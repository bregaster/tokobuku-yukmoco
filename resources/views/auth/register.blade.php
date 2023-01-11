@extends('layouts.app')
@section('css')
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
<!-- swiper CSS -->
<link rel="stylesheet" href="{{asset('css/slick.css')}}">
<!-- style CSS -->
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection
@section('content')
<section class="login_part padding_top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_text text-center">
                    <div class="login_part_text_iner">
                        <h2>Sudah punya akun Yukmoco?</h2>
                        <a href="{{route('login')}}" class="btn_3">Login disini</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>Selamat Datang di Yukmoco! <br>
                            Daftar Sekarang</h3>
                        <form class="row contact_form" action="{{ route('auth-register') }}" method="post"
                            novalidate="novalidate">
                            @csrf
                            <div class="col-md-12 form-group p_star">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                    placeholder="Username">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="Email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Confirm Password">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input id="notelepon" type="text"
                                    class="form-control @error('notelepon') is-invalid @enderror" name="notelepon"
                                    value="{{ old('notelepon') }}" required autocomplete="notelepon" autofocus
                                    placeholder="Nomor Telepon">
                                @error('notelepon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <select name="provinsi" class="form-control">
                                    @if ($provinsi !== null)
                                    <option>Pilih Provinsi</option>
                                    @foreach ($provinsi as $row)
                                    <option value="{{$row['province_id']}}">{{$row['province']}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <select name="kota" class="form-control">
                                </select>
                                @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input id="alamat" type="text"
                                    class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                    value="{{ old('alamat') }}" required autocomplete="alamat" autofocus
                                    placeholder="Alamat Lengkap">
                                @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="btn_3">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
<!-- slick js -->
<script src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('js/waypoints.min.js')}}"></script>
<script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('js/jquery.form.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/mail-script.js')}}"></script>
<script src="{{asset('js/stellar.js')}}"></script>
<script src="{{asset('js/price_rangs.js')}}"></script>
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