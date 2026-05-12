

<?php $__env->startSection('content'); ?>

<h1 class="text-3xl font-bold mb-8">
    Tambah Anak
</h1>


<?php if($errors->any()): ?>

<div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl mb-6">

    <ul class="list-disc pl-5">

        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <li><?php echo e($error); ?></li>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </ul>

</div>

<?php endif; ?>

<div class="bg-white rounded-2xl shadow p-8">

    <form action="<?php echo e(route('children.store')); ?>"
          method="POST">

        <?php echo csrf_field(); ?>

        <div class="grid grid-cols-2 gap-6">

            
            <div>

                <label class="block mb-2 font-medium">
                    Pilih Ibu
                </label>

                <select name="mother_id"
                        class="w-full border rounded-xl px-4 py-3"
                        required>

                    <option value="">
                        Pilih Ibu
                    </option>

                    <?php $__currentLoopData = $mothers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mother): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <option value="<?php echo e($mother->id); ?>"
                        <?php echo e(old('mother_id') == $mother->id ? 'selected' : ''); ?>>

                        <?php echo e($mother->name); ?>


                    </option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>

            </div>

            
            <div>

                <label class="block mb-2 font-medium">
                    Nama Anak
                </label>

                <input type="text"
                       name="name"
                       value="<?php echo e(old('name')); ?>"
                       class="w-full border rounded-xl px-4 py-3"
                       required>

            </div>

            
            <div>

                <label class="block mb-2 font-medium">
                    Gender
                </label>

                <select name="gender"
                        class="w-full border rounded-xl px-4 py-3"
                        required>

                    <option value="">
                        Pilih Gender
                    </option>

                    <option value="L"
                        <?php echo e(old('gender') == 'L' ? 'selected' : ''); ?>>

                        Laki-laki

                    </option>

                    <option value="P"
                        <?php echo e(old('gender') == 'P' ? 'selected' : ''); ?>>

                        Perempuan

                    </option>

                </select>

            </div>

            
            <div>

                <label class="block mb-2 font-medium">
                    Tanggal Lahir
                </label>

                <input type="date"
                       name="birth_date"
                       value="<?php echo e(old('birth_date')); ?>"
                       class="w-full border rounded-xl px-4 py-3"
                       required>

            </div>

            
            <div>

                <label class="block mb-2 font-medium">
                    Berat Lahir (kg)
                </label>

                <input type="number"
                       step="0.01"
                       name="birth_weight"
                       value="<?php echo e(old('birth_weight')); ?>"
                       class="w-full border rounded-xl px-4 py-3">

            </div>

        </div>

        
        <div class="mt-8">

            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

                Simpan Data

            </button>

        </div>

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\posyandu-vinca\resources\views/children/create.blade.php ENDPATH**/ ?>