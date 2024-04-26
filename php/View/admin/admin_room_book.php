<div class="row m-3">
    <div class="col-lg-8 mb-3 mb-sm-0">        
        <div class="card" id="customer">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-bolder">Thông tin khách hàng</h3>
                </div>
                <div class="card-text">
                    <label for="name">Họ và tên (Nhập không dấu)</label>
                    <input type="text" class="form-control" name="name" id="name_user">
                    <small class="text-danger" name="name_error" id="name_user_error"></small>
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email_user">
                            <small class="text-danger" name="email_error" id="email_user_error"></small>
                        </div>
                        <div class="col-lg-6">
                            <label for="tel">Số điện thoại</label>
                            <input type="text" class="form-control" name="tel" id="tel_user">
                            <small class="text-danger" name="tel_error" id="tel_user_error"></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4" id="general_info">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-bolder">Thông tin chung</h3>
                </div>
                <div class="card-text">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th scope="row">Tiện ích chung</th>
                                <td>Máy lạnh, thang máy, lễ tân 24h, WiFi, nhà hàng</td>                                
                            </tr>                            
                            <tr>
                                <th scope="row">Bữa sáng</th>
                                <td colspan="2">Được phục vụ tại cơ sở lưu trú từ 6:30 tới 9:30.</td>
                            </tr>
                            <tr>
                                <th scope="row">Thời gian nhận/trả phòng</th>
                                <td>Từ 14:00 hôm nay tới trước 12:00 hôm sau.</td>
                            </tr>
                            <tr>
                                <th scope="row">Hút thuốc</th>
                                <td colspan="2">Chỉ được phép hút thuộc tại các nơi chỉ định.</td>
                            </tr>
                            <tr>
                                <th scope="row">Thú cưng</th>
                                <td colspan="2">Không được mang theo thú cứng.</td>
                            </tr>
                        </tbody>
                    </table>
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
                            <span class="fs-5" id="selected_price"></span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Voucher</span>
                            <span id="selected_voucher">0</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3" style="border-top: 1px solid #ced4da">
                            <span class="mt-3">
                                <h3>Tổng giá</h3>
                            </span>
                            <span class="mt-3">
                                <h3 class="fw-bold fs-3" style="color: rgb(255, 94, 31);" id="selected_sum"></h3>
                            </span>
                        </div>
                        <button class="btn btn-primary checkout">Tiếp tục thanh toán</button>
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
                $rooms = $room->getEmptyRoom();
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
                            <label for="from">Nhận phòng</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="far fa-calendar-alt"></i></span>
                                <input type="datetime" id="from" class="form-control" aria-describedby="addon-wrapping">                                
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="from">Trả phòng</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="far fa-calendar-alt"></i></span>
                                <input type="datetime" id="to" class="form-control" aria-describedby="addon-wrapping">                                
                            </div>
                        </div>
                        <div class="row">
                            <small class="text-danger" id="time_error"></small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <h5>Các dịch vụ</h5>
                        <div>
                            <ul>
                                <div id="service_list"></div>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <h5>Các yêu cầu</h5>
                        <div>
                            <ul>
                                <div id="requirement_list"></div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="ajax/room/show_selected_room.js"></script>
<script src="ajax/room/validate.js"></script>
<script src="Content/datetimepicker-master/build/jquery.datetimepicker.full.min.js"></script>
<script>
    let time_arrive = 0;
    let time_left = 0;
    $("#from, #to").datetimepicker({
        autoclose: true,
        timepicker: false,
        datepicker: true,
        format: "d/m/Y",
        weeks: true,
        minDate: 0,
    }).on("change", function(){
        let from = $(this).val();
        let from_arr = from.split("/");
        let from_day = parseInt(from_arr[0]);
        let from_month = parseInt(from_arr[1]);
        let from_year = parseInt(from_arr[2]);
        let dateTime = new Date(from_year, from_month, from_day);
        let time = dateTime.getTime();

        //Nếu chọn ngày nhận phòng thì time sẽ là time_arrive, ngược lại
        if($(this).attr("id") == "from"){            
            time_arrive = time;
        }else{
            time_left = time;
        }

        // console.log(time_arrive);
        if(time_arrive > time_left ){            
            $("#time_error").html("Ngày nhận phòng phải nhỏ hơn ngày trả phòng!");            
        }else if(time_left == time_arrive){
            $("#time_error").html("Ngày nhận phòng không được trùng với ngày trả phòng!");
        }else{
            $("#time_error").html("");
        }
    })

    $.datetimepicker.setLocale('vi');
</script>
