<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sogo Hotel</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="admin_index.php?action=admin_home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Trang chủ</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRoom" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-door-open"></i>
            <span>Quản lý phòng</span>
        </a>
        <div id="collapseRoom" class="collapse" aria-labelledby="headingRoom" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="admin_index.php?action=admin_room_list">Thông tin sơ bộ</a>
                <a class="collapse-item" href="admin_index.php?action=admin_room_book">Đặt phòng</a>
                <a class="collapse-item" href="admin_index.php?action=admin_room_check">Hồ sơ đặt phòng</a>
                <!-- <a class="collapse-item" href="admin_index.php?action=admin_room_undo_list">Hồ sơ thanh toán</a> -->
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBill"
            aria-expanded="true" aria-controls="collapseBill">
            <i class="fas fa-fw fa-receipt"></i>
            <span>Quản lý hóa đơn</span>
        </a>
        <div id="collapseBill" class="collapse" aria-labelledby="headingBill" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="admin_index.php?action=admin_bill_list">Danh sách hóa đơn</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKH"
            aria-expanded="true" aria-controls="collapseKH">
            <i class="fas fa-fw fa-user"></i>
            <span>Quản lý nhân viên</span>
        </a>
        <div id="collapseKH" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="admin_index.php?action=admin_rec_list">Thông tin sơ bộ</a>
                <a class="collapse-item" href="admin_index.php?action=admin_rec_salary">Lương</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNV"
            aria-expanded="true" aria-controls="collapseNV">
            <i class="fas fa-fw fa-users"></i>
            <span>Quản lý khách hàng</span>
        </a>
        <div id="collapseNV" class="collapse" aria-labelledby="headingNV" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="admin_index.php?action=admin_cus_list">Thông tin sơ bộ</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSV"
            aria-expanded="true" aria-controls="collapseSV">
            <i class="fas fa-fw fa-spa"></i>
            <span>Quản lí quyền hạn</span>
        </a>
        <div id="collapseSV" class="collapse" aria-labelledby="headingSV" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="admin_index.php?action=admin_authority">Phân quyền</a>
                <a class="collapse-item" href="admin_index.php?action=admin_authority">Cấp bậc</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Khôi phục</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="admin_index.php?action=admin_room_list&act=admin_room_restore">Phòng</a>
                <a class="collapse-item" href="admin_index.php?action=admin_rec_list&act=admin_rec_restore">Nhân viên</a>
                <a class="collapse-item" href="admin_index.php?action=admin_cus_list&act=admin_cus_restore">Khách hàng</a>
                <!-- <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a> -->
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Liên hệ</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    

</ul>
<!-- End of Sidebar -->