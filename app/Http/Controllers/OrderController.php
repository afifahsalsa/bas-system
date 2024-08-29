<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Produk;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::all();
        return view('admin.order.index', [
            'title' => 'Order',
            'order' => $order
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
        $findBarcode = Produk::where('barcode', $request->barcode)->first();

        if ($findBarcode) {
            $total = $request->qty * $findBarcode->harga_jual;
            dd($findBarcode);
            $order = Order::create([
                'barcode' => $request->barcode,
                'nama' => $findBarcode->nama,
                'qty' => $request->qty,
                'harga' => $findBarcode->harga_jual,
                'total' => $total,
                'jenis_pembayaran' => $request->jenis_pembayaran
            ]);

            return redirect()->back()->withInput([
                'barcode' => $request->barcode,
                'nama' => $findBarcode->nama,
                'qty' => $request->qty,
                'harga' => $findBarcode->harga_jual,
                'total' => $total,
            ]);
        } else {
            return redirect()->back()->withErrors(['Barcode tidak ditemukan']);
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
