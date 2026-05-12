

<?php $__env->startSection('content'); ?>


<?php if(session('success')): ?>

<div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl mb-6">

    <?php echo e(session('success')); ?>


</div>

<?php endif; ?>


<div class="flex justify-between items-center mb-6">

    <h1 class="text-3xl font-bold text-black">
        Monitoring Pertumbuhan
    </h1>

    
    <a href="<?php echo e(route('growth-records.create')); ?>"
       class="inline-block bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 shadow-lg transition duration-200">

        <span class="text-white font-semibold">
            Tambah Data
        </span>

    </a>

</div>


<div class="bg-white rounded-2xl shadow overflow-hidden">

    <table class="w-full">

        
        <thead class="bg-gray-100">

            <tr>

                <th class="p-4 text-left">
                    Nama Anak
                </th>

                <th class="p-4 text-left">
                    Berat
                </th>

                <th class="p-4 text-left">
                    Tinggi
                </th>

                <th class="p-4 text-left">
                    Tanggal
                </th>

                <th class="p-4 text-left">
                    Aksi
                </th>

            </tr>

        </thead>

        
        <tbody>

            <?php $__empty_1 = true; $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

            <tr class="border-t hover:bg-gray-50">

                
                <td class="p-4">
                    <?php echo e($record->child->name); ?>

                </td>

                
                <td class="p-4">
                    <?php echo e($record->weight); ?> kg
                </td>

                
                <td class="p-4">
                    <?php echo e($record->height); ?> cm
                </td>

                
                <td class="p-4">
                    <?php echo e($record->measurement_date); ?>

                </td>

                
                <td class="p-4">

                    <div class="flex gap-2">

                        
                        <a href="<?php echo e(route('growth-records.edit', $record->id)); ?>"
                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-lg shadow">

                            Edit

                        </a>

                        
                        <form action="<?php echo e(route('growth-records.destroy', $record->id)); ?>"
                              method="POST">

                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <button type="submit"
                                    onclick="return confirm('Hapus data pertumbuhan?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow">

                                Delete

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <tr>

                <td colspan="5"
                    class="p-6 text-center text-gray-500">

                    Belum ada data pertumbuhan

                </td>

            </tr>

            <?php endif; ?>

        </tbody>

    </table>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\posyandu-vinca\resources\views/growth-records/index.blade.php ENDPATH**/ ?>