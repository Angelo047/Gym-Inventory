  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-icon rounded-square mt-5">
    <img src="images/logo-modified.jpg" alt="logo" width="50%" height="50%" style="margin-top:70px; clip-path: circle(50%);">
    <div class="sidebar-text" style="margin-top:10px;">RFG ELITE</div>
    </div>

</a>

<!-- Divider -->
<hr class="sidebar-divider" style="margin-top:110px;">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Gym Products and Inventory
</div>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="users.php">
        <i class="fas fa-fw fa-user"></i>
        <span>Users</span></a>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="category.php">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Category</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="products.php">
        <i class="fas fa-fw fa-boxes"></i>
        <span>Products</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="inventory.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Inventory</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="stock_in.php">
        <i class="fas fa-fw fa-truck-loading"></i>
        <span>Stock In</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="stock_out.php">
        <i class="fas fa-fw fa-people-carry"></i>
        <span>Stock Out</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="equipments.php">
        <i class="fas fa-fw fa-dumbbell"></i>
        <span>Equipments</span></a>
</li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-archive"></i>
                    <span>Archive</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Archive</h6>
                        <a class="collapse-item" href="archive_products.php">Products</a>
                        <a class="collapse-item" href="archive_equipments.php">Equipments</a>
                    </div>
                </div>
            </li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="supplier.php">
    <i class="fas fa-truck"></i>
        <span>Supplier</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>