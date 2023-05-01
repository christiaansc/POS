<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
    
      <h1><span class="brand-text light right ml-3">POS</span></h1>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
                <span class="right badge badge-success">HOME</span>
              </p>
            </a>
          </li>
            
         <!-- <li class="nav-item">
            <a href="/caja" class="nav-link">
              <i class="nav-icon fas fa-cash-register"></i>
              <p>
                Caja diaria
                <span class="right badge badge-success">HOME</span> 
              </p>
            </a>
          </li>  -->
          <li class="nav-item">
                <a href="{{ route('ventas.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-cash-register"></i>
                  <p>Registro Ventas</p>
                </a>
              </li>
          <li class="nav-item menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Administracion
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('products.index') }}" class="nav-link">
                  <i class="fas fa-boxes menu-icon"></i>
                  <p>Productos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('categorias.index') }}" class="nav-link">
                  <i class="fas fa-tags menu-icon"></i>
                  <p>Categorias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/insumos" class="nav-link">
                <i class="fas fa-clipboard-check"></i>
                  <p>Inventario</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/gastos" class="nav-link">
                <i class="fas fa-donate menu-icon"></i>
                  <p>Gastos</p>
                </a>
              </li>
              
              @can('admin.roles')
                
                <li class="nav-item">
                  <a href="/roles" class="nav-link">
                  <i class="fas fa-user menu-icon"></i>
                    <p>Roles</p>
                  </a>
                </li>
              @endcan
              @can('admin.users')       
            
                <li class="nav-item">
                  <a href="/users" class="nav-link">
                  <i class="fas fa-user menu-icon"></i>
                    <p>users</p>
                  </a>
                </li>             
              </ul>
            </li>
              @endcan
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Reporte Ventas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('reports.day')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Por dia </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('reports.date')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Por fecha</p>
                </a>
              </li>
          
            </ul>
          </li>

          
     
     
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

