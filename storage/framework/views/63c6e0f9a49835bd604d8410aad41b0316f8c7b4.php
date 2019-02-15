<?php
/**
 * Created by PhpStorm.
 * User: Josoé
 * Date: 09/02/2019
 * Time: 10:52
 */
        #{{}} equivale ao echo no php
        #http://localhost/projeto1/server.php/produtos/
?>


    
    <?php $__env->startSection('title', 'Lista de produtos'); ?>
    <?php $__env->startSection('content'); ?>

        <body>
            <h1>Produtos</h1>
            <ul>
                <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(URL::to('produtos')); ?>/<?php echo e($produto->id); ?>"><?php echo e($produto->titulo); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </body>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>