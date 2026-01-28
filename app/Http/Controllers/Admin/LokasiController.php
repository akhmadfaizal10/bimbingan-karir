<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Lokasi;

class LokasiController extends Controller
{
    public function index()
    {
        return view('admin.lokasi.index', [
            'lokasi' => Lokasi::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lokasi' => 'required|unique:lokasi,nama_lokasi'
        ]);

        Lokasi::create($request->only('nama_lokasi'));
        return back();
    }

    public function update(Request $request, Lokasi $lokasi)
    {
        $request->validate([
            'nama_lokasi' => 'required|unique:lokasi,nama_lokasi,' . $lokasi->id
        ]);

        $lokasi->update($request->only('nama_lokasi'));
        return back();
    }

    public function destroy(Lokasi $lokasi)
    {
        $lokasi->delete();
        return back();
    }
}

