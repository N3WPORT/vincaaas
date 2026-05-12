

<?php $__env->startSection('content'); ?>


<?php if(session('success')): ?>

<div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl mb-6">

    <?php echo e(session('success')); ?>


</div>

<?php endif; ?>


<div class="flex justify-between items-center mb-6">

    <h1 class="text-3xl font-bold">
        Data Ibu
    </h1>

    <a href="<?php echo e(route('mothers.create')); ?>"
       class="bg-pink-600 hover:bg-pink-700 text-white px-5 py-3 rounded-xl">

        Tambah Ibu

    </a>

</div>


<div class="bg-white rounded-2xl shadow overflow-hidden">

    <table class="w-full">

        <thead class="bg-gray-100">

            <tr>

                <th class="p-4 text-left">
                    Nama
                </th>

                <th class="p-4 text-left">
                    NIK
                </th>

                <th class="p-4 text-left">
                    Telepon
                </th>

                <th class="p-4 text-left">
                    Aksi
                </th>

            </tr>

        </thead>

        <tbody>

            <?php $__empty_1 = true; $__currentLoopData = $mothers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mother): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

            <tr class="border-t hover:bg-gray-50">

                <td class="p-4">
                    <?php echo e($mother->name); ?>

                </td>

                <td class="p-4">
                    <?php echo e($mother->nik); ?>

                </td>

                <td class="p-4">
                    <?php echo e($mother->phone); ?>

                </td>

                <td class="p-4">

                    <div class="flex gap-2">

                        
                        <a href="<?php echo e(route('mothers.edit', $mother->id)); ?>"
                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-lg">

                            Edit

                        </a>

                        
                        <form action="<?php echo e(route('mothers.destroy', $mother->id)); ?>"
                              method="POST">

                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <button type="submit"
                                    onclick="return confirm('Hapus data ibu?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">

                                Delete

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <tr>

                <td colspan="4"
                    class="p-6 text-center text-gray-500">

                    Belum ada data ibu

                </td>

            </tr>

            <?php endif; ?>

        </tbody>

    </table>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\posyandu-vinca\resources\views/mothers/index.blade.php ENDPATH**/ ?>