@extends('layouts.main')

@section('content')
<div class="min-h-screen bg-black text-slate-300 p-6 flex justify-center items-center font-sans">
    <div class="relative w-full max-w-xl p-px bg-red-900/20 rounded-sm">
        <div class="absolute -top-2 -left-2 w-10 h-10 border-t-2 border-l-2 border-red-600"></div>
        <div class="absolute -bottom-2 -right-2 w-10 h-10 border-b-2 border-r-2 border-red-600"></div>

        <div class="bg-neutral-950 p-8 shadow-2xl">
            <div class="mb-10 border-b border-red-900/30 pb-4">
                <h2 class="text-3xl font-black italic tracking-tighter text-white uppercase flex items-center gap-3">
                    <span class="w-2 h-8 bg-red-600"></span>
                    Tambah <span class="text-red-600">Karyawan</span>
                </h2>
                <div class="flex justify-between items-center mt-2">
                    <span class="text-[10px] font-mono text-red-500/50 uppercase tracking-[0.3em]">Status: Input_Mode_Aktif</span>
                    <a href="{{ route('karyawan') }}" class="text-[10px] font-bold text-slate-500 hover:text-red-400 transition-colors flex items-center gap-1 uppercase">
                        [ ESC ] Kembali
                    </a>
                </div>
            </div>

            <form action="{{ route('karyawan.create')}}" method="POST" class="space-y-8">
                @csrf

                <div class="group relative">
                    <label for="nama" class="block text-xs font-bold text-red-600 uppercase tracking-widest mb-2 group-focus-within:text-red-400 transition-colors">
                        Nama_Lengkap // Identitas
                    </label>
                    <input type="text" name="nama" id="nama" 
                           placeholder="ENTRI NAMA DISINI..." 
                           class="w-full bg-transparent border-b-2 border-red-900/50 focus:border-red-600 text-white py-2 px-0 outline-none transition-all placeholder:text-neutral-800 font-mono" 
                           required>
                </div>

                <div class="group relative">
                    <label for="posisi" class="block text-xs font-bold text-red-600 uppercase tracking-widest mb-2 group-focus-within:text-red-400 transition-colors">
                        Posisi_Struktural // Jabatan
                    </label>
                    <input type="text" name="posisi" id="posisi" 
                           placeholder="TENTUKAN PERAN..." 
                           class="w-full bg-transparent border-b-2 border-red-900/50 focus:border-red-600 text-white py-2 px-0 outline-none transition-all placeholder:text-neutral-800 font-mono" 
                           required>
                </div>

                <!-- Dropdown Departemen -->
                <div class="group relative">
                    <label for="departemen_id" class="block text-xs font-bold text-red-600 uppercase tracking-widest mb-2">
                        Departemen // Sektor
                    </label>
                    <select name="departemen_id" id="departemen_id"
                            class="w-full bg-black border border-red-600 text-white p-2 font-mono">
                        @foreach($departemens as $d)
                            <option value="{{ $d->id }}">{{ $d->nama_departemen }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="pt-4">
                    <button type="submit" class="relative w-full group overflow-hidden border border-red-600 p-4 transition-all hover:shadow-[0_0_20px_rgba(220,38,38,0.4)]">
                        <div class="absolute inset-0 bg-red-600 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                        
                        <span class="relative z-10 text-white font-black uppercase tracking-[0.5em] italic flex justify-center items-center gap-2">
                            Deploy_Data 
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </span>
                    </button>
                </div>
            </form>
            
            <div class="mt-8 flex justify-between items-center">
                <div class="h-[1px] flex-1 bg-gradient-to-r from-transparent to-red-900/50"></div>
                <div class="mx-4 text-[8px] font-mono text-red-900">SYS_SECURE_AUTH_0x44</div>
                <div class="h-[1px] flex-1 bg-gradient-to-l from-transparent to-red-900/50"></div>
            </div>
        </div>
    </div>
</div>
@endsection