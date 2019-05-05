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
    <form method="POST" enctype="multipart/form-data" action="<?php echo e(action('ProdutosController@update', $id)); ?>">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="_method" value="PATCH">
        <div class="form-group mb-3">
            <label for="sku">SKU</label>
            <input type="text" class="form-control" id="sku" name="sku" value="<?php echo e($produto->sku); ?>" placeholder="Digite o Código do Produto..." required>
        </div>
        <div class="form-group mb-3">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo e($produto->titulo); ?>" placeholder="Digite o Nome do Produto..." required>
        </div>
        <div class="form-group mb-3">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Digite uma breve descrição do Produto..." required><?php echo e($produto->descricao); ?></textarea>
        </div>
        <label for="preco">Preço</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">R$</span>
            </div>
            <input type="number" step=".01" class="form-control" id="preco" name="preco" value="<?php echo e($produto->preco); ?>" placeholder="0,00" required>
        </div>
        <div class="input-group m-3">
            <label for="imgproduto">Imagem</label>
            <input type="file" class="form-control-file" id="imgproduto"  name="imgproduto"> 
        </div>
        <button type="submit" class="btn btn-primary">Editar Produto</button>
    </form>
    
                    <a href="javascript:history.go(-1)">Voltar</a>
                    |
                    <a href="javascript:document.location.replace('http://localhost/projeto1/server.php/produtos/' + <?php echo $produto->id ?>)">Visualizar</a>
    
    <?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>