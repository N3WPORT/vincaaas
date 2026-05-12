

<?php $__env->startSection('content'); ?>

<h1 class="text-3xl font-bold mb-8">
    Dashboard Kader
</h1>

<div class="grid grid-cols-2 gap-6">

    <div class="bg-white p-6 rounded-2xl shadow">

        <p class="text-gray-500">
            Total Anak
        </p>

        <h2 class="text-4xl font-bold mt-2 text-blue-600">
            <?php echo e($children); ?>

        </h2>

    </div>

    <div class="bg-white p-6 rounded-2xl shadow">

        <p class="text-gray-500">
            Total Pemeriksaan
        </p>

        <h2 class="text-4xl font-bold mt-2 text-green-600">
            <?php echo e($growthRecords); ?>

        </h2>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\posyandu-vinca\resources\views/kader/dashboard.blade.php ENDPATH**/ ?>