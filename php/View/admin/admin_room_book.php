<div class="row m-3">
    <div class="col-lg-8 mb-3 mb-sm-0">
        <div class="card" id="customer">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-bolder">Thông tin khách hàng</h3>
                </div>
                <div class="card-text">
                    <label for="name">Họ và tên</label>
                    <input type="text" class="form-control" name="name" id="name">
                    <small name="name_error" id="name_error"></small>
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                            <small name="email_error" id="email_error"></small>
                        </div>
                        <div class="col-lg-6">
                            <label for="tel">Số điện thoại</label>
                            <input type="tel" class="form-control" name="tel" id="tel">
                            <small name="tel_error" id="tel_error"></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-4" id="selected_detail_price">
            <div class="card-body">
                <div class="card-title">
                    <h3>Chi tiết giá</h3>
                </div>
                <div class="card-text">
                    <div class="row">
                        <div class="d-flex justify-content-between mb-3">
                            <span>Giá phòng</span>
                            <span id="selected_price"></span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Voucher</span>
                            <span id="selected_voucher"></span>
                        </div>
                        <div class="d-flex justify-content-between mb-3" style="border-top: 1px solid #ced4da">
                            <span class="mt-3">
                                <h3>Tổng giá</h3>
                            </span>
                            <span class="mt-3">
                                <h3 class="fw-bold" style="color: rgb(255, 94, 31);" id="selected_sum"></h3>
                            </span>
                        </div>
                        <button class="btn btn-primary">Tiếp tục thanh toán</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <h4>Thông tin phòng</h4>
        <select class="form-control" name="select_room" id="select_room">
            <option value="0">---Hãy chọn phòng---</option>
            <?php
            $room = new room();
            $detail_room = $room->getDetail_room();
            $rooms = $room->getRooms();
            // $dr = $detail_room->fetch();  
            // $r = $rooms->fetch();  
            while ($set = $rooms->fetch()):
                ?>
                <option value="<?php echo $set['id']; ?>"><?php echo $set['name']; ?></option>
                <?php
            endwhile;
            ?>
        </select>

        <div class="mt-3" id="selected_message">
            <h5>Chưa đưa vào hoạt động.</h5>
            <h5>Vui lòng chọn phòng khác!</h5>
        </div>
        <div class="card mt-3" id="selected_info">            
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-bolder">
                        <h5 id="selected_name"></h5>
                        <img src="" width="100%" id="selected_img" alt="">
                    </h3>
                </div>
                <div class="card-text">
                    <div class="row mt-3 mb-3">
                        <div class="col-lg-6">
                            <label for="email">Nhận phòng</label>
                            <input type="date" class="form-control" name="email" id="seleted_email">
                        </div>
                        <div class="col-lg-6">
                            <label for="tel">Trả phòng</label>
                            <input type="date" class="form-control" name="tel" id="seleted_tel">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <h6>Các dịch vụ</h6>
                    </div>
                    <div class="row">
                        <h6>Các yêu cầu</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="ajax/show_selected_room.js"></script>
<?php
    $room = new room();
    $detail_room = $room->getAllDetailRoom()->fetch();

?>
<script>
    
</script>