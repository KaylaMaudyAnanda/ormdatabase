@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-12 px-6">
    {{-- Header --}}
    <h1 class="text-3xl font-extrabold text-center text-pink-600 mb-6">🔧 <span class="underline decoration-wavy decoration-pink-400">Edit Data Perusahaan</span></h1>

    {{-- Error Message --}}
    @if ($errors->any())
        <div class="mb-4 bg-pink-100 border border-pink-300 text-pink-800 px-4 py-3 rounded-lg shadow">
            ⚠️ <strong>Oops!</strong> Ada yang perlu kamu perbaiki:
            <ul class="mt-2 list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>🛑 {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('companies.update', $company->id) }}" method="POST" class="bg-white shadow-xl rounded-2xl p-8 border-2 border-pink-200">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label for="name" class="block text-lg font-semibold text-gray-800 mb-2">
                🏢 <span class="text-pink-700">Nama Perusahaan</span>
            </label>
            <input type="text" name="name" id="name" value="{{ old('name', $company->name) }}"
                   class="w-full px-5 py-3 border-2 border-pink-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-transparent transition"
                   placeholder="Contoh: PT. Cinta Abadi">
        </div>

        <div class="flex justify-center">
            <button type="submit"
                    class="px-6 py-3 bg-pink-500 hover:bg-pink-600 text-white font-bold rounded-full shadow-lg transition-all flex items-center gap-2">
                ✏️ Perbarui Perusahaan
            </button>
        </div>
    </form>
</div>
@endsection
