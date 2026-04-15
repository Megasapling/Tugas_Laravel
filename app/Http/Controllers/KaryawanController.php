<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Departemen; // Injeksi Model Departemen
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    // READ & SEARCH
    public function index(Request $request)
    {
        $query = Karyawan::with('departemen');

        if ($request->has('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('posisi', 'like', '%' . $request->search . '%');
        }

        $karyawan = $query->paginate(10);
        return view('karyawan.index', compact('karyawan'));
    }

    // CREATE FORM
    public function show()
    {
        // Mengambil semua data dari tabel departemens
        $departemens = Departemen::all(); 
        
        // Mengirim ke view tambah
        return view('karyawan.tambah', compact('departemens'));
    }

    // STORE DATA
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'posisi' => 'required',
            'departemen_id' => 'required|exists:departemens,id'
        ]);
    
        Karyawan::create($validatedData);

        return redirect('/karyawan')->with('success', 'Subjek berhasil diinisialisasi.');
    }

    // EDIT FORM
    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $departemens = Departemen::all();

        return view('karyawan.edit', compact('karyawan', 'departemens'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $validatedData = $request->validate([
            'nama' => 'required',
            'posisi' => 'required',
            'departemen_id' => 'required|exists:departemens,id'
        ]);
        
        $karyawan->update($validatedData);

        return redirect('/karyawan')->with('info', 'Protokol data telah diperbarui.');
    }

    // DELETE DATA
    public function destroy($id)
    {
        Karyawan::destroy($id);
        return redirect('/karyawan')->with('warning', 'Data telah dihapus dari sistem.');
    }
}