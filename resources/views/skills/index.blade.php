@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    {{-- Header --}}
    <h1 class="text-3xl font-extrabold text-center text-pink-600 mb-6">
        💼 <span class="underline decoration-wavy decoration-pink-400">Daftar Skill</span>
    </h1>

    {{-- Tombol Tambah Skill --}}
    <div class="mb-6 text-right">
        <a href="{{ route('skills.create') }}"
           class="inline-flex items-center gap-2 px-6 py-3 bg-pink-500 hover:bg-pink-600 text-white font-bold rounded-full shadow-lg transition transform hover:scale-105">
            ➕ Tambah Skill
        </a>
    </div>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="mb-6 bg-pink-100 border border-pink-300 text-pink-800 px-5 py-4 rounded-lg shadow">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Tabel Skill --}}
    <div class="overflow-x-auto shadow-lg sm:rounded-lg">
        <table class="min-w-full bg-white border border-pink-200">
            <thead class="bg-pink-100 text-pink-600">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-medium">No</th>
                    <th class="px-6 py-4 text-left text-sm font-medium">Nama Skill</th>
                    <th class="px-6 py-4 text-center text-sm font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($skills as $index => $skill)
                    <tr class="border-b border-pink-200 hover:bg-pink-50 transition">
                        <td class="px-6 py-4 text-sm">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-sm">{{ $skill->name }}</td>
                        <td class="px-6 py-4 text-center text-sm space-x-3">
                            <a href="{{ route('skills.edit', $skill->id) }}"
                               class="text-pink-600 hover:text-pink-800 font-semibold transition">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Yakin hapus skill ini?')"
                                        class="text-red-500 hover:text-red-700 font-semibold transition">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if(method_exists($skills, 'links'))
    <div class="mt-6">
        {{ $skills->links('pagination::tailwind') }}
    </div>
    @endif
</div>
@endsection
