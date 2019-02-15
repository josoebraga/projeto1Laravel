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

    
    <?php $__env->startSection('title', $produto->titulo); ?>
    <?php $__env->startSection('content'); ?>

        <body>
            <h1>Produtos - <?php echo e($produto->titulo); ?></h1>
            <ul>

                    <li><strong>SKU: </strong> <?php echo e($produto->sku); ?> </li>
                    <li><strong>Preço: </strong> <?php echo e($produto->preco); ?> </li>
                    <li><strong>Adicionado em: </strong> <?php echo e($produto->created_at); ?> </li>
            </ul>
                    <p><?php echo e($produto->descricao); ?></p>
                    <a href="javascript:history.go(-1)">Voltar</a>
        </body>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>