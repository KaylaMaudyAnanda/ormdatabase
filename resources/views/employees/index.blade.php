@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    {{-- Header --}}
    <h1 class="text-3xl font-extrabold text-center text-pink-600 mb-6">
        👥 <span class="underline decoration-wavy decoration-pink-400">Daftar Karyawan</span>
    </h1>

    {{-- Tombol Tambah --}}
    <div class="mb-6 text-right">
        <a href="{{ route('employees.create') }}"
           class="inline-flex items-center gap-2 px-6 py-3 bg-pink-500 hover:bg-pink-600 text-white font-bold rounded-full shadow-lg transition transform hover:scale-105">
            ➕ Tambah Karyawan
        </a>
    </div>

    {{-- Tabel Karyawan --}}
    <div class="overflow-x-auto shadow-lg sm:rounded-lg">
        <table class="min-w-full bg-white border border-pink-200">
            <thead class="bg-pink-100 text-pink-600">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-medium">#</th>
                    <th class="px-6 py-4 text-left text-sm font-medium">Nama Karyawan</th>
                    <th class="px-6 py-4 text-left text-sm font-medium">Perusahaan</th>
                    <th class="px-6 py-4 text-left text-sm font-medium">Keahlian</th>
                    <th class="px-6 py-4 text-center text-sm font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse ($employees as $employee)
                    <tr class="border-b border-pink-200 hover:bg-pink-50 transition">
                        <td class="px-6 py-4 text-sm">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 text-sm">{{ $employee->name }}</td>
                        <td class="px-6 py-4 text-sm">{{ $employee->company->name }}</td>
                        <td class="px-6 py-4 text-sm">
                            @foreach ($employee->skills as $skill)
                                <span class="inline-block bg-pink-100 text-pink-700 rounded-full px-3 py-1 text-xs mr-2 mb-2">
                                    {{ $skill->name }}
                                </span>
                            @endforeach
                        </td>
                        <td class="px-6 py-4 text-center text-sm space-x-3">
                            <a href="{{ route('employees.edit', $employee) }}"
                               class="text-pink-600 hover:text-pink-800 font-semibold transition">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Yakin mau hapus karyawan ini?')"
                                        class="text-red-500 hover:text-red-700 font-semibold transition">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-400 italic">
                            😿 Belum ada karyawan terdaftar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if(method_exists($employees, 'links'))
    <div class="mt-6">
        {{ $employees->links('pagination::tailwind') }}
    </div>
    @endif
</div>
@endsection
