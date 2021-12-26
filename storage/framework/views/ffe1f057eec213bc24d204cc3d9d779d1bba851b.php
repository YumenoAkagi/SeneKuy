<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SeneKuy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body class="h-100">
    <?php echo $__env->yieldContent('header'); ?>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/home" class="text-decoration-none d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark">
                <span class="fs-4">SeneKuy</span>
            </a>
    
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li>
                    <a href="/home" class="nav-link px- link-dark">Home</a>
                </li>
    
                <li class="nav-item-dropdown">
                    <a href="" class="dropdown-toggle nav-link link-dark" role="button" id="categoryDropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="categoryDropdownMenuLink">
                        <li><a href="" class="dropdown-item">Cat 1</a></li>
                        <li><a href="" class="dropdown-item">Cat 2</a></li>
                        <li><a href="" class="dropdown-item">Cat 3</a></li>
                    </ul>
                </li>
            </ul>
    
            <div class="col-md-3 col-lg-2 text-end">
                <a href="/login" class="text-decoration-none">
                    <button class="btn btn-outline-dark me-2">Login</button>
                </a>
                <a href="/register" class="text-decoration-none">
                    <button class="btn btn-warning">Register</button>
                </a>
            </div>
        </header>
    </div>
    

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->yieldContent('footer'); ?>
    <footer class="footer mt-auto py-2 text-center">
        SeneKuy © 2021
    </footer>
</body>
</html><?php /**PATH C:\Users\ExPLoSi0nZ\Documents\Binus\Project_WebProg_LEC\SeneKuy\resources\views/master.blade.php ENDPATH**/ ?>