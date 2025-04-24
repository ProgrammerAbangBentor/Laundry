<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HargaLaundry;

class HargaLaundryController extends Controller
{
    public function index()
    {
        $data = HargaLaundry::paginate(10);
        return view('pages.finance.index', compact('data'));
    }

    public function create()
    {
        return view('pages.finance.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|string',
            'lama' => 'required|string',
            'kg' => 'required|string',
            'harga' => 'required|integer',
            'status' => 'required|in:Aktif,Nonaktif',
        ]);

        HargaLaundry::create($request->all());

        return redirect()->route('laundry.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
       $item = HargaLaundry::findOrFail($id);
        return view('pages.finance.edit', compact('item',));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'jenis' => 'required|string',
        'lama' => 'required|string',
        'kg' => 'required|numeric',
        'harga' => 'required|numeric',
        'status' => 'required|string|in:aktif,nonaktif',
    ]);

    $laundry = HargaLaundry::findOrFail($id);
    $laundry->update([
        'jenis' => $request->jenis,
        'lama' => $request->lama,
        'kg' => $request->kg,
        'harga' => $request->harga,
        'status' => $request->status,
    ]);

    return redirect()->route('laundry.index')->with('success', 'Data berhasil diperbarui');
}

    public function destroy(string $id)
    {
        $hargaLaundry = HargaLaundry::findOrFail($id);
        $hargaLaundry->delete();
        return redirect()->route('laundry.index')->with('success', 'Data berhasil dihapus');
    }
}
