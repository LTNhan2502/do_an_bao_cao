<section class="site-hero overlay" style="background-image: url(Content/images/hero_4.jpg)"
  data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row site-hero-inner justify-content-center align-items-center">
      <div class="col-md-10 text-center" data-aos="fade-up">
        <span class="custom-caption text-white d-block  mb-3">Chào mừng bạn đến với</span>
        <h1 class="heading">SogoHotel</h1>
      </div>
    </div>
  </div>

  <a class="mouse smoothscroll" href="#next">
    <div class="mouse-icon">
      <span class="mouse-wheel"></span>
    </div>
  </a>
</section>
<!-- END section Carousel -->

<section class="section bg-light pb-0">
  <div class="container">

    <div class="row check-availabilty" id="next">
      <div class="block-32" data-aos="fade-up" data-aos-offset="-200">
        <form action="#">
          <div class="row">
            <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
              <label for="checkin_date" class="font-weight-bold text-black">Check In</label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
                <input type="text" id="checkin_date" class="form-control">
              </div>
            </div>
            <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
              <label for="checkout_date" class="font-weight-bold text-black">Check Out</label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
                <input type="text" id="checkout_date" class="form-control">
              </div>
            </div>
            <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
              <div class="row">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label for="adults" class="font-weight-bold text-black">Số người ở</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="" id="adults" class="form-control">
                      <option value="">1</option>
                      <option value="">2</option>
                      <option value="">3</option>
                      <option value="">4+</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 align-self-end">
              <button class="btn btn-primary btn-block text-white">Tìm kiếm</button>
            </div>
          </div>
        </form>
      </div>


    </div>
  </div>
</section>
<!-- End Section Search -->

<section class="section">
  <div class="container">
    <div class="row justify-content-center text-center mb-5">
      <div class="col-md-7">
        <h2 class="heading" data-aos="fade-up">Loại phòng</h2>
        <p data-aos="fade-up" data-aos-delay="100">Tại đây, bạn có thể chọn loại phòng muốn đặt.</p>
        <p class="mt" data-aos="fade-up" data-aos-delay="100">Single Room sẽ có từ 1-2 người. </p>
        <p class="mt" data-aos="fade-up" data-aos-delay="100">Family Room sẽ có từ 2 người trở lên. </p>
        <p class="mt" data-aos="fade-up" data-aos-delay="100">Presidential Room là phòng đặc biệt, không gian rộng rãi,
          dịch vụ đa dạng và sang trọng cùng nhiều tiện ích độc đáo. </p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-4" data-aos="fade-up">
        <a href="index.php?action=kind&act=single" class="room">
          <figure class="img-wrap">
            <img src="Content/images/standard_double.jpg" alt="Single Room" class="img-fluid mb-3">
          </figure>
          <div class="p-3 text-center room-info">
            <h2>Single Room</h2>
            <span class="text-uppercase letter-spacing-1">Chỉ từ 488.000đ/đêm</span>
          </div>
        </a>
      </div>

      <div class="col-md-6 col-lg-4" data-aos="fade-up">
        <a href="index.php?action=kind&act=family" class="room">
          <figure class="img-wrap">
            <img src="Content/images/family.jpg" alt="Family Room" class="img-fluid mb-3">
          </figure>
          <div class="p-3 text-center room-info">
            <h2>Family Room</h2>
            <span class="text-uppercase letter-spacing-1">Chỉ từ 389.000đ/đêm</span>
          </div>
        </a>
      </div>

      <div class="col-md-6 col-lg-4" data-aos="fade-up">
        <a href="index.php?action=kind&act=presidential" class="room">
          <figure class="img-wrap">
            <img src="Content/images/mia_suite_river_front.jpg" alt="Presidential Room" class="img-fluid mb-3">
          </figure>
          <div class="p-3 text-center room-info">
            <h2>Presidential Room</h2>
            <span class="text-uppercase letter-spacing-1">Chỉ từ 1.790.000đ/đêm</span>
          </div>
        </a>
      </div>


    </div>
  </div>
</section>
<!-- End Section Kind -->

<style>
  .mt {
    margin-top: -15px;
  }

  figure img{
    width: 360px;
    max-height: 230px;
  }
</style>