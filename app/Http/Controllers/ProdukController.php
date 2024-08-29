<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisProduk = Produk::all();
        $kategoriId = Kategori::all();
        return view('admin.Produk.index', [
            'jenisProduk' => $jenisProduk,
            'title' => 'Produk',
            'kategoriId' => $kategoriId
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'barcode' => 'required',
            'nama_produk' => 'required',
            'merk' => 'required',
            'qty' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'harga_beli' => 'required|numeric',
            'satuan' => 'required',
            'kategori' => 'required'
        ]);
        $kategori = Kategori::where('kategori', $request->kategori)->first();
        Produk::create([
            'barcode' => $request->barcode,
            'nama' => $request->nama_produk,
            'merk' => $request->merk,
            'qty' => $request->qty,
            'harga_jual' => $request->harga_jual,
            'harga_beli' => $request->harga_beli,
            'satuan' => $request->satuan,
            'kategori_id' => $kategori->id
        ]);
        return back()->with('success', 'Produk baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $barcode)
    {
        $this->validate($request, [
            'barcode' => 'required',
            'nama' => 'required',
            'qty' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'harga_beli' => 'required|numeric',
            'satuan' => 'required',
        ]);
        $updateProduk = Produk::where('barcode', $barcode)->firstOrFail();
        $updateProduk->update([
            'barcode' => $request->barcode,
            'nama' => $request->nama,
            'qty' => $request->qty,
            'harga_jual' => $request->harga_jual,
            'harga_beli' => $request->harga_beli,
            'satuan' => $request->satuan,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $barcode)
    {
        Produk::findOrFail($barcode)->delete();
        return back();
    }
}
