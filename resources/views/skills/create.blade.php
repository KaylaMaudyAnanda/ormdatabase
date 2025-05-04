@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto py-10 px-4 sm:px-6 lg:px-8">
    {{-- Header --}}
    <h1 class="text-3xl font-extrabold text-center text-pink-600 mb-8">
        🎨 <span class="underline decoration-wavy decoration-pink-400">Tambah Skill Baru</span>
    </h1>

    {{-- Error Messages --}}
    @if ($errors->any())
        <div class="mb-6 bg-pink-100 border border-pink-300 text-pink-800 px-5 py-4 rounded-lg shadow">
            ⚠️ <strong>Ups, ada kesalahan:</strong>
            <ul class="mt-2 list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>❌ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Container --}}
    <form action="{{ route('skills.store') }}" method="POST"
          class="bg-white shadow-lg rounded-2xl p-8 border-2 border-pink-200">
        @csrf

        {{-- Skill Name --}}
        <div class="mb-6">
            <label for="name" class="block text-lg font-semibold text-gray-700 mb-2">
                💡 Nama Skill
            </label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                   class="w-full px-5 py-3 border-2 border-pink-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-400 transition"
                   placeholder="Contoh: Pemrograman Laravel" required>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-between">
            <a href="{{ route('skills.index') }}"
               class="inline-flex items-center gap-2 px-6 py-3 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold rounded-full shadow transition transform hover:scale-105">
                🔙 Kembali
            </a>
            <button type="submit"
                    class="inline-flex items-center gap-2 px-6 py-3 bg-pink-500 hover:bg-pink-600 text-white font-bold rounded-full shadow-lg transform transition hover:scale-105">
                💾 Simpan Skill
            </button>
        </div>
    </form>
</div>
@endsection
