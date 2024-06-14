<?php
  $room = new room();
  $fmt = new formatter();
  $ac = 0;
  if (isset($_GET['act']) && $_GET['act'] == "single") {
    $ac = 1;
  }
  if (isset($_GET['act']) && $_GET['act'] == "family") {
    $ac = 2;
  }
  if (isset($_GET['act']) && $_GET['act'] == "presidential") {
    $ac = 3;
  }
?>

<section class="site-hero overlay" style="background-image: url(Content/images/hero_4.jpg)"
  data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row site-hero-inner justify-content-center align-items-center">
      <div class="col-md-10 text-center" data-aos="fade-up">
        <span class="custom-caption text-white d-block  mb-3"><a href="index.php">Loại phòng</a></span>        
        <?php
          if ($ac == 1) {
            echo '<h1 class="heading">Single Room</h1>';
          }else if ($ac == 2) {
            echo '<h1 class="heading">Family Room</h1>';
          }else if ($ac == 3) {
            echo '<h1 class="heading">Presidential Room</h1>';
          }
        ?>
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

<section class="section pb-4">
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
                  <label for="adults" class="font-weight-bold text-black">Adults</label>
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
                <div class="col-md-6 mb-3 mb-md-0">
                  <label for="children" class="font-weight-bold text-black">Children</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="" id="children" class="form-control">
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


<!-- Start session card info -->
<section class="section">
  <div class="container">
    <div class="row">
      <?php
      if ($ac == 1) {
        $kind = $room->getSingle();
      }else if ($ac == 2) {
        $kind = $room->getFamily();
      }else if ($ac == 3) {
        $kind = $room->getPresidential();
      }
      while ($set = $kind->fetch()):
        ?>
        <div class="col-lg-12 col-md-12 mb-5" data-aos="fade-up">
          <div class="card rounded-table">
            <div class="card-body">
              <h5 class="card-title"><?php echo $set['name']; ?></h5>
              <p class="card-text">
              <div class="row">
                <div class="col-lg-4 col-md-4">
                  <img src="Content/images/<?php echo $set['img']; ?>" alt="Free website template"
                    class="img-fluid mb-3 rounded-img" width="700px" height="700px">
                  <button class="btn btn-primary rounded-btn" data-toggle="modal" data-target="#exampleModal<?php echo $set['id']; ?>">Xem chi tiết</button>
                </div>
                <div class="col-lg-8 col-md-8">
                  <table class="table table-bordered rounded-table">
                    <thead>
                      <tr>
                        <th class="width">Thông tin sơ bộ</th>
                        <th class="text-center">Khách</th>
                        <th class="text-right">Giá/phòng/đêm</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <!-- Thông tin sơ bộ -->
                        <td class="width">
                          <?php
                            $square_meter = $set['square_meter'];
                            $item = $set['requirement'];
                            $requirement = explode(" - ", $item);
                            $set_sv = count($requirement);
                          ?>
                          <ul>
                            <li><?php echo $square_meter; ?>m²</li>
                            <?php for ($i = 0; $i < $set_sv; $i++): ?>
                              <li><?php echo $requirement[$i]; ?></li>
                            <?php endfor; ?>
                          </ul>
                        </td>

                        <!-- Số khách -->
                        <td class="text-center"><?php echo $set['quantity']; ?></td>

                        <!-- Giá phòng/đêm -->
                        <td class="text-right">
                          <span class="text-line-through">
                            <?php echo $fmt->formatCurrency($set['price']); ?>đ
                          </span><br>
                          <span class="text-primary letter-spacing-1">
                            <?php echo $fmt->formatCurrency($set['sale']); ?>đ
                          </span>
                        </td>
                        <td class="text-center">
                          <a href="index.php?action=booking"
                            class="room btn btn-primary rounded-btn">Đặt phòng</a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              </p>
            </div>
          </div>
        </div>

        <!-- Modal -->
      <div class="modal fade" id="exampleModal<?php echo $set['id']; ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered ">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Xem chi tiết phòng <span class="detail_name fs-3 fw-3"><?php echo $set['name']; ?></span>
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php
                $id = $set['id'];
                $detail = $room->getDetailRooms($id);
                $detail = $detail->fetch()
              ?>
              <div class="row">
                <!-- Ảnh -->
                <?php if (isset($detail['id'])) { ?>
                  <div class="col-lg-8 bg-dark card image-container">
                    <img src="Content/images/<?php echo $detail['img']; ?>" class="image-big m-4" width="90%">
                    <div class="image-row">
                      <?php
                        $item_img = $detail['img_name'];
                        $img_arr = explode(' - ', $item_img);
                        $img_num = count($img_arr);
                        echo "<img src='Content/images/" . $detail['img'] . "' class='image-small mb-4 selected'";
                        for ($i = 0; $i < $img_num; $i++) {
                          echo "<img src='Content/images/" . $img_arr[$i] . "' class='image-small mb-4' 
                                data-img-show='Content/images/" . $img_arr[$i] . "'>";
                        }
                      ?>
                    </div>
                  </div>
                  <!-- Mét vuông và số lượng người/phòng -->
                  <div class="col-lg-4 pl-4">
                    <div class="row">
                      <h4>Thông tin chung</h4>
                      <div>
                        <ul>
                          <li><?php echo " " . $detail['square_meter'] . "m²"; ?></li>
                          <li><?php echo " " . $detail['quantity'] . " khách"; ?></li>
                        </ul>
                      </div>
                    </div>
                    <div class="row">
                      <div>
                        <hr>
                        <!-- Tiện ích -->
                        <h4>Tiện ích</h4>
                        <?php
                          $item = $detail['service_name'];
                          $service = explode(" - ", $item);
                          $set_sv = count($service);
                        ?>
                        <ul>
                          <?php for ($i = 0; $i < $set_sv; $i++): ?>
                            <li><?php echo $service[$i]; ?></li>
                          <?php endfor; ?>
                        </ul>
                        <hr>

                        <!-- Mô tả -->
                        <h4>Về phòng này</h4>
                        <?php
                          $item_des = $detail['description'];
                          $des = explode(' - ', $item_des);
                          $des_num = count($des);
                        for ($i = 0; $i < $des_num; $i++) {
                          echo "- $des[$i] </br>";
                        }
                        ?>
                        <br>
                        <div class="shadow-inset-md bg-body-tertiary p-3 text-center fw-bolder fs-6">
                          <?php
                          echo "Khởi điểm từ <span style='color: rgb(255, 94, 31);'>" . $fmt->formatCurrency($detail['sale']) . "</span> đ/phòng/đêm";
                          ?>
                          <a class="btn btn-primary"  href="index.php?action=booking&selected_room_id=<?php echo $set['id']; ?>">Chọn phòng này</a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } else {
                  echo "<h3 class='text-center'>Chưa có thông tin chi tiết của phòng này</h3>";
                } 
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Modal -->
    <?php endwhile; ?>
  </div>
  </div>
</section>



<section class="section bg-light">
  <div class="container">
    <div class="row justify-content-center text-center mb-5">
      <div class="col-md-7">
        <h2 class="heading" data-aos="fade">Great Offers</h2>
        <p data-aos="fade">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
          there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
          language ocean.</p>
      </div>
    </div>

    <div class="site-block-half d-block d-lg-flex bg-white" data-aos="fade" data-aos-delay="100">
      <a href="#" class="image d-block bg-image-2" style="background-image: url('images/img_1.jpg');"></a>
      <div class="text">
        <span class="d-block mb-4"><span class="display-4 text-primary">$199</span> <span
            class="text-uppercase letter-spacing-2">/ per night</span> </span>
        <h2 class="mb-4">Family Room</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind
          texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        <p><a href="#" class="btn btn-primary text-white">Book Now</a></p>
      </div>
    </div>
    <div class="site-block-half d-block d-lg-flex bg-white" data-aos="fade" data-aos-delay="200">
      <a href="#" class="image d-block bg-image-2 order-2" style="background-image: url('images/img_2.jpg');"></a>
      <div class="text order-1">
        <span class="d-block mb-4"><span class="display-4 text-primary">$299</span> <span
            class="text-uppercase letter-spacing-2">/ per night</span> </span>
        <h2 class="mb-4">Presidential Room</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind
          texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        <p><a href="#" class="btn btn-primary text-white">Book Now</a></p>
      </div>
    </div>

  </div>
</section>

<section class="section bg-image overlay" style="background-image: url('images/hero_4.jpg');">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 col-md-6 text-center mb-4 mb-md-0 text-md-left" data-aos="fade-up">
        <h2 class="text-white font-weight-bold">A Best Place To Stay. Reserve Now!</h2>
      </div>
      <div class="col-12 col-md-6 text-center text-md-right" data-aos="fade-up" data-aos-delay="200">
        <a href="reservation.html" class="btn btn-outline-white-primary py-3 text-white px-5">Reserve Now</a>
      </div>
    </div>
  </div>
</section>

<script>  
  $(document).ready(function() {
    $(document).on("click", ".image-small", function() {
      let image_container = $(this).closest(".image-container");
      let image_big = image_container.find(".image-big");

      // Xoá tất cả selected class trong image-small (mỗi đối tượng mỗi khác)
      image_container.find(".image-small").removeClass("selected");

      // Thêm selected class vào image-small được click
      $(this).addClass("selected");

      // Lấy data từ data-img-show
      let newSrc = $(this).data("img-show");

      // Cập nhật lại đường link của image-big
      image_big.attr("src", newSrc);
    });
  });
</script>

<style>
  .rounded-table {
    border-radius: 10px;
    overflow: hidden;
    /* Đảm bảo các góc của nội dung bên trong cũng được bo tròn */
  }

  .width{
    min-width: 280px;
    max-width: 280px;
  }

  .rounded-img {
    border-radius: 10px;
  }

  .card {
    border-radius: 10px;
    box-shadow: 3px 4px 8px rgba(255, 0, 0, 0.155);
  }

  .text-line-through {
    text-decoration: line-through;
    font-size: small;
  }

  .image-container {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .image-row {
    display: flex;
    justify-content: space-around;
    width: 100%; /*Cho fix với cái khung của thẻ cha*/
  }

  .image-big{
    border-radius: 10px;
    max-height: 650px;
  }

  .image-small {
    width: 150px; 
    height: 125px;
    border-radius: 10px;
    opacity: 0.4;
  }

  .shadow-inset-md{
    border-radius: 9px;
    background-color: #f2f2f2;
    box-shadow: inset 1px 2px 4px rgba(255, 0, 0, 0.155) !important;
  }

  .selected{
    border: 2px solid #0d6efd;
    opacity: 1.2;
  }

  /* Đảm bảo modal có thể mở rộng ra toàn màn hình */
  .modal-dialog.modal-xl {
    max-width: 90vw;
  }

  .modal-content {
    border-radius: 10px;
  }

  .modal-body {
    max-height: 80vh;
    overflow-y: auto;
  }

</style>