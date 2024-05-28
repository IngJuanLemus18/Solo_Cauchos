

<?php $__env->startSection('title','Login'); ?>

<?php $__env->startSection('content'); ?>

<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-danger border-warning mb-3">
        <div class="card-header text-center text-light border-success bg-dark">
            <!-- Aquí agregamos la imagen -->
            <img src="<?php echo e(asset('/img/logo.jpg')); ?>" alt="Imagen de inicio de sesión" class="img-fluid mx-auto d-block rounded" style="max-width: 200px;">
            <h1>Repuestos <span>Solo Cauchos</span></h1>
        </div>
        <div class="card-body bg-warning">
            <p class="login-box-msg text-bold text-dark">Iniciar sesión</p>

            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>

                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> border border-warning" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                    <div class="input-group-append border border-warning">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> border border-warning" name="password" required autocomplete="current-password">
                    <div class="input-group-append border border-warning">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-warning border-warning btn-block">Ingresar</button>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-12">
                        <p class="mb-1">
                            <?php if(Route::has('password.request')): ?>
                                <a class="btn btn-link text-light" href="<?php echo e(route('password.request')); ?>">
                                    <?php echo e(__('¿Olvidaste tu contraseña?')); ?>

                                </a>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            </form>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.applogin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\drogueria4\resources\views/auth/login.blade.php ENDPATH**/ ?>