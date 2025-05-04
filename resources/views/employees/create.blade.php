@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    {{-- Header --}}
    <h1 class="text-3xl font-extrabold text-center text-pink-600 mb-8">
        📝 <span class="underline decoration-wavy decoration-pink-400">Tambah Karyawan Baru</span>
    </h1>

    {{-- Error Messages --}}
    @if ($errors->any())
        <div class="mb-6 bg-pink-100 border border-pink-300 text-pink-800 px-5 py-4 rounded-lg shadow">
            ⚠️ <strong>Ada kesalahan nih:</strong>
            <ul class="mt-2 list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>❌ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Container --}}
    <form action="{{ route('employees.store') }}" method="POST"
          class="bg-white shadow-lg rounded-2xl p-8 border-2 border-pink-200">
        @csrf

        {{-- Employee Name --}}
        <div class="mb-6">
            <label for="name" class="block text-lg font-semibold text-gray-700 mb-2">
                👤 Nama Karyawan
            </label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                   class="w-full px-5 py-3 border-2 border-pink-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-400 transition"
                   placeholder="Contoh: Budi Santoso" required>
        </div>

        {{-- Company --}}
        <div class="mb-6">
            <label for="company_id" class="block text-lg font-semibold text-gray-700 mb-2">
                🏢 Perusahaan
            </label>
            <select name="company_id" id="company_id"
                    class="w-full px-5 py-3 border-2 border-pink-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-400 transition"
                    required>
                <option value="" disabled selected>— Pilih Perusahaan —</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}"
                        {{ old('company_id') == $company->id ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Skills --}}
        <div class="mb-8">
            <label class="block text-lg font-semibold text-gray-700 mb-2">
                💼 Keahlian
            </label>
            <div class="flex flex-wrap gap-4">
                @foreach ($skills as $skill)
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="skills[]" id="skill-{{ $skill->id }}" value="{{ $skill->id }}"
                               class="h-5 w-5 text-pink-500 focus:ring-pink-400 border-gray-300 rounded">
                        <label for="skill-{{ $skill->id }}" class="text-gray-700 hover:text-pink-600 cursor-pointer">
                            {{ $skill->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Submit --}}
        <div class="flex justify-center">
            <button type="submit"
                    class="inline-flex items-center gap-2 px-8 py-3 bg-pink-500 hover:bg-pink-600 text-white font-bold rounded-full shadow-lg transform transition hover:scale-105">
                💾 Simpan Karyawan
            </button>
        </div>
    </form>
</div>
@endsection
