<nav class="bg-slate-900/90 backdrop-blur border-b border-white/10 relative z-50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">

            {{-- LEFT --}}
            <div class="flex items-center gap-10">
                <img class="h-8 w-8"
                     src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500">

                <div class="hidden md:flex gap-4">
                    <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                    <x-nav-link href="/kontak" :active="request()->is('kontak')">Contact</x-nav-link>
                    <x-nav-link href="/profil" :active="request()->is('profil')">Profile</x-nav-link>
                    <x-nav-link href="/student" :active="request()->is('student')">Student</x-nav-link>
                    <x-nav-link href="/guardian" :active="request()->is('guardian')">Guardians</x-nav-link>
                    <x-nav-link href="/classroom" :active="request()->is('classroom')">Classrooms</x-nav-link>
                    <x-nav-link href="/teacher" :active="request()->is('teacher')">Teachers</x-nav-link>
                    <x-nav-link href="/subject" :active="request()->is('subject')">Subjects</x-nav-link>
                </div>
            </div>

            {{-- RIGHT --}}
            <div class="flex items-center">

                {{-- GUEST --}}
                @guest
                    <a href="{{ route('login') }}"
                       class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-semibold">
                        Login
                    </a>
                @endguest

                {{-- AUTH --}}
                @auth
                <div class="relative ml-3"
                     x-data="{ open: false }"
                     @keydown.escape.window="open = false">

                    {{-- AVATAR --}}
                    <button
                        @click="open = !open"
                        class="flex items-center rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <img class="h-8 w-8 rounded-full"
                             src="https://i.pinimg.com/1200x/08/ff/55/08ff555123054a289f9d3304d517ba64.jpg">
                    </button>

                    {{-- DROPDOWN --}}
                    <div
                        x-cloak
                        x-show="open"
                        @click.outside="open = false"
                        x-transition.origin.top.right
                        class="absolute right-0 mt-2 w-48 rounded-md bg-slate-800 shadow-xl ring-1 ring-black/30 z-[9999]">

                        <div class="px-4 py-3 border-b border-white/10">
                            <p class="text-sm font-semibold text-white">
                                {{ Auth::user()->name }}
                            </p>
                            <p class="text-xs text-slate-400">
                                {{ Auth::user()->email }}
                            </p>
                        </div>

                        <a href="{{ route('admin.dashboard') }}"
                           class="block px-4 py-2 text-sm text-slate-300 hover:bg-white/5">
                            Dashboard
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-white/5">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
                @endauth

            </div>
        </div>
    </div>
</nav>
