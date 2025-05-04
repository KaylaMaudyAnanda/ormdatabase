@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-4">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-4xl font-bold text-primary">Selamat Datang di Aplikasi Manajemen Skill</h1>
    </div>

    <div class="bg-white shadow rounded-lg p-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Silakan pilih modul yang ingin Anda kelola:</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Kelola Skill -->
            <div class="bg-blue-600 hover:bg-blue-700 text-white p-6 rounded-lg shadow transition duration-300">
                <h3 class="text-xl font-semibold">🛠 Kelola Skill</h3>
                <p class="mt-2">Lihat dan kelola daftar keahlian yang tersedia.</p>
                <a href="{{ route('skills.index') }}" class="mt-4 inline-block bg-white text-blue-600 hover:text-white hover:bg-blue-700 font-semibold px-4 py-2 rounded shadow transition duration-300">
                    Lihat Skill
                </a>
            </div>

            <!-- Kelola Employees -->
            <div class="bg-green-600 hover:bg-green-700 text-white p-6 rounded-lg shadow transition duration-300">
                <h3 class="text-xl font-semibold">👥 Kelola Karyawan</h3>
                <p class="mt-2">Lihat dan kelola data karyawan serta skill mereka.</p>
                <a href="{{ route('employees.index') }}" class="mt-4 inline-block bg-white text-green-600 hover:text-white hover:bg-green-700 font-semibold px-4 py-2 rounded shadow transition duration-300">
                    Lihat Karyawan
                </a>
            </div>

            <!-- Kelola Companies -->
            <div class="bg-purple-600 hover:bg-purple-700 text-white p-6 rounded-lg shadow transition duration-300">
                <h3 class="text-xl font-semibold">🏢 Kelola Perusahaan</h3>
                <p class="mt-2">Lihat dan atur informasi perusahaan tempat karyawan bekerja.</p>
                <a href="{{ route('companies.index') }}" class="mt-4 inline-block bg-white text-purple-600 hover:text-white hover:bg-purple-700 font-semibold px-4 py-2 rounded shadow transition duration-300">
                    Lihat Perusahaan
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
