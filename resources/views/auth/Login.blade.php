<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 flex items-center justify-center">

    <!-- Card -->
    <div class="w-full max-w-md bg-slate-800 border border-slate-700 rounded-xl shadow-2xl p-8">

        <!-- Header -->
        <div class="text-center mb-8">
            <div class="flex justify-center mb-3">
                <div class="w-12 h-12 bg-indigo-600 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 11c1.657 0 3-1.567 3-3.5S13.657 4 12 4s-3 1.567-3 3.5S10.343 11 12 11z"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 20c0-3.866-3.582-7-7-7s-7 3.134-7 7"/>
                    </svg>
                </div>
            </div>

            <h2 class="text-2xl font-bold text-white">Admin Login</h2>
            <p class="text-sm text-slate-400 mt-1">Masuk ke dashboard administrator</p>
        </div>

        <!-- Error -->
        @if ($errors->any())
       <div class="mb-4 text-sm text-red-400 bg-red-900/30 border border-red-800 rounded px-3 py-2">
        {{ $errors->first() }}
       </div>
       @endif


        <!-- Form -->
        <form method="POST" action="{{ route('login.process') }}" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-1">
                    Email
                </label>
                <input
                    type="email"
                    name="email"
                    required
                    class="w-full bg-slate-900 border border-slate-700 text-white rounded-lg px-3 py-2
                           focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="admin@email.com"
                >
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-1">
                    Password
                </label>
                <input
                    type="password"
                    name="password"
                    required
                    class="w-full bg-slate-900 border border-slate-700 text-white rounded-lg px-3 py-2
                           focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="••••••••"
                >
            </div>

            <button
                type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2.5 rounded-lg
                       transition duration-200 shadow-lg shadow-indigo-600/20">
                Login
            </button>
        </form>

        <!-- Footer -->
        <p class="text-xs text-slate-500 text-center mt-6">
            © {{ date('Y') }} Sistem Akademik
        </p>

    </div>

</body>
</html>
