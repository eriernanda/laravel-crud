<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $i = 0;
        $barangs = Barang::all();
        return view ('barangs.index', compact('barangs', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->hak_akses == "superuser") {
            return view ('barangs.create');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nm_barang' => 'required',
            'kategori' => 'required',
            'harga' => 'required|integer|min:0',
            'gambar' => 'required|mimes:png,jpg,jpeg|max:5048'
        ]);

        $diskon= 0;
        $harga = $request->harga;
        if ($harga >= 40000) {
            $diskon = $harga * 10 / 100;
        }
        $newImageName = time() . '-' . $request->nm_barang . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('images'), $newImageName);

        $barang = Barang::create([
            'nm_barang' => $request->input('nm_barang'),
            'kategori ' => $request->input('kategori'),
            'harga' => $request->input('harga'),
            'diskon' => $diskon,
            'gambar' => $newImageName,
        ]);

        return redirect('/barangs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        if (auth()->user()->hak_akses == "superuser") {
            return view ('barangs.edit', compact('barang'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nm_barang' => 'required',
            'kategori' => 'required',
            'harga' => 'required|integer|min:0',
            'gambar' => 'required|mimes:png,jpg,jpeg|max:5048'
        ]);

        $harga = $request->harga;
        if ($harga >= 40000) {
            $diskon = $harga * 10 / 100;
        }
        $newImageName = time() . '-' . $request->nm_barang . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('images'), $newImageName);
        $id = $barang->id;
        $barang = Barang::where('id', $id)
            ->update([
                'nm_barang' => $request->input('nm_barang'),
                'kategori' => $request->input('kategori'),
                'harga' => $request->input('harga'),
                'diskon' => $diskon,
                'gambar' => $newImageName,
        ]);

        return redirect('/barangs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        if (auth()->user()->hak_akses == "superuser") {
            $barang->delete();
            return redirect('/barangs');
        }
        
    }
}
