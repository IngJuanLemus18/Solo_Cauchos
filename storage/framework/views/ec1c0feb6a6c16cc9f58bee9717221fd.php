

<?php $__env->startSection('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Articulos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Articulos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <?php echo $__env->make('layouts.partial.msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabla de Articulos</h3>
               
               <?php if (\Illuminate\Support\Facades\Blade::check('role', 'Administrador')): ?>
								<a href="<?php echo e(route('medicament.create')); ?>" class="btn btn-primary float-right" title="Nuevo"><i class="fas fa-plus nav-icon"></i></a>
                                
                                <?php endif; ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="customers-table" class="table table-bordered table-hover">

                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    <th>valor compra</th>
                    <th>valor venta</th>
                    <th>Fecha de ingreso</th>
                    <th>estado</th>
                    <th>Imagen</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php $__currentLoopData = $medicament; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medicament): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($medicament->id); ?></td>
                  <td><?php echo e($medicament->name); ?></td>
                  <td><?php echo e($medicament->batch); ?></td>
                  <td><?php echo e($medicament->amount); ?></td>
                  <td><?php echo e($medicament->purchase); ?></td>
                  <td><?php echo e($medicament->sale); ?></td>
                  <td><?php echo e($medicament->expiration_date); ?></td>
                  <td>
                   
                       <input data-id="<?php echo e($medicament->id); ?>" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" 
                       data-toggle="toggle" data-on="Activo" data-off="Inactivo" <?php echo e($medicament->status ? 'checked' : ''); ?>>
                  
                   </td>

                  <td> <?php if($medicament->image!=null): ?>
                    <p><img class="img-responsive img-thumbnail" src="<?php echo e(asset('uploads/medicaments/'.$medicament->image)); ?>" style="height: 70px; width: 70px; align-items: center;" alt=""></p>
                  <?php elseif($medicament->image==null): ?>
                  <?php endif; ?></td>

                  <td>
                  
                    <a class="btn btn-info btn-sm" href="<?php echo e(route('medicament.edit',$medicament->id)); ?>"  title="Edit"><i class="fas fa-pencil-alt"></i></a>
                   
                  
                  <?php if (\Illuminate\Support\Facades\Blade::check('role', 'Administrador')): ?>
                    <form class="d-inline delete-form" action="<?php echo e(route('medicament.destroy',$medicament)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class=" btn btn-danger btn-sm" title="Delete">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                    <?php endif; ?>
                    
                    </form>
                  </td>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
            
            <?php $__env->stopSection(); ?>

            <?php $__env->startPush('scripts'); ?>
            <script>
                $(document).ready(function(){
                    $("customers-table").DataTable()
                });
                $(function() {
                  $('.toggle-class').change(function() {
                    var status = $(this).prop('checked') == true ? 1 : 0;
                    var medicament_id = $(this).data('id');
                    $.ajax({
                      type: "GET",
                      dataType: "json",
                      url: 'cambioestadomedicament',
                      data: {'status': status, 'medicament_id': medicament_id},
                      success: function(data){
                        console.log(data.success)
                      }
                    });
                  })
                  })
              </script>
              <script>
              $('.delete-form').submit(function(e){
                e.preventDefault();
                Swal.fire({
                  title: 'Estas seguro?',
                  text: "Este registro se eliminara definitivamente",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Aceptar',
                  cancelButtonText: 'Cancelar'
                }).then((result) => {
                  if (result.isConfirmed) {
                    this.submit();
                  }
                })
              });
              </script>
              <?php if(session('eliminar') == 'ok'): ?>
                <script>
                  Swal.fire(
                    'Eliminado',
                    'El registro ha sido eliminado exitosamente',
                    'success'
                  )
                </script>
              <?php endif; ?>
              <script type="text/javascript">
                $(function () {
                    $("#customers-table").DataTable({
                        "responsive": true, 
                        "lengthChange": true, 
                        "autoWidth": false,
                        "buttons": [
                            {
                                extend: 'excel',
                                text: 'Exportar a Excel',
                                title: 'DROGUERIA SIMON BOLIVAR', // Título personalizado para Excel
                                customize: function (xlsx) {
                                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                                    $('row c[r^="A"]', sheet).attr('s', '25');
                                }
                            },
                            {
                                extend: 'pdf',
                                text: 'Exportar a PDF',
                                title: 'DROGUERIA SIMON BOLIVAR - PDF', // Título personalizado para PDF
                                customize: function (doc) {
                                    doc.styles.title = {
                                        color: '#4c8aa0',
                                        fontSize: '30',
                                        bold: true,
                                        alignment: 'center'
                                    }
                                    doc.content[1].text = 'DROGUERIA SIMON BOLIVAR - PDF'; // Título personalizado para PDF
                                }
                            },
                            "print", 
                            "colvis"
                        ],
                        "language": {
                            "sLengthMenu": "Mostrar _MENU_ entradas",
                            "sEmptyTable": "No hay datos disponibles en la tabla",
                            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                            "sInfoEmpty": "Mostrando 0 a 0 de 0 entradas",
                            "sSearch": "Buscar:",
                            "sZeroRecords": "No se encontraron registros coincidentes en la tabla",
                            "sInfoFiltered": "(Filtrado de _MAX_ entradas totales)",
                            "oPaginate": {
                                "sFirst": "Primero",
                                "sPrevious": "Anterior",
                                "sNext": "Siguiente",
                                "sLast": "Ultimo"
                            },
                            "buttons": {
                                "print": "Imprimir",
                                "colvis": "Visibilidad Columnas",
                                "excel": "Exportar a Excel",
                                "pdf": "Exportar a PDF"
                            }
                        }
                    }).buttons().container().appendTo('#customers-table_wrapper .col-md-6:eq(0)');
                });
            </script>
          <?php $__env->stopPush(); ?>







<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\drogueria4\resources\views/medicaments\index.blade.php ENDPATH**/ ?>