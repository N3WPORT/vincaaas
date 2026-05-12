@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Grafik Pertumbuhan Anak
</h1>

<div class="bg-white rounded-2xl shadow p-8">

    <div class="relative w-full h-[500px]">

        <canvas id="growthChart"></canvas>

    </div>

</div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const ctx = document.getElementById('growthChart');

    new Chart(ctx, {

        type: 'line',

        data: {

            labels: @json($labels),

            datasets: [

                {
                    label: 'Berat Badan (kg)',

                    data: @json($weights),

                    borderWidth: 3
                },

                {
                    label: 'Tinggi Badan (cm)',

                    data: @json($heights),

                    borderWidth: 3
                }

            ]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false

        }

    });

});

</script>

@endsection