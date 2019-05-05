<?php $__env->startSection('title', 'Contato'); ?>
<?php $__env->startSection('content'); ?>

    <h1 class="mb-3">Contato</h1>
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
    <form method="POST" action="<?php echo e(url('contato/enviar')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group mb-3">
            <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o seu nome..." required>
        </div>
        <div class="form-group mb-3">
            <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail..." required>
        </div>
        <div class="form-group mb-3">
            <label for="msg">Assunto</label>
                <input type="text" class="form-control" id="msg" name="msg" placeholder="Digite o msg..." required>
        </div>
        <div class="form-group mb-3">
            <label for="descricao">Mensagem</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="6" placeholder="Digite sua mensagem..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar Mensagem</button>
    </form>
    <?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>