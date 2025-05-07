<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data produk
        $produks = Produk::all();

        // Tampilkan data ke view produk.index
        return view('produk.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'nama_produk' => 'required',
        'kategori' => 'required',
        'harga' => 'required|numeric',
        'stok' => 'required|integer',
        'deskripsi' => 'nullable',
    ]);

    // Simpan data produk dengan mengambil data yang sudah tervalidasi
    Produk::create([
        'nama_produk' => $validatedData['nama_produk'],
        'kategori' => $validatedData['kategori'],
        'harga' => $validatedData['harga'],
        'stok' => $validatedData['stok'],
        'deskripsi' => $validatedData['deskripsi'] ?? null, // Jika deskripsi kosong, simpan sebagai null
    ]);

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
}


    /**
     * Show the specified resource.
     */
    public function show(Produk $produk)
    {
        // Tidak digunakan dalam CRUD ini
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        // Validasi input
        $request->validate([
            'nama_produk' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'deskripsi' => 'nullable',
        ]);

        // Update data produk
        $produk->update($request->all());

        // Redirect ke halaman index
        return redirect()->route('produk.index')->with('success', 'Produk berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        // Hapus data produk
        $produk->delete();

        // Redirect ke halaman index
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
