<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="antialiased">
    <div class="relative flex justify-center items-center min-h-screen bg-dots-darker bg-center bg-gray-100 ">
        <div class="bg-white p-6 rounded-lg">
            <div class="p-6 max-w-sm bg-white border border-gray-200 rounded-lg shadow  dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="<?php echo e(asset('images/logo.svg')); ?>" alt="" />
                </a>
                <div class="p-5 text-center">
                    <h3 class="uppercase text-center my-3 py-3">consultorio dra. isabel</h3>
                    <div class="flex md:flex-row flex-col">
                        <a href="<?php echo e(route('login')); ?>"
                            class="mx-4 p-3 rounded-lg transition-all delay-150 font-semibold text-gray-600 hover:text-white hover:bg-violet-600 hover:border-b-2  hover:border-b-indigo-950  "><?php echo e(__('Login')); ?></a>
                        <a href="<?php echo e(route('register')); ?>"
                            class="mx-4 p-3 rounded-lg transition-all delay-150 font-semibold text-gray-600 hover:text-white hover:bg-violet-600  hover:border-b-2   hover:border-b-indigo-950 "><?php echo e(__('Register')); ?></a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php /**PATH D:\servidor\consultorio\resources\views/welcome.blade.php ENDPATH**/ ?>