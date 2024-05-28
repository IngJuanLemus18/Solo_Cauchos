

<?php $__env->startSection('title','Editar Clientes'); ?>

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
						<form method="POST" action="<?php echo e(route('customer.update',$customer)); ?>">
                            <?php echo csrf_field(); ?>
							<?php echo method_field('PUT'); ?>
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Primer Nombre <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="firstname" placeholder=" Nombre del cliente " autocomplete="off" value="<?php echo e($customer->firstname); ?>">

                                            <label class="control-label">Segundo Nombre <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="secondname" placeholder=" Segundo Nombre del cliente " autocomplete="off" value="<?php echo e($customer->secondname); ?>">

                                            <label class="control-label">Primer Apellido <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="lastname" placeholder=" Apellido del cliente " autocomplete="off" value="<?php echo e($customer->lastname); ?>">

                                            <label class="control-label">Segundo Apellido <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="secondlastname" placeholder=" Segundo Apellido del cliente " autocomplete="off" value="<?php echo e($customer->secondlastname); ?>">

                                           
                                            <label class="control-label">Telefono <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="cell_number" placeholder=" Edad " autocomplete="off" value="<?php echo e($customer->cell_number); ?>">
											<label class="control-label">Direccion <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="street_address" placeholder=" email " autocomplete="off" value="<?php echo e($customer->street_address); ?>">

                                            
									</div>
								</div>
								<input type="hidden" class="form-control" name="registradopor" value="<?php echo e(Auth::user()->id); ?>">
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="<?php echo e(route('customer.index')); ?>" class="btn btn-danger btn-block btn-flat">Atras</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\drogueria4\resources\views/customers/edit.blade.php ENDPATH**/ ?>