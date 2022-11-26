<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Pesanan;
use App\Models\ProdukPesanan;
use App\Models\User;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    protected function checkout(){
        //memanggil function get_province
        $provinsi = $this->get_provinsi();
        //mengarah kepada file checkout.blade.php yang ada di view
        return view('checkout', ['provinsi' => $provinsi]);
    }
    protected function get_provinsi(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key:bfd6466de1213ad68125505350440d72"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        //ini kita decode data nya terlebih dahulu
        $response=json_decode($response,true);
        //ini untuk mengambil data provinsi yang ada di dalam rajaongkir resul
        $data_pengirim = $response['rajaongkir']['results'];
        return $data_pengirim;
        }
    }
    public function addToCart($id){
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
                        "harga" => $buku->harga,
                        "gambar" => $buku->gambar
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'buku added to cart successfully!');
        }
        // if cart not empty then check if this buku exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['jumlah']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'buku added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id" => $buku->id,
            "nama" => $buku->judul_buku,
            "jumlah" => 1,
            "harga" => $buku->harga,
            "gambar" => $buku->gambar
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'buku added to cart successfully!');
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
    public function processCheckout(){
        $carts = session()->get('cart');
        $user = User::find(1);
        // if cart is empty then this the first buku
        if(!$carts) {
            return redirect()->back()->with('error', 'Anda belum memasukkan produk ke dalam keranjang!');
        }else{
            $pesanan = Pesanan::create([
                'nama_pemesan'=>'subagyo',
                'email'=>'al@l.com',
                'status'=>'dipesan',
                'jumlah_item'=>2,
                'jumlah_supplier'=>2,
                'total_pesanan'=>30000,
                'total_ongkos_kirim'=>20000,
                'alamat_penerima'=>'jalan santai',
                'no_telepon'=>'088912398',
                'id_user'=>1,
            ]);
            foreach ($carts as $cart) {
            ProdukPesanan::create([
                'jumlah' => $cart['jumlah'],
                'status_keranjang' => 1,
                'id_pesanan' => $pesanan->id,
                'id_buku' => $cart['id'],
                'id_user' => $user->id,
            ]);
            }
            return redirect()->back()->with('success', 'pesanan erhasil diproses');
        }
        // if cart not empty then check if this buku exist then increment quantity
    }
}
