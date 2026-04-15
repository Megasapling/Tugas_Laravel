@extends('layouts.main')

@section('content')
    <div class="px-3 py-4">
        <h2 class="text-2xl font-semibold">Edit Data Karyawan</h2>
    </div>
    
    <div class="px-3 pb-3">
        <a href="{{ route('karyawan') }}" class="text-lg text-blue-600 font-base">Kembali</a>
    </div>

    <form action="{{ route('karyawan.update', ['id' => $karyawan->id ])}}" method="POST" class="mx-auto p-6">
        @csrf
        <input name="_method" type="hidden" value="PUT">
        <div class="mb-5">
            <label for="nama" class="block text-sm font-medium text-slate-700 mb-2">Nama</label>
            <input type="text" name="nama" id="nama" placeholder="Masukkan nama karyawan" class="w-full px-4 py-2 border border-blue-300 rounded-md" required
            value="{{ $karyawan->nama }}">
        </div>

        <div class="mb-6 mt-2">
            <label for="posisi" class="block text-sm font-medium text-slate-700 mb-2">Posisi</label>
            <input type="text" name="posisi" id="posisi" placeholder="Masukkan posisi karyawan" class="w-full px-4 py-2 border border-blue-300 rounded-md" required
            value="{{ $karyawan->posisi }}">
        </div>
        
        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md cursor-pointer">
            Edit Karyawan
        </button>
    </form>
@endsection