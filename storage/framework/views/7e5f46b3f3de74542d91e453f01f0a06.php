<aside class="main-sidebar sidebar-dark-primary elevation-5">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="<?php echo e(route('home')); ?>" class="nav-link active bg-danger">
                <i class="fas fa-home"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link bg-secondary">
                <i class="nav-icon fas fa-box-open"></i>
                <p>
                  Inventario
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo e(route('customer.index')); ?>" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Clientes</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo e(route('medicament.index')); ?>" class="nav-link">
                  <i class="nav-icon fas fa-box"></i>
                    <p>Articulos</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo e(route('supplier.index')); ?>" class="nav-link">
                    <i class="nav-icon fas fa-truck"></i>
                    <p>Proveedores</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo e(route('laboratory.index')); ?>" class="nav-link">
                  <i class="nav-icon fas fa-tag"></i>

                    <p>Marca</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php if (\Illuminate\Support\Facades\Blade::check('role', 'Administrador')): ?>
            <li class="nav-item">
              <a href="#" class="nav-link bg-secondary">
                <i class="fas fa-user"></i>
                <p>
                  Usuarios
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo e(route('role.index')); ?>" class="nav-link">
                    <i class="fas fa-users"></i>
                    <p>Roles</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo e(route('permiso.index')); ?>" class="nav-link">
                    <i class="fas fa-lock"></i>
                    <p>Permisos</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo e(route('usuario.index')); ?>" class="nav-link">
                    <i class="fas fa-users"></i>
                    <p>Usuarios</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php endif; ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
<?php /**PATH C:\xampp\htdocs\drogueria4\resources\views/layouts/partial/sidebar.blade.php ENDPATH**/ ?>