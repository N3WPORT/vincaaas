<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posyandu Vinca</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="min-h-screen bg-slate-100 text-slate-900">
    <div class="flex min-h-screen">
        <aside class="hidden w-72 shrink-0 flex-col border-r border-slate-200 bg-white px-5 py-6 xl:flex">
            <div class="flex flex-col gap-6">
                <div>
                    <a href="/dashboard" class="inline-flex items-center gap-3">
                        <div class="flex h-12 w-12 items-center justify-center rounded-3xl bg-blue-600 text-white text-xl font-bold">V</div>
                        <div>
                            <p class="text-sm uppercase tracking-[0.3em] text-slate-500">Posyandu</p>
                            <h1 class="text-2xl font-semibold text-slate-900">Vinca</h1>
                        </div>
                    </a>
                </div>

                <nav class="space-y-1">
                    @php
                        $dashboardActive = request()->routeIs('dashboard') || request()->routeIs('admin.dashboard') || request()->routeIs('kader.dashboard') || request()->routeIs('ibu.dashboard');
                    @endphp
                    <a href="/dashboard" class="flex items-center gap-3 rounded-3xl px-4 py-3 text-sm font-medium transition {{ $dashboardActive ? 'bg-slate-100 text-slate-900' : 'text-slate-600 hover:bg-slate-50' }}">
                        Dashboard
                    </a>

                    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'kader')
                        <a href="{{ route('children.index') }}" class="flex items-center gap-3 rounded-3xl px-4 py-3 text-sm font-medium transition {{ request()->routeIs('children.*') ? 'bg-slate-100 text-slate-900' : 'text-slate-600 hover:bg-slate-50' }}">
                            Data Anak
                        </a>
                        <a href="{{ route('growth-records.index') }}" class="flex items-center gap-3 rounded-3xl px-4 py-3 text-sm font-medium transition {{ request()->routeIs('growth-records.*') ? 'bg-slate-100 text-slate-900' : 'text-slate-600 hover:bg-slate-50' }}">
                            Input KMS
                        </a>
                        <a href="{{ route('calendar') }}" class="flex items-center gap-3 rounded-3xl px-4 py-3 text-sm font-medium transition {{ request()->routeIs('calendar') ? 'bg-slate-100 text-slate-900' : 'text-slate-600 hover:bg-slate-50' }}">
                            Kalender
                        </a>
                        <a href="{{ route('laporan') }}" class="flex items-center gap-3 rounded-3xl px-4 py-3 text-sm font-medium transition {{ request()->routeIs('laporan') ? 'bg-slate-100 text-slate-900' : 'text-slate-600 hover:bg-slate-50' }}">
                            Laporan
                        </a>
                    @endif

                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('mothers.index') }}" class="flex items-center gap-3 rounded-3xl px-4 py-3 text-sm font-medium transition {{ request()->routeIs('mothers.*') ? 'bg-slate-100 text-slate-900' : 'text-slate-600 hover:bg-slate-50' }}">
                            Data Ibu
                        </a>
                    @endif

                    @if(auth()->user()->role === 'ibu')
                        <a href="{{ route('ibu.dashboard') }}" class="flex items-center gap-3 rounded-3xl px-4 py-3 text-sm font-medium transition {{ request()->routeIs('ibu.dashboard') ? 'bg-slate-100 text-slate-900' : 'text-slate-600 hover:bg-slate-50' }}">
                            Portal Ibu
                        </a>
                    @endif
                </nav>
            </div>

            <div class="mt-auto rounded-3xl border border-slate-200 bg-slate-50 p-5">
                <p class="text-xs uppercase tracking-[0.25em] text-slate-500">Akun</p>
                <p class="mt-3 font-semibold text-slate-900">{{ Auth::user()->name }}</p>
                <p class="mt-1 text-sm text-slate-500">{{ Auth::user()->role }}</p>
                <form method="POST" action="{{ route('logout') }}" class="mt-5">
                    @csrf
                    <button type="submit" class="w-full rounded-3xl bg-rose-500 px-4 py-2 text-sm font-semibold text-white hover:bg-rose-600">Keluar</button>
                </form>
            </div>
        </aside>

        <div class="flex flex-1 flex-col">
            <header class="border-b border-slate-200 bg-white px-6 py-4 shadow-sm">
                <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <p class="text-sm text-slate-500">Selamat datang kembali,</p>
                        <h1 class="text-2xl font-semibold text-slate-900">{{ Auth::user()->name }}</h1>
                    </div>
                    <div class="flex items-center gap-3">
                        <button class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-slate-100 text-slate-700 hover:bg-slate-200">🔔</button>
                        <button class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-slate-100 text-slate-700 hover:bg-slate-200">⚙️</button>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
