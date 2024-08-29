<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\BackupGlobals;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisKategori = Kategori::all();
        return view('admin.kategori.index', [
            'jenisKategori' => $jenisKategori,
            'title' => 'Kategori'
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
            'kategori' => 'required'
        ]);
        Kategori::create([
            'kategori' => $request->kategori,
        ]);
        return back()->with('success', 'Kategori berhasil ditambahkan!');
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
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'kategori' => 'required'
        ]);
        $kategori = Kategori::find($id);
        $kategori->update([
            'kategori' => $request->kategori
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kategori::findOrFail($id)->delete();
        return back();
    }
}
