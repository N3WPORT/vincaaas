

<?php $__env->startSection('content'); ?>

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

            labels: <?php echo json_encode($labels, 15, 512) ?>,

            datasets: [

                {
                    label: 'Berat Badan (kg)',

                    data: <?php echo json_encode($weights, 15, 512) ?>,

                    borderWidth: 3
                },

                {
                    label: 'Tinggi Badan (cm)',

                    data: <?php echo json_encode($heights, 15, 512) ?>,

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\posyandu-vinca\resources\views/charts/index.blade.php ENDPATH**/ ?>