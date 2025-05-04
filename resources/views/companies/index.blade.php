@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    {{-- Header --}}
    <div class="flex justify-between items-center mb-10">
        <h1 class="text-4xl font-extrabold text-pink-600">🐱‍👤 Daftar Perusahaan</h1>
        <a href="{{ route('companies.create') }}"
           class="inline-flex items-center gap-2 px-6 py-3 bg-pink-500 hover:bg-pink-600 text-white text-sm font-bold rounded-full shadow-lg transition-all">
            🚀 Tambah Baru
        </a>
    </div>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="mb-6 px-4 py-3 bg-green-100 border border-green-300 text-green-900 rounded-lg shadow-md">
            🎉 {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden border-2 border-purple-200">
        <table class="min-w-full divide-y divide-purple-100 text-sm">
            <thead class="bg-gradient-to-r from-pink-400 to-purple-500 text-white text-base font-bold">
                <tr>
                    <th class="px-6 py-4 text-left">🏢 Nama Perusahaan</th>
                    <th class="px-6 py-4 text-left">🛠️ Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-purple-100 text-gray-800 bg-white">
                @forelse ($companies as $company)
                    <tr class="hover:bg-pink-50 transition duration-300 ease-in-out">
                        <td class="px-6 py-4 font-semibold text-lg">{{ $company->name }}</td>
                        <td class="px-6 py-4 flex space-x-3 items-center">
                            <a href="{{ route('companies.edit', $company) }}"
                               class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium transition">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('companies.destroy', $company) }}" method="POST"
                                  onsubmit="return confirm('Yakin mau hapus perusahaan ini? 😱')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-medium transition">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="px-6 py-6 text-center text-gray-400 italic">
                            😿 Belum ada perusahaan yang terdaftar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
