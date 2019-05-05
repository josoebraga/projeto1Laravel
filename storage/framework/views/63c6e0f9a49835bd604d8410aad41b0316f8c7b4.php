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
    <?php if($message = Session::get('success')): ?>
           <div class="alert alert-success">
                <?php echo e($message); ?>

           </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12">
            <form class="text-center" method="POST" action="<?php echo e(url('produtos/busca')); ?>">
                <?php echo csrf_field(); ?>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="busca" name="busca" 
                           placeholder="Procurar produto no site..." value="<?php echo e($buscar); ?>">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form class="text-center" method="POST" action="<?php echo e(url('produtos/ordem')); ?>">
                <?php echo csrf_field(); ?>
                <div class="input-group mb-3">
                    <select id="ordem" name="ordem" class="form-control">
                        <option>Escolha a ordem</option>
                        <option value="1" <?php if($ordem == 1): ?> selected <?php endif; ?> >Título (A-Z)</option>
                        <option value="2" <?php if($ordem == 2): ?> selected <?php endif; ?> >Título (Z-A)</option>
                        <option value="3" <?php if($ordem == 3): ?> selected <?php endif; ?> >Valor (Crescente)</option>
                        <option value="4" <?php if($ordem == 4): ?> selected <?php endif; ?> >Valor (Decrescente)</option>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary">Ordenar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3">
                    <?php if(file_exists("C:/wamp64/www/projeto1/public/img/produtos/".md5($produto->id).".jpg")): ?>
            <img alt="Imagem Produto" class="img-fluid img-thumbnail"
                 src="<?php echo e(url('http://localhost/projeto1/public/img/produtos/'.md5($produto->id).'.jpg')); ?>">
                    <?php endif; ?>

            <h4 class="text-center"><a href="<?php echo e(URL::to('produtos')); ?>/<?php echo e($produto->id); ?>"><?php echo e($produto->titulo); ?></a>
                <?php if($produto->preco == $maiscaro): ?>
                <span class="badge badge-danger">Maior preço</span>
                <?php endif; ?>
                <?php if($produto->preco == $maisbarato): ?>
                <span class="badge badge-success">Menor preço</span>
                <?php endif; ?>
            </h4>
            <p class="text-center">R$ <?php echo e(number_format($produto->preco,2,',','.')); ?></p>
            
            <?php if(Auth::check()): ?>
            <div class="mb-3">
            <form class="text-center" method="POST" action="<?php echo e(action('ProdutosController@destroy', $produto->id)); ?>">
                <?php echo csrf_field(); ?>                
                <input type="hidden" name="_method" value="DELETE">
                <a href="<?php echo e(URL::to('produtos/'.$produto->id.'edit')); ?>" class="btn btn-primary">Editar</a>
                <button class="btn btn-danger">Excluir</button>
            </form>
            </div>
            <?php endif; ?>
    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<button type="submit" class="btn btn-primary" onclick="javascript:document.location.replace('http://localhost/projeto1/server.php/produtos/create')">Cadastrar</button>

</body>
<br><br>
<div>
    <p><strong>O valor médio dos produtos é: </strong>R$ <?php echo e(number_format($mediavalor,2,',','.')); ?></p>
    <p><strong>O valor total dos produtos é: </strong>R$ <?php echo e(number_format($somavalor,2,',','.')); ?></p>
    <p><strong>A quantidade de produtos é: </strong><?php echo e($contagem); ?></p>
    <p><strong>A quantidade de produtos com valor maior que R$ 10,00 é: </strong><?php echo e($maiorDezP); ?></p>
</div>    
    <?php echo e($produtos->links()); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>