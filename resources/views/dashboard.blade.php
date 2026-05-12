@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <p class="text-sm uppercase tracking-[0.25em] text-slate-500">Dashboard Posyandu</p>
            <h1 class="mt-3 text-3xl font-semibold text-slate-900">Pantau kesehatan ibu dan balita secara terintegrasi.</h1>
        </div>
        <a href="{{ route('charts') }}" class="inline-flex items-center justify-center rounded-3xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white hover:bg-blue-700">Lihat Grafik</a>
    </div>

    <div class="grid gap-6 xl:grid-cols-3">
        <div class="rounded-3xl bg-white p-6 shadow">
            <p class="text-sm text-slate-500">Total Anak</p>
            <p class="mt-4 text-4xl font-semibold text-blue-600">{{ $totalChildren }}</p>
        </div>
        <div class="rounded-3xl bg-white p-6 shadow">
            <p class="text-sm text-slate-500">Total Ibu</p>
            <p class="mt-4 text-4xl font-semibold text-pink-600">{{ $totalMothers }}</p>
        </div>
        <div class="rounded-3xl bg-white p-6 shadow">
            <p class="text-sm text-slate-500">Total Pemeriksaan</p>
            <p class="mt-4 text-4xl font-semibold text-emerald-600">{{ $totalGrowthRecords }}</p>
        </div>
    </div>

    <div class="rounded-3xl bg-white p-8 shadow">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-slate-900">Grafik Pertumbuhan Anak</h2>
                <p class="mt-2 text-sm text-slate-500">Lihat data berat badan balita sepanjang waktu.</p>
            </div>
            <div class="rounded-3xl bg-slate-50 px-4 py-3 text-sm text-slate-600">Sumber: Data pencatatan posyandu</div>
        </div>

        <div class="mt-8 h-[420px]">
            <canvas id="dashboardChart"></canvas>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const dashboardCtx = document.getElementById('dashboardChart');
    if (!dashboardCtx) return;
    new Chart(dashboardCtx, {
        type: 'line',
        data: {
            labels: @json($labels),
            datasets: [
                {
                    label: 'Berat Badan (kg)',
                    data: @json($weights),
                    borderWidth: 3,
                    borderColor: '#2563eb',
                    backgroundColor: 'rgba(37, 99, 235, 0.15)',
                    fill: true,
                    tension: 0.3,
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: { grid: { display: false } },
                y: { beginAtZero: true }
            }
        }
    });
});
</script>

@endsection