<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perusahaan Kimbab</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#D81B60',  // Pink utama
                        secondary: '#F06292', // Pink lebih muda
                    }
                }
            }
        }
    </script>
</head>
<body class="flex h-screen bg-gray-50 font-sans">

    {{-- NAV (atas) --}}
    <nav class="fixed top-0 left-0 right-0 bg-white border-b shadow z-10">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-primary">Perusahaan Kimbab</h1>
            <a href="/" class="text-primary hover:text-secondary">Home</a>
        </div>
    </nav>

    <div class="flex flex-1 pt-16">
        {{-- SIDEBAR --}}
        <aside class="w-64 bg-white border-r shadow-lg hidden md:block">
            <div class="px-6 py-4">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Menu</h2>
                <ul>
                    <li class="mb-2">
                        <a href="{{ route('companies.index') }}" class="flex items-center px-3 py-2 rounded hover:bg-primary hover:text-white transition">
                            🏢 <span class="ml-2">Perusahaan</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('employees.index') }}" class="flex items-center px-3 py-2 rounded hover:bg-primary hover:text-white transition">
                            👥 <span class="ml-2">Karyawan</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('skills.index') }}" class="flex items-center px-3 py-2 rounded hover:bg-primary hover:text-white transition">
                            💼 <span class="ml-2">Keahlian</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        {{-- CONTENT AREA --}}
        <main class="flex-1 overflow-y-auto p-6 bg-pink-50">
            @yield('content')
        </main>
    </div>

    {{-- Mobile Sidebar Toggle --}}
    <script>
        // Anda bisa menambahkan tombol dan skrip toggle untuk mobile jika perlu
    </script>
</body>
</html>
