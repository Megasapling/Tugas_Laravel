@extends('layouts.main')

@section('content')
<div class="min-h-screen bg-black text-slate-200 font-sans p-6">
    <div class="relative mb-8 p-6 bg-gradient-to-r from-red-950 to-black border-l-4 border-red-600 shadow-[0_0_15px_rgba(220,38,38,0.3)]">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-3xl font-black tracking-tighter uppercase italic text-white">
                    <span class="text-red-600">//</span> Data Karyawan
                </h2>
                <p class="text-xs text-red-400 mt-1 uppercase tracking-widest">Sistem Manajemen Personel v1.0</p>
            </div>
            
            <a href="{{ route('karyawan.tambah') }}" 
               class="group relative px-6 py-2 font-bold text-white transition-all">
                <span class="absolute inset-0 w-full h-full bg-red-600 transform skew-x-12 group-hover:bg-red-500 group-hover:shadow-[0_0_20px_rgba(220,38,38,0.6)] transition-all"></span>
                <span class="relative z-10 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    TAMBAH DATA
                </span>
            </a>
        </div>
    </div>

    <!-- Form Pencarian -->
    <div class="mb-6">
        <form action="{{ route('karyawan') }}" method="GET" class="flex gap-2">
            <input type="text" name="search" placeholder="Cari Identitas..." 
                   class="bg-neutral-900 border border-red-600 text-white px-4 py-2 w-full focus:ring-2 focus:ring-red-500 outline-none italic font-mono uppercase text-xs tracking-widest">
            <button type="submit" class="bg-red-600 text-black px-6 font-black hover:bg-white transition-all skew-x-[-12deg]">
                SCAN
            </button>
        </form>
    </div>

    <div class="overflow-hidden border border-red-900/30 bg-neutral-900/50 backdrop-blur-md rounded-sm">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-red-600 text-black uppercase text-xs font-black tracking-widest">
                    <th class="px-6 py-4">ID_UNIT</th>
                    <th class="px-6 py-4">NAMA_SUBJEK</th>
                    <th class="px-6 py-4">SEKTOR_DEPARTEMEN</th>
                    <th class="px-6 py-4 text-center">OPERASI</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-red-900/20">
                @foreach ($karyawan as $p)
                <tr class="hover:bg-red-600/5 transition-colors group">
                    <td class="px-6 py-4 font-mono text-red-500">#{{ str_pad($p->id, 4, '0', STR_PAD_LEFT) }}</td>
                    <td class="px-6 py-4">
                        <div class="font-bold text-white group-hover:text-red-400 transition-colors uppercase">{{ $p->nama }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-red-400 font-mono text-xs">
                            // {{ $p->departemen->nama_departemen ?? 'TIDAK ADA' }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center gap-4">
                            <a href="/karyawan/{{ $p->id }}" 
                               class="text-xs font-bold text-slate-400 hover:text-white flex items-center gap-1 transition-all">
                                <span class="w-2 h-2 bg-yellow-500 rounded-full inline-block"></span> EDIT
                            </a>

                            <form action="{{ route('karyawan.delete', ['id' => $p->id ])}}" method="POST" class="inline">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" 
                                        onclick="return confirm('Hapus data karyawan?')"
                                        class="text-xs font-bold text-red-900 hover:text-red-500 flex items-center gap-1 transition-all uppercase">
                                    <span class="w-2 h-2 bg-red-600 rounded-full inline-block"></span> HAPUS
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $karyawan->links() }}
    </div>
    
    <div class="mt-4 text-[10px] text-red-900/50 text-right uppercase tracking-[0.3em]">
        Status: Terminal Aktif // Terenkripsi
    </div>
</div>
@endsection