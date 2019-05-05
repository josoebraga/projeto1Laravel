<?php $__env->startSection('title', 'Editar um produto - ' . $produto->titulo); ?>
<?php $__env->startSection('content'); ?>

<?php

        #http://localhost/projeto1/server.php/produtos/1/edit

?>

    <h1>Adicionar um produto</h1>
    <h1 class="mb-3">Editar um produto - <?php echo e($produto->titulo); ?></h1>
    <?php if($message = Session::get('success')): ?>
           <div class="alert alert-success">
                <?php echo e($message); ?>

           </div>
    <?php endif; ?>

    <?php if(count($errors)>0): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
        <body>
            <h1>Produtos - <?php echo e($produto->titulo); ?></h1>
                <div class="row">
                    <?php if(file_exists("C:/wamp64/www/projeto1/public/img/produtos/".md5($produto->id).".jpg")): ?>
                            <div class="col-md-6">
                                <img alt="Imagem Produto" class="img-fluid img-thumbnail"
                                     src="<?php echo "http://localhost/projeto1/public/img/produtos/".md5($produto->id).".jpg"; ?>">
                                          <?php #echo "http://localhost/projeto1/public/img/produtos/".md5($produto->id).".jpg"; ?>
                            </div>
                    <?php endif; ?>
                    <div class="col-md-6">
            <ul>
                        <li><strong>SKU: </strong> <?php echo e($produto->sku); ?> </li>
                        <li><strong>Preço: </strong>R$ <?php echo e(number_format($produto->preco,2,',','.')); ?></li>
                        <li><strong>Adicionado em: </strong> <?php echo e(date("d/m/Y H:i", strtotime($produto->created_at))); ?> </li>
                        <li><strong>Descrição: </strong> <p><?php echo e($produto->descricao); ?></p>
            </ul>

                    </div>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $produto->mostrarComentarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comentario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card col-md-10">
                        <div class="card-header">
                            <?php echo e($comentario->usuario); ?>

                        </div>
                        <div class="card-body">
                            <?php echo e($comentario->comentario); ?>

                        </div>
                        <div class="card-footer">
                            <?php echo e(date("d/m/Y H:i", strtotime($comentario->updated_at))); ?>

                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                    <a href="javascript:history.go(-1)">Voltar</a>                    |
                    <a href="javascript:document.location.replace('http://localhost/projeto1/server.php/produtos/' + <?php echo $produto->id ?> + '/edit')">Editar</a>
        </body>

    <?php $__env->stopSection(); ?>
    <img src="../../../public/img/produtos/45c48cce2e2d7fbdea1afc51c7c6ad26.jpg" alt=""/>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>