<header class="site-header js-site-header">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-6 col-lg-4 site-logo">
        <a class="text-black" href="index.php">Sogo Hotel</a>
      </div>
      <div class="col-6 col-lg-8 d-flex justify-content-end align-items-center">
        <div class="button-group">
          <?php
            if(isset($_SESSION['customer_id'])){
          ?>
              <a href="index.php?action=login" class="btn btn-outline-primary me-2 mr-1">
                <?php echo $_SESSION['customer_name']; ?>
              </a>
          <?php  }else{ ?>
            <a href="index.php?action=login" class="btn btn-outline-primary me-2 mr-1">Đăng nhập</a>
            <a href="index.php?action=signup" class="btn btn-primary">Đăng kí</a>
          <?php } ?>
        </div>
        <div class="site-menu-toggle js-site-menu-toggle bg-black ms-3" data-aos="fade">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <!-- END menu-toggle -->
      </div>
    </div>
    <div class="site-navbar js-site-navbar">
      <nav role="navigation">
        <div class="container">
          <div class="row full-height align-items-center">
            <div class="col-md-6 mx-auto">
              <ul class="list-unstyled menu">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="index.php?action=home&actall_room">Tất cả phòng</a></li>
                <li><a href="index.php?action=booking">Đặt phòng</a></li>
                <li><a href="events.html">Tài khoản</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="reservation.html">Reservation</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </div>

  </div>
</header>
<!-- END head -->

<style>
  header {
    background-color: #fff !important;
    box-shadow: 0 0 6px 0 rgba(255, 0, 0, 0.155);
    max-height: 100px;
    z-index: 1000 !important;
  }

  .container-fluid{
    margin-bottom: 50%;
  }

  .text-black {
    color: #000000 !important;
  }

  .bg-black span {
    background-color: #000000 !important;
  }

  .button-group {
    display: flex;
    align-items: center;
  }

  .site-menu-toggle {
    margin-left: 1rem;
  }

  @media (max-width: 767.98px) {
    .col-6.col-lg-8 {
      justify-content: flex-end;
    }
  }
</style>