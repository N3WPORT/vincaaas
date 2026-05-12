<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Posyandu Vinca</title>

    
    <?php echo app('Illuminate\Foundation\Vite')([
        'resources/css/app.css',
        'resources/js/app.js'
    ]); ?>

</head>

<body class="bg-gray-100">

<div class="min-h-screen flex">

    
    <aside class="w-64 bg-white shadow-lg flex flex-col justify-between">

        <div>

            
            <div class="p-6 border-b">

                <h1 class="text-3xl font-bold text-blue-600">
                    Posyandu Vinca
                </h1>

            </div>

            
            <nav class="p-4 space-y-2">

                
                <a href="/dashboard"
                   class="block px-4 py-3 rounded-xl hover:bg-blue-100 transition">

                    Dashboard

                </a>

                
                <?php if(auth()->user()->role === 'admin'): ?>

                    <a href="/mothers"
                       class="block px-4 py-3 rounded-xl hover:bg-blue-100 transition">

                        Data Ibu

                    </a>

                <?php endif; ?>

                
                <?php if(

                    auth()->user()->role === 'admin' ||
                    auth()->user()->role === 'kader'

                ): ?>

                    
                    <a href="/children"
                       class="block px-4 py-3 rounded-xl hover:bg-blue-100 transition">

                        Data Anak

                    </a>

                    
                    <a href="/growth-records"
                       class="block px-4 py-3 rounded-xl hover:bg-blue-100 transition">

                        Monitoring Pertumbuhan

                    </a>

                    
                    <a href="/charts"
                       class="block px-4 py-3 rounded-xl hover:bg-blue-100 transition">

                        Grafik Pertumbuhan

                    </a>

                <?php endif; ?>

            </nav>

        </div>

        
        <div class="p-4 border-t bg-white">

            <div class="mb-3">

                <p class="font-semibold">
                    <?php echo e(Auth::user()->name); ?>

                </p>

                <p class="text-sm text-gray-500">
                    <?php echo e(Auth::user()->email); ?>

                </p>

                <p class="text-xs text-blue-500 mt-1 uppercase">
                    <?php echo e(Auth::user()->role); ?>

                </p>

            </div>

            
            <form method="POST"
                  action="<?php echo e(route('logout')); ?>">

                <?php echo csrf_field(); ?>

                <button type="submit"
                        class="w-full bg-red-500 hover:bg-red-600 text-white py-2 rounded-xl transition">

                    Logout

                </button>

            </form>

        </div>

    </aside>

    
    <main class="flex-1 p-8 overflow-y-auto">

        <?php echo $__env->yieldContent('content'); ?>

    </main>

</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html><?php /**PATH C:\xampp\htdocs\posyandu-vinca\resources\views/layouts/app.blade.php ENDPATH**/ ?>