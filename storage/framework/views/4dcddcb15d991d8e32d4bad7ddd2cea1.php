

<?php $__env->startSection('title', 'Roles y permisos - ' . $role->name); ?>

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
                                        <label class="control-label">Nombre del Rol:</label>
                                        <p><?php echo e($role->name); ?></p>
                                    </div>
                                    <!-- Mostrar solo los permisos asignados -->
                                    <div class="form-group">
                                        <label class="control-label">Listas de permisos:</label>
                                        <ul>
                                           <?php echo Form::model($role, ['route' => ['role.update', $role],'method'=>'put']); ?>

                                           <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permiso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           <div>
                                            <label> 
                                                <?php echo Form::checkbox('permisos[]', $permiso ->id, $role->hasPermissionTo($permiso->id) ? :false, ['class'=>'mr-1']); ?>

                                                <?php echo e($permiso->name); ?>

                                            </label>
                                           </div>


                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                           <?php echo Form::submit('Asignar Permisos', ['class' =>'btn btn-primary mt-3']); ?>

                                           <?php echo Form::close(); ?>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="card-footer">
							<div class="row">
								<div class="col-lg-2 col-xs-4">
									<a href="<?php echo e(route('role.index')); ?>" class="btn btn-danger btn-block btn-flat">Atras</a>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\drogueria4\resources\views/user/Roles/edit.blade.php ENDPATH**/ ?>