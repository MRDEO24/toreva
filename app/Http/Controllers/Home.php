<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paket;
use App\Gambar;
use Illuminate\Support\Facades\Storage;
use App\Order;
use Illuminate\Support\Facades\Auth;

class Home extends Controller
{
    // public function authenticate()
    // {
    //     if (!Auth::user())
    //     {
    //         return redirect()->intended('login');
    //     }
    // }
    public function index()
    {
        $context = [
            'nama_halaman' => "Welcome to Toreva",
            'type' => 1,
            'allpaket' => Paket::all()->take(3),
            'gambar' => Gambar::where('image_name', 'like', '%' . 'image_1' . '%')->get()
        ];
        return view('home.index', $context);
    }
    public function detail($id)
    {

        $paket = Paket::where('id_paket', '=', $id)->first();
        $gambar = Gambar::where('id_paket', '=', $id)->get();
        $gambars = Gambar::where('id_paket', '=', $id)->first();

        $context = [
            'nama_halaman' => "Detail Paket",
            'type' => 1,
            'paket' => $paket,
            'gambar' => $gambar,
            'gambars' => $gambars
        ];
        return view('home.detail', $context);
    }
    public function paket()
    {
        $context = [
            'nama_halaman' => "All Package",
            'type' => 2,
            'allpaket' => Paket::all(),
            'gambar' => Gambar::where('image_name', 'like', '%' . 'image_1' . '%')->get()
        ];
        return view('home.paket', $context);
    }
    public function orda(Request $request)
    {
        // dump($request->all());
        // die;
        $p = Paket::where('id_paket', $request->id_paket)->first();
        $dewasa = $request->dewasa * $p->harga_dewasa;
        $anak = $request->anak * $p->harga_anak;
        $checkout = date('Y-m-d', strtotime($request->check_in . ' + ' . $p->hari_paket . ' days'));
        $tot = $dewasa + $anak;
        $sekarang = date('Y-m-d', time());
        $tenggat = date('Y-m-d', strtotime($sekarang . ' + 1 days'));
        $con = Order::count() + 1;
        $kode = $p->nama_paket[0] . $p->lokasi[0] . $p->id_paket . 'TRV' . $con . substr($request->no_hp, -3);;
        //    dump($tenggat);
        //     die;
        Order::create([
            'id_paket' => $request->id_paket,
            'kode' => $kode,
            'nama_orang' => $request->nama_orang,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'dewasa' => $request->dewasa,
            'anak' => $request->anak,
            'total_harga_dewasa' => $dewasa,
            'total_harga_anak' => $anak,
            'bukti' => null,
            'check_in' => $request->check_in,
            'check_out' => $checkout,
            'total_harga' => $tot,
            'status_pembayaran' => 1,
            'tenggat_pembayaran' => $tenggat
        ]);
        $detail = [
            'title' => $kode,
            'body' => "Gunakan kode diatas untuk mengecek status pesanan di menu beranda website toreva."
        ];
        \Mail::to($request->email)->send(new \App\Mail\TestMail($detail));
        return redirect()->route('invoice', ['id' => $con])->with('status', $kode);
    }
    public function bukti(Request $request, $id)
    {
        if ($request->hasFile('bukti')) {
            //  Let's do everything here
            if ($request->file('bukti')->isValid()) {
                //
                $validated = $request->validate([
                    // 'name' => 'string|max:40',
                    'bukti' => 'mimes:jpeg,png|max:1024',
                ]);
                $extension = $request->bukti->extension();
                $request->bukti->storeAs('/public/order/' . $id, "bukti" . "." . $extension);
                $url = Storage::url('order/' . $id . '/' . 'bukti' . "." . $extension);
                Order::where('id_order', $id)->update([
                    'bukti' => $url,
                    'status_pembayaran' => 2
                ]);
            }
        }
        return redirect()->route('invoice', ['id' => $id]);
    }
    public function bukti2(Request $request, $id)
    {
        Order::where('id_order', $id)->update([
            'status_pembayaran' => $request->spp
        ]);

        return redirect('/admin/order')->with('status', "Bukti Diterima");
    }
    public function selesai($id)
    {
        Order::where('id_order', $id)->update([
            'status_pembayaran' => 4
        ]);

        return redirect('/admin/order')->with('status', "Order Selesai");
    }
    public function invoice($id)
    {
        
        $rastes = Order::where('id_order', $id)->first();
        $context = [
            'nama_halaman' => "Halaman Invoice",
            'type' => 2,
            'orda' => $rastes,
            'paket' => Paket::where('id_paket', $rastes->id_paket)->first()
        ];

        return view('home.invoice', $context);
    }

    public function check($kode)
    {
        $or = Order::where('kode', $kode)->first();
        if ($or == null) {
            return redirect('/')->with('status', 'Data tidak ditemukan');
        } else {

            if ($or->status_pembayaran == 4) {
                return redirect('/')->with('status', 'Data tidak ditemukan');
            } else {
                return redirect()->route('invoice', ['id' => $or->id_order]);
            }
        }
    }
}
