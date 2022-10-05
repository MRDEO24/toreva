<?php

namespace App\Http\Controllers;

use App\Gambar;
use Illuminate\Http\Request;
use App\Paket;
use App\Order;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        $context = [
            'nama_halaman' => "Dashboard",
            'jmlpaket' => Paket::count(),
            'orda1' => Order::where('status_pembayaran',1)->count(),
            'orda2' => Order::where('status_pembayaran',2)->count(),
            'orda3' => Order::where('status_pembayaran',3)->orWhere('status_pembayaran',4)->count(),
        ];
        return view('admin.index', $context);
    }

    public function tambah()
    {
        $context = [
            'nama_halaman' => "Tambah Paket Wisata"
        ];
        return view('admin.tambah', $context);
    }
    public function edit($id)
    {
        $gambar1 = Gambar::where('id_paket', $id)->where('image_name','like','%'.'image_1'.'%')->first();
        $gambar2 = Gambar::where('id_paket', $id)->where('image_name','like','%'.'image_2'.'%')->first();
        $gambar3 = Gambar::where('id_paket', $id)->where('image_name','like','%'.'image_3'.'%')->first();
        $paket = Paket::where('id_paket', $id)->first();
        $context = [
            'nama_halaman' => "Edit Paket Wisata",
            'gambar1' => $gambar1,
            'gambar2' => $gambar2,
            'gambar3' => $gambar3,
            'paket' => $paket
            
        ];
        return view('admin.edit', $context);
    }

    public function update(Request $request,$id)
    {
        $paket = new Paket;
        $gambar = new Gambar; 

        $paket::where('id_paket',$id)->update([
            'nama_paket' => $request->nama_paket,
            'lokasi' => $request->lokasi,
            'harga_dewasa' => $request->harga_dewasa,
            'harga_anak' => $request->harga_anak,
            'hari_paket' =>$request->hari_paket,
            'detail' => $request->detail
        ]);
        // var_dump($request->id_paket);
        // die;

        $id_paked = $paket->select('id_paket')->where('nama_paket',$request->nama_paket)->first();
        $ed = explode('{"id_paket":',$id_paked);
        $es = explode('}',$ed[1]);
        
        if ($request->hasFile('image1')) {
            //  Let's do everything here
            if ($request->file('image1')->isValid()) {
                //
                $validated = $request->validate([
                    // 'name' => 'string|max:40',
                    'image1' => 'mimes:jpeg,png|max:1024',
                ]);
                $extension = $request->image1->extension();
                $request->image1->storeAs('/public/paket/'.$es[0], "image_1" . "." . $extension);
                $url = Storage::url('paket/'.$es[0].'/'.'image_1' . "." . $extension);
                $file = $gambar::create([
                    'image_name' => 'image_1' . "." . $extension,
                    'path' => $url,
                    'id_paket' => $es[0]
                ]);
            }
        } else {

        }
        if ($request->hasFile('image2')) {
            //  Let's do everything here
            if ($request->file('image2')->isValid()) {
                //
                $validated = $request->validate([
                    // 'name' => 'string|max:40',
                    'image2' => 'mimes:jpeg,png|max:1024',
                ]);
                $extension = $request->image2->extension();
                $request->image2->storeAs('/public/paket/'.$es[0], "image_2" . "." . $extension);
                $url = Storage::url('paket/'.$es[0].'/'.'image_2' . "." . $extension);
                $file = $gambar::create([
                    'image_name' => 'image_2' . "." . $extension,
                    'path' => $url,
                    'id_paket' => $es[0]
                ]);
            }
        } else {
        }
        if ($request->hasFile('image3')) {
            //  Let's do everything here
            if ($request->file('image3')->isValid()) {
                //
                $validated = $request->validate([
                    // 'name' => 'string|max:40',
                    'image3' => 'mimes:jpeg,png|max:1024',
                ]);
                $extension = $request->image3->extension();
                $request->image3->storeAs('/public/paket/'.$es[0], "image_3" . "." . $extension);
                $url = Storage::url('paket/'.$es[0].'/'.'image_3' . "." . $extension);
              
                $file = $gambar::create([
                    'image_name' => 'image_3' . "." . $extension,
                    'path' => $url,
                    'id_paket' => $es[0]
                ]);
            }
        } else {
        }

        return redirect('/admin/list')->with('status', "Data Berhasil Diubah");
    }
    public function store(Request $request)
    {
        $paket = new Paket;
        $gambar = new Gambar;

        $paket::create($request->all());
        // var_dump($request->id_paket);
        // die;

        $id_paked = $paket->select('id_paket')->where('nama_paket',$request->nama_paket)->first();
        $ed = explode('{"id_paket":',$id_paked);
        $es = explode('}',$ed[1]);
        
        if ($request->hasFile('image1')) {
            //  Let's do everything here
            if ($request->file('image1')->isValid()) {
                //
                $validated = $request->validate([
                    // 'name' => 'string|max:40',
                    'image1' => 'mimes:jpeg,png|max:1024',
                ]);
                $extension = $request->image1->extension();
                $request->image1->storeAs('/public/paket/'.$es[0], "image_1" . "." . $extension);
                $url = Storage::url('paket/'.$es[0].'/'.'image_1' . "." . $extension);
                $file = $gambar::create([
                    'image_name' => 'image_1' . "." . $extension,
                    'path' => $url,
                    'id_paket' => $es[0]
                ]);
            }
        } else {
        }
        if ($request->hasFile('image2')) {
            //  Let's do everything here
            if ($request->file('image2')->isValid()) {
                //
                $validated = $request->validate([
                    // 'name' => 'string|max:40',
                    'image2' => 'mimes:jpeg,png|max:1024',
                ]);
                $extension = $request->image2->extension();
                $request->image2->storeAs('/public/paket/'.$es[0], "image_2" . "." . $extension);
                $url = Storage::url('paket/'.$es[0].'/'.'image_2' . "." . $extension);
                $file = $gambar::create([
                    'image_name' => 'image_2' . "." . $extension,
                    'path' => $url,
                    'id_paket' => $es[0]
                ]);
            }
        } else {
        }
        if ($request->hasFile('image3')) {
            //  Let's do everything here
            if ($request->file('image3')->isValid()) {
                //
                $validated = $request->validate([
                    // 'name' => 'string|max:40',
                    'image3' => 'mimes:jpeg,png|max:1024',
                ]);
                $extension = $request->image3->extension();
                $request->image3->storeAs('/public/paket/'.$es[0], "image_3" . "." . $extension);
                $url = Storage::url('paket/'.$es[0].'/'.'image_3' . "." . $extension);
              
                $file = $gambar::create([
                    'image_name' => 'image_3' . "." . $extension,
                    'path' => $url,
                    'id_paket' => $es[0]
                ]);
            }
        } else {
        }

        return redirect('/admin/list')->with('status', "Data Berhasil Ditambah");
    }
    public function hapus($id)
    {
        $paket = new Paket;
        $gambar = Gambar::get()->where('id_paket', $id);

        File::delete('storage/app/public/paket/'.$id);
        $paket->where('id_paket', $id)->delete();
        Gambar::where('id_paket', $id)->delete();
        return redirect('/admin/list')->with('status', "Data Berhasil Dihapus");
    }
    public function listpack(Request $request)
    {
        $context = [
            'nama_halaman' => "List Paket",
            'allpaket' => Paket::all()
        ];


        return view('admin.listpack', $context);
    }
    public function order(Request $request)
    {
        $context = [
            'nama_halaman' => "List Order",
            'orda1' => Order::where('status_pembayaran',1)->get(),
            'orda2' => Order::where('status_pembayaran',2)->get(),
            'orda3' => Order::where('status_pembayaran',3)->orWhere('status_pembayaran',4)->get(),
        ];


        return view('admin.onodera', $context);
    }
}
