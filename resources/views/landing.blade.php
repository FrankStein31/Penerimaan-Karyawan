<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pabrik Gula Mrican</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('https://static.vecteezy.com/system/resources/previews/000/602/514/original/buildings-silhouette-cityscape-background-modern-architecture-urban-city-landscape-vector.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, 0.85);
            z-index: -1;
        }
    </style>
</head>
<body class="font-['Poppins'] flex flex-col min-h-full relative">
    <header class="bg-white bg-opacity-100 shadow-sm w-full z-10">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center">
                <img src="{{ asset('img/1.png') }}" alt="Logo" class="h-10 mr-3">
                <div class="text-2xl font-bold text-gray-800">Pabrik Gula Mrican</div>
            </div>
            <div>
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800 mr-6 transition duration-300">Login</a>
                <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-full transition duration-300">Register</a>
            </div>
        </nav>
    </header>

    <main class="flex-grow container mx-auto px-6 py-16 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-5xl font-bold text-gray-800 mb-6 leading-tight">Mari Bergabung Bersama Kami</h1>
            <p class="text-xl text-gray-600 mb-12 leading-relaxed">Jelahi ratusan lowongan pekerjaan dengan segala informasi yang Anda butuhkan. Raih kesempatan Anda dan wujudkan karir impian!</p>
            
            <div class="flex justify-center mb-16">
                <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-4 px-8 rounded-full text-lg shadow-lg transition duration-300 transform hover:-translate-y-1">
                    Cari Lowongan
                </a>
            </div>

            <h2 class="text-4xl font-bold text-gray-800 mb-12 text-center">Tutorial Pengajuan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white bg-opacity-90 p-8 rounded-xl shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-2xl">
                    <div class="text-3xl font-bold text-blue-500 mb-4">01</div>
                    <h3 class="font-bold text-xl mb-4 text-gray-800">Daftarkan Diri Anda</h3>
                    <p class="text-gray-600 leading-relaxed">Buat akun untuk mengajukan lamaran pada lowongan yang dibuka.</p>
                </div>
                <div class="bg-white bg-opacity-90 p-8 rounded-xl shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-2xl">
                    <div class="text-3xl font-bold text-green-500 mb-4">02</div>
                    <h3 class="font-bold text-xl mb-4 text-gray-800">Cari Lowongan yang Sesuai</h3>
                    <p class="text-gray-600 leading-relaxed">Temukan posisi yang cocok dengan kualifikasi dan minat karir Anda.</p>
                </div>
                <div class="bg-white bg-opacity-90 p-8 rounded-xl shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-2xl">
                    <div class="text-3xl font-bold text-yellow-500 mb-4">03</div>
                    <h3 class="font-bold text-xl mb-4 text-gray-800">Download Surat Pernyataan</h3>
                    <p class="text-gray-600 leading-relaxed">Unduh dan isi surat pernyataan yang disediakan dengan informasi yang akurat.</p>
                </div>
                <div class="bg-white bg-opacity-90 p-8 rounded-xl shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-2xl">
                    <div class="text-3xl font-bold text-purple-500 mb-4">04</div>
                    <h3 class="font-bold text-xl mb-4 text-gray-800">Kirimkan Lamaran Anda</h3>
                    <p class="text-gray-600 leading-relaxed">Ajukan lamaran Anda beserta dokumen yang diperlukan melalui sistem kami.</p>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-gray-900 bg-opacity-90 text-gray-300 py-6 relative z-10">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2024 Pabrik Gula Mrican. All rights reserved.</p>
            <p>Email: info@pabrikgulamrican.com | Telepon: (021) 1234-5678</p>
        </div>
    </footer>
</body>
</html>