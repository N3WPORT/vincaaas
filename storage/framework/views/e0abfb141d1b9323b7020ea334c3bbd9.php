

<?php $__env->startSection('content'); ?>


<?php if(session('success')): ?>

<div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl mb-6">

    <?php echo e(session('success')); ?>


</div>

<?php endif; ?>


<div class="flex justify-between items-center mb-6">

    <h1 class="text-3xl font-bold">
        Data Anak
    </h1>

    <a href="<?php echo e(route('children.create')); ?>"
       class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl">

        Tambah Anak

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
                    Nama Ibu
                </th>
                <th class="p-4 text-left">
                    Gender
                </th>

                <th class="p-4 text-left">
                    Tanggal Lahir
                </th>

                <th class="p-4 text-left">
                    Aksi
                </th>

            </tr>

        </thead>

        
        <tbody>

            <?php $__empty_1 = true; $__currentLoopData = $children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

            <tr class="border-t hover:bg-gray-50">

                
                <td class="p-4">
                    <?php echo e($child->name); ?>

                </td>

                <td class="p-4">

                    <a href="<?php echo e(route('mothers.show', $child->mother->id)); ?>"
                    class="text-blue-600 hover:underline">

                        <?php echo e($child->mother->name ?? '-'); ?>


                    </a>

                </td>

                
                <td class="p-4">

                    <?php if($child->gender == 'L'): ?>

                        Laki-laki

                    <?php else: ?>

                        Perempuan

                    <?php endif; ?>

                </td>

                
                <td class="p-4">
                    <?php echo e($child->birth_date); ?>

                </td>

                
                <td class="p-4">

                    <div class="flex gap-2">

                        
                        <a href="<?php echo e(route('children.edit', $child->id)); ?>"
                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-lg">

                            Edit

                        </a>

                        
                        <form action="<?php echo e(route('children.destroy', $child->id)); ?>"
                              method="POST">

                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <button type="submit"
                                    onclick="return confirm('Hapus data ini?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">

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

                    Belum ada data anak

                </td>

            </tr>

            <?php endif; ?>

        </tbody>

    </table>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\posyandu-vinca\resources\views/children/index.blade.php ENDPATH**/ ?>