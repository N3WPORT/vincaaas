

<?php $__env->startSection('content'); ?>

<h1 class="text-3xl font-bold mb-8">
    Tambah Ibu
</h1>

<div class="bg-white rounded-2xl shadow p-8">

    <form action="<?php echo e(route('mothers.store')); ?>"
          method="POST">

        <?php echo csrf_field(); ?>

        <div class="grid grid-cols-2 gap-6">

            
            <div>

                <label class="block mb-2 font-medium">
                    Nama Ibu
                </label>

                <input type="text"
                       name="name"
                       class="w-full border rounded-xl px-4 py-3"
                       required>

            </div>

            
            <div>

                <label class="block mb-2 font-medium">
                    NIK
                </label>

                <input type="text"
                       name="nik"
                       class="w-full border rounded-xl px-4 py-3"
                       required>

            </div>

            
            <div>

                <label class="block mb-2 font-medium">
                    Telepon
                </label>

                <input type="text"
                       name="phone"
                       class="w-full border rounded-xl px-4 py-3">

            </div>

        </div>

        <div class="mt-8">

            <button type="submit"
                    class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-3 rounded-xl">

                Simpan Data

            </button>

        </div>

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\posyandu-vinca\resources\views/mothers/create.blade.php ENDPATH**/ ?>