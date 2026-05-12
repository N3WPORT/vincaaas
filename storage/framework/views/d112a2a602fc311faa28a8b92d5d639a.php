<?php $__env->startSection('content'); ?>


<h1 class="text-3xl font-bold mb-8">
    Dashboard Posyandu
</h1>


<div class="grid grid-cols-3 gap-6">

    
    <div class="bg-white rounded-2xl p-6 shadow">

        <p class="text-gray-500">
            Total Anak
        </p>

        <h2 class="text-4xl font-bold mt-2 text-blue-600">
            <?php echo e($totalChildren); ?>

        </h2>

    </div>

    
    <div class="bg-white rounded-2xl p-6 shadow">

        <p class="text-gray-500">
            Total Ibu
        </p>

        <h2 class="text-4xl font-bold mt-2 text-pink-600">
            <?php echo e($totalMothers); ?>

        </h2>

    </div>

    
    <div class="bg-white rounded-2xl p-6 shadow">

        <p class="text-gray-500">
            Total Pemeriksaan
        </p>

        <h2 class="text-4xl font-bold mt-2 text-green-600">
            <?php echo e($totalGrowthRecords); ?>

        </h2>

    </div>

</div>


<div class="bg-white rounded-2xl shadow p-8 mt-8">

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold">
            Grafik Pertumbuhan
        </h2>

        <a href="/charts"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl shadow">

            Lihat Detail

        </a>

    </div>

    <div style="height:400px;">

        <canvas id="dashboardChart"></canvas>

    </div>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const dashboardCtx = document.getElementById('dashboardChart');

    if (!dashboardCtx) return;

    new Chart(dashboardCtx, {

        type: 'line',

        data: {

            labels: <?php echo json_encode($labels, 15, 512) ?>,

            datasets: [

                {
                    label: 'Berat Badan (kg)',

                    data: <?php echo json_encode($weights, 15, 512) ?>,

                    borderWidth: 3,

                    tension: 0.3
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\posyandu-vinca\resources\views/dashboard.blade.php ENDPATH**/ ?>