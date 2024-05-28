

<?php $__env->startSection('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Clientes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Clientes</li>
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
                <h3 class="card-title">Tabla de Clientes</h3>
               
               <?php if (\Illuminate\Support\Facades\Blade::check('role', 'Administrador')): ?>
								<a href="<?php echo e(route('customer.create')); ?>" class="btn btn-primary float-right" title="Nuevo"><i class="fas fa-plus nav-icon"></i></a>
                                
                                <?php endif; ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="customers-table" class="table table-bordered table-hover">

                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Primer Nombre</th>
                    <th>Segundo Nombre</th>
                    <th>Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                   
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($customer->id); ?></td>
                    <td><?php echo e($customer->firstname); ?></td>
                    <td><?php echo e($customer->secondname); ?></td>
                    <td><?php echo e($customer->lastname); ?></td>
                    <td><?php echo e($customer->secondlastname); ?></td>
                    <td><?php echo e($customer->cell_number); ?></td>
                    <td><?php echo e($customer->street_address); ?></td>
                  
                    </td>
                      

                  <td>
                  
                 
                    <a class="btn btn-info btn-sm" href="<?php echo e(route('customer.edit',$customer->id)); ?>"  title="Edit"><i class="fas fa-pencil-alt"></i></a>
                   
                  
                  
                  <?php if (\Illuminate\Support\Facades\Blade::check('role', 'Administrador')): ?>
                    <form class="d-inline delete-form" action="<?php echo e(route('customer.destroy',$customer)); ?>" method="POST">
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
                
              });
              $(function() {
                $('.toggle-class').change(function() {
                  var estado = $(this).prop('checked') == true ? 1 : 0;
                  var product_id = $(this).data('id');
                  $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: 'cambioestadoproduct',
                    data: {'estado': status, 'product_id': product_id},
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\drogueria4\resources\views/customers\index.blade.php ENDPATH**/ ?>