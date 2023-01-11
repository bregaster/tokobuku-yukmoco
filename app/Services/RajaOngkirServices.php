<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class RajaOngkirServices {

    public static function getProvinsi()
    {
        $res = Http::withHeaders(['key' => env('RAJAONGKIR_API_KEY')])
            ->get('https://api.rajaongkir.com/starter/province');

        return $res->json()['rajaongkir']['results'];
    }
    public static function getNamaProvinsi($id)
    {
        $res = Http::withHeaders(['key' => env('RAJAONGKIR_API_KEY')])
            ->get('https://api.rajaongkir.com/starter/province?id='.$id);

        return $res->json()['rajaongkir']['results'];
    }
    public static function getKota($id)
    {
        $res = Http::withHeaders(['key' => env('RAJAONGKIR_API_KEY')])
            ->get('https://api.rajaongkir.com/starter/city?province='.$id);

        return $res->json()['rajaongkir']['results'];
    }
    public static function getNamaKota($idkota, $idprovinsi)
    {
        $res = Http::withHeaders(['key' => env('RAJAONGKIR_API_KEY')])
            ->get('https://api.rajaongkir.com/starter/city?id='.$idkota.'&province='.$idprovinsi);

        return $res->json()['rajaongkir']['results'];
    }
    public static function getCost($idKotaAsal, $idKotaTujuan, $weight)
    {
        $courierCost=array();
        $courierName=array('jne', 'pos','tiki');
        foreach ($courierName as $cour) {
            $res = Http::withHeaders(['key' => env('RAJAONGKIR_API_KEY')])
            ->post('https://api.rajaongkir.com/starter/cost', [
                'origin' => $idKotaAsal,
                'destination' => $idKotaTujuan,
                'weight' => $weight,
                'courier' => $cour
            ]);
            array_push($courierCost,$res->json()['rajaongkir']['results']);
        }
        return $courierCost;
    }

}