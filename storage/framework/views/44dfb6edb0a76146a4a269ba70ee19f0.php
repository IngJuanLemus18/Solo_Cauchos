

<?php $__env->startSection('title','Crear Producto'); ?>

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
						<form method="POST" action="<?php echo e(route('medicament.store')); ?>" enctype="multipart/form-data">
							<?php echo csrf_field(); ?>
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Nombre <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="name" placeholder="nombre" autocomplete="off" value="<?php echo e(old('name')); ?>">
                                            <label class="control-label">Descripcion <strong style="color:red;">(*)</strong></label>
											<textarea type="text" class="form-control" name="batch" placeholder=" lote " autocomplete="off" value=""><?php echo e(old('batch')); ?></textarea>
                                            <label class="control-label">Cantidad <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="amount" placeholder=" Cantidad " autocomplete="off" value="<?php echo e(old('amount')); ?>">
											<label class="control-label">Valor compra <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="purchase" placeholder=" Valor compra " autocomplete="off" value="<?php echo e(old('purchase')); ?>">
                                            <label class="control-label">Valor Venta <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="sale" placeholder=" Valor Venta " autocomplete="off" value="<?php echo e(old('sale')); ?>">
                                            <label class="control-label">Fecha de ingreso <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="expiration_date" placeholder=" fecha expiracion " autocomplete="off" value="<?php echo e(old('expiration_date')); ?>"> 
                                            <div class="form-group">
                                            <label class="control-label">Img <strong style="color:red;">(*)</strong></label>
											<div class="row">
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Fotografía</label>
											<input type="file" class="form-control-file" name="image" id="image" >
										</div>
									</div>
								</div>
                  </div>
										</div>
									</div>
								</div>
								<input type="hidden" class="form-control" name="estado" value="1">
								<input type="hidden" class="form-control" name="registradopor" value="<?php echo e(Auth::user()->id); ?>">
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="<?php echo e(route('medicament.index')); ?>" class="btn btn-danger btn-block btn-flat">Atras</a>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\drogueria4\resources\views/medicaments\create.blade.php ENDPATH**/ ?>