

<?php $__env->startSection('title', 'Usuarios y Roles - ' . $user->name); ?>

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content-header">
		<div class="container-fluid">
		</div>
    </section>
	<?php echo $__env->make('layouts.partial.msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header bg-secondary">
							<h3><?php echo $__env->yieldContent('title'); ?></h3>
						</div>
						<div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <!-- Mostrar el nombre del rol -->
                                    <div class="form-group">
                                        <label class="control-label">Nombre del usuario:</label>
                                        <p><?php echo e($user->name); ?></p>
                                    </div>
                                    <!-- Mostrar solo los permisos asignados -->
                                    <div class="form-group">
                                        <label class="control-label">Listas de roles:</label>
                                        <ul>
                                           <?php echo Form::model($user, ['route' => ['usuario.update', $user],'method'=>'put']); ?>

                                           <?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           <div>
                                            <label> 
                                                <?php echo Form::checkbox('roles[]', $role ->id, $user->hasAnyRole($role->id) ? :false, ['class'=>'mr-1']); ?>

                                                <?php echo e($role->name); ?>

                                            </label>
                                           </div>


                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                           <?php echo Form::submit('Asignar Roles', ['class' =>'btn btn-primary mt-3']); ?>

                                           <?php echo Form::close(); ?>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="card-footer">
							<div class="row">
								<div class="col-lg-2 col-xs-4">
									<a href="<?php echo e(route('usuario.index')); ?>" class="btn btn-danger btn-block btn-flat">Atras</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\drogueria4\resources\views/user/listUser/edit.blade.php ENDPATH**/ ?>