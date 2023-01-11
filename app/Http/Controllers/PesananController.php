<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Gudang;
use App\Models\Kurir;
use App\Models\Pesanan;
use App\Models\ProdukPesanan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\RajaOngkirServices;
use App\Http\Controllers\MailController;
use App\Models\Kupon;
use Intervention\Image\ImageManagerStatic as Image;

class PesananController extends Controller
{

    public function getKota($id){
        $kota = RajaOngkirServices::getKota($id);
        return $kota;
    }
    public function daftar_pesanan(){
        return view('admin/daftar_pesanan', ['pesanans' => Pesanan::getListAllPesanan()]);
    }
    public function keranjang(Request $request){
        if(auth()->user() && ($request->kupon)){
            $provinsi = RajaOngkirServices::getProvinsi();
            $kota = RajaOngkirServices::getKota(auth()->user()->kode_provinsi);
            return view('keranjang', ['provinsi' => $provinsi, 'kota'=>$kota, 'kupon'=>$request->kupon]);
        }else if(auth()->user()){
            $provinsi = RajaOngkirServices::getProvinsi();
            $kota = RajaOngkirServices::getKota(auth()->user()->kode_provinsi);
            return view('keranjang', ['provinsi' => $provinsi, 'kota'=>$kota]);
        }else{
            return view('keranjang');
        }
    }
    public function konfirmasi(Request $request){
        
        $this->validate($request, [
            'ongkir'   => 'required',
            'idpesanan'   => 'required',
        ],
        [
            'provinsi.required'=>'Anda belum menentukan kurir',
        ]);
        
        foreach ($request->ongkir as $kurir) {
            $values = explode(',',$kurir);
            Kurir::create([
                'nama_kurir'=>$values[0],
                'nama_servis'=>$values[1],
                'ongkir'=>$values[2],
                'id_pesanan'=>$request->idpesanan,
                'id_gudang'=>12,
            ]);
        }
        MailController::pesananBaru('bregasster@gmail.com');
        return redirect()->route('konfirmasi-pesanan',['id'=> $request->idpesanan]);
    }
    public function konfirmasiPembayaran(Request $request){
        $this->validate($request, [
            'gambar' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);
                //upload gambar
        $image = $request->file('gambar');
        $input['imagename'] = time().'.'.$image->extension();
     
        $filePath = public_path('/bukti');
        $img = Image::make($image->path());
        $img->resize(640, null, function ($const) {
            $const->aspectRatio();
        })->save($filePath.'/'.$input['imagename']);

        $gambar = '/bukti/'.$input['imagename'];
        $pesanan=Pesanan::find($request->idpesanan);
        $pesanan->update([
            'bukti_konfirmasi' => $gambar,
        ]);
        return redirect()->route('konfirmasi-pesanan',['id'=> $request->idpesanan]);
    }
    public function showKonfirmasiPesanan($id){
        $pesanan = Pesanan::find($id);
        $dataKurir = Kurir::getKurirPesanan($pesanan->id);
        $jumlahongkir= $dataKurir->ongkir;
        $jumlahharga =0;
        $jumlahtotal=0;
        $keranjangGrouped = ProdukPesanan::getKeranjang($pesanan->id)->groupBy('id_gudang');
        foreach ($keranjangGrouped as $gudang) {
            foreach($gudang as $item){
                $jumlahharga = $jumlahharga +($item->harga*$item->jumlah);
            }
        }
        if($pesanan->total_diskon != 0){
            $jumlahtotal= $jumlahongkir + $jumlahharga - $pesanan->total_diskon;
        }else{
            $jumlahtotal= $jumlahongkir + $jumlahharga;
        }
        //dd($pesanan->total_diskon);
        return view('konfirmasi',['keranjang'=>$keranjangGrouped, 'dataKurir'=>$dataKurir, 'pesanan'=>$pesanan, 'jumlahtotal'=>$jumlahtotal]);
    }
    public function addToKeranjang($id){
        $buku = Buku::find($id);
        if(!$buku) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first buku
        if(!$cart) {
            $cart = [
                    $id => [
                        "id" =>$buku->id,
                        "nama" => $buku->judul_buku,
                        "jumlah" => 1,
                        "berat" => $buku->berat,
                        "harga" => $buku->harga,
                        "gambar" => $buku->gambar
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke dalam keranjang!');
        }
        // if cart not empty then check if this buku exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['jumlah']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke dalam keranjang!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id" => $buku->id,
            "nama" => $buku->judul_buku,
            "jumlah" => 1,
            "berat" => $buku->berat,
            "harga" => $buku->harga,
            "gambar" => $buku->gambar
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke dalam keranjang!');
    }

    public function removeCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
    public function updateCart(Request $request)
    {
        if($request->id and $request->jumlah)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["jumlah"] = $request->jumlah;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function processCheckout(Request $request){
        $carts = session()->get('cart');
        $userid = auth()->user()->id;
        $this->validate($request, [
            'alamat'   => 'required',
            'provinsi'   => 'required',
            'kota'   => 'required',
            'totalharga'   => 'required',
            'kodepos'   => 'required',
        ],
        [
            'provinsi.required'=>'Anda belum menentukan alamat provinsi',
            'kota.required'=>'Anda belum menentukan alamat kota'
        ]);
        if(!$carts) {
            return redirect()->back()->with('error', 'Anda belum memasukkan produk ke dalam keranjang!');
        }else{
            if($request->idkupon){
            $kupon=Kupon::find($request->idkupon);
            $pesanan = Pesanan::create([
                'nama_pemesan'=>auth()->user()->name,
                'email'=>auth()->user()->email,
                'status'=>'dipesan',
                'jumlah_item'=>count(session()->get('cart')),
                'total_pesanan'=>$request->totalharga,
                'total_diskon'=>$kupon->diskon_fix,
                'alamat_penerima'=>$request->alamat,
                'kode_pos'=>$request->kodepos,
                'kode_provinsi_penerima'=>$request->provinsi,
                'kode_kota_penerima'=>$request->kota,
                'no_telepon'=>auth()->user()->no_telepon,
                'is_checkout'=>false,
                'id_kupon'=>$request->idkupon,
                'id_user'=>$userid,
            ]);
            }else{
            $pesanan = Pesanan::create([
                'nama_pemesan'=>auth()->user()->name,
                'email'=>auth()->user()->email,
                'status'=>'dipesan',
                'jumlah_item'=>count(session()->get('cart')),
                'total_pesanan'=>$request->totalharga,
                'total_diskon'=>0,
                'alamat_penerima'=>$request->alamat,
                'kode_pos'=>$request->kodepos,
                'kode_provinsi_penerima'=>$request->provinsi,
                'kode_kota_penerima'=>$request->kota,
                'no_telepon'=>auth()->user()->no_telepon,
                'is_checkout'=>false,
                'id_user'=>$userid,
            ]);
            }
            foreach ($carts as $cart) {
            ProdukPesanan::create([
                'jumlah' => $cart['jumlah'],
                'status_keranjang' => 1,
                'id_pesanan' => $pesanan->id,
                'id_buku' => $cart['id'],
                'id_user' => $userid,
            ]);
            }
            return redirect()->route('pesanan.show',['pesanan'=>$pesanan->id]);
        }
    }
    public function show($id){
        $pesanan= Pesanan::find($id);
        $keranjang = ProdukPesanan::getKeranjang($pesanan->id);
        $keranjangGrouped = $keranjang->groupBy('id_gudang');
        //dd($keranjang[0]['id_pesanan']);
        //dd($keranjangGrouped[10][0]['id_pesanan']);
        $ongkir = [];
        foreach($keranjangGrouped as $gudang => $value){
            $gudang = Gudang::find($gudang);
            // dd($gudang, $value);
            $berat = $value->sum('berat');
            $ongkos = RajaOngkirServices::getCost($value[0]->kode_kota, $pesanan->kode_kota_penerima, $berat);
            $single = [];

            foreach($ongkos as $item){
                if(isset($item[0]['costs'])){
                    foreach($item[0]['costs'] as $key=>$i){
                        $single[] = ['name' => $item[0]['code'],
                        'service' => $i['service'],
                        'cost' => $i['cost'][0]['value'],
                        'etd' => $i['cost'][0]['etd']];
                    }
                }
            }

            $ongkir[] = $single;
        }
        //dd($ongkir);
        $ongkiravailable=[];
        if(count($ongkir) > 1){
            
            foreach($ongkir[0] as $item1){
                $acuanname = $item1['name'];
                $acuanservice = $item1['service'];
                $counts=1;
                $totalongkir=$item1['cost'];
                for ($x = 1; $x <= count($ongkir)-1; $x++) {
                    foreach($ongkir[$x] as $item){
                        //dd('sampesisni');
                        if(($acuanname==$item['name']) && ($acuanservice==$item['service'])){
                            $counts++;
                            $totalongkir=$totalongkir+ $item['cost'];
                        }
                    }
                }
                if($counts == count($ongkir)){
                    array_push($ongkiravailable,['name'=>$acuanname,'service'=>$acuanservice,'cost'=>$totalongkir]);
                }
            }
            //$ongkiravailables[] = $ongkiravailable;
            //dd($ongkiravailable);
        }else{
            $ongkiravailable=$ongkir[0];
        }
        $namaprovinsikota=RajaOngkirServices::getNamaKota($pesanan->kode_kota_penerima,$pesanan->kode_provinsi_penerima);
        if($pesanan->id_kupon != null){
            $kupon = Kupon::find($pesanan->id_kupon);
            return view('pesanan',['keranjang'=>$keranjangGrouped, 'ongkir'=> $ongkiravailable,'namaprovinsikota'=>$namaprovinsikota, 'pesanan'=>$pesanan,'kupon'=>$kupon]);
        }else{
            return view('pesanan',['keranjang'=>$keranjangGrouped, 'ongkir'=> $ongkiravailable,'namaprovinsikota'=>$namaprovinsikota, 'pesanan'=>$pesanan]);
        }
    }

    public function getKurir($kota_tujuan, $kota_asal, $berat){
        return RajaOngkirServices::getCost($kota_tujuan, $kota_asal, $berat);
    }
    public function getListPesananUser($id){
        return Pesanan::getListPesanan($id);
    }
}
