<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\HargaLaundry;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['Customer', 'hargaLaundry'])->latest()->paginate(10);
        return view('pages.transaksi.index', compact('orders'));
    }

    public function create()
    {
        $customers = User::where('role', 'Costumer')->get();
        $pakaian = HargaLaundry::all();
        return view('pages.transaksi.create', compact('customers', 'pakaian'));
    }


    public function store(Request $request)
    {
        // Menampilkan request yang diterima
        Log::debug($request->all());

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'harga_laundry_id' => 'required|exists:harga_laundry,id',
            'berat_pakaian' => 'required|numeric',
            'status_pembayaran' => 'required|in:Cash,Transfer',
            'diskon' => 'nullable',
            'lama' => 'required|string',
            'harga' => 'required|numeric',
        ]);

        // Ambil harga dan lama dari request
        $harga = $request->harga;
        $lama = $request->lama;

        // Cek jika harga dan lama kosong atau tidak valid
        if (!$harga || !$lama) {
            return redirect()->back()->with('error', 'Harga atau lama tidak valid.');
        }

        // Menyimpan ke database
        $order = Order::create([
            'user_id' => $request->user_id,
            'harga_laundry_id' => $request->harga_laundry_id,
            'no_transaksi' => strtoupper(Str::random(10)), // No Transaksi random & unik
            'berat_pakaian' => $request->berat_pakaian,
            'status_pembayaran' => $request->status_pembayaran,
            'harga' => $harga,    // Harga yang dipilih
            'lama' => $lama,      // Lama pengerjaan yang dipilih
            'diskon' => $request->diskon,
        ]);

        Log::debug('Order berhasil disimpan: ', ['order' => $order]);

        return redirect()->route('order.index')->with('success', 'Order berhasil dibuat!');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::with(['customer', 'hargaLaundry'])->findOrFail($id);
        return view('pages.transaksi.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $customers = User::where('role', 'Costumer')->get();
        $pakaian = HargaLaundry::all();
        return view('pages.transaksi.edit', compact('order', 'customers', 'pakaian'));
    }


    public function update(Request $request, Order $order)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'harga_laundry_id' => 'required|exists:harga_laundry,id',
            'berat_pakaian' => 'required|numeric',
            'status_pembayaran' => 'required|in:Cash,Transfer',
            'diskon' => 'nullable|numeric',
            'harga' => 'required|numeric',
            'lama' => 'required|string',
        ]);

        $order->update([
            'user_id' => $request->user_id,
            'harga_laundry_id' => $request->harga_laundry_id,
            'berat_pakaian' => $request->berat_pakaian,
            'status_pembayaran' => $request->status_pembayaran,
            'harga' => $request->harga,
            'lama' => $request->lama,
            'diskon' => $request->diskon,
        ]);

        return redirect()->route('order.index')->with('success', 'Order berhasil diperbarui.');
    }


    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('order.index')->with('success', 'Order berhasil dihapus.');
    }
}
