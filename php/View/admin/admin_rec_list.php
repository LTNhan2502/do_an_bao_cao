<div class="container-fluid">
    <?php
        $room = new room();
        $fmt = new formatter();
        $count = $room->getRooms()->rowCount(); //Tổng đối tượng
        $limit = 6; //Giới hạn số đối tượng trong 1 trang
        $page = new page();
        $trang = $page->findPage($count, $limit); //Lấy được số trang cần có
        $start = $page->findStart($limit); //Lấy được sản phẩm bắt đầu trong 1 trang
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1; //Lấy được trang hiện tại
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <span class="m-0 font-weight-bold text-primary">Table Receptionist - Danh sách</span>
            <button class="btn m-0 font-weight-bold btn-primary" data-toggle="modal" data-target="#modalCreate">
                <i class="fas fa-plus-circle"></i>
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã nhân viên</th>
                            <th>Tên</th>
                            <th>Chức vụ</th>
                            <th>Ca làm việc</th>
                            <th class="text-end">Hành động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Mã nhân viên</th>
                            <th>Tên</th>
                            <th>Chức vụ</th>
                            <th>Ca làm việc</th>
                            <th class="text-end">Hành động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $rec = new receptionist();
                            $r = $rec->getAllRec();
                            $count = 1;
                            while($set = $r->fetch()):
                        ?>
                        <tr id="currency">
                            <!-- STT -->
                            <td><div id="rec_id" data-id="<?php echo $set['rec_id']; ?>"><?php echo $count; ?></div></td>
                            <!-- Mã nhân viên -->
                            <td><h3><span class="badge badge-primary fs-6" id="rec_code"><?php echo $set['rec_code']; ?></span></h3></td>
                            <!-- Tên nhân viên -->
                            <td>
                                <input type="text" class="form-control" name="rec_name" id="rec_name" 
                                        value="<?php echo $set['rec_name']; ?>"
                                        data-rec_id="<?php echo $set['rec_id']; ?>"
                                        data-rec_value="<?php echo $set['rec_name']; ?>">
                            </td>
                            <!-- Chức vụ -->
                            <td>
                                <select name="part" class="form-control" id="part">
                                    <?php 
                                        $part = $rec->getAllPart();
                                        while($set_part = $part->fetch()):
                                    ?>
                                    <option value="<?php echo $set_part['part_id']; ?>" 
                                            <?php echo $set['rec_part'] == $set_part['part_id'] ? 'selected' : ''; ?>
                                            data-rec_id="<?php echo $set['rec_id']; ?>"
                                            data-part_act="<?php echo $set_part['part_id']; ?>"
                                        ><?php echo $set_part['part_name'] ?>
                                    </option>
                                    <?php endwhile; ?>
                                </select>
                            </td>
                            <!-- Ca làm việc -->
                            <td>
                                <select name="shift" class="form-control" id="shift">
                                    <?php 
                                        $shift = $rec->getAllShift();
                                        while($set_shift = $shift->fetch()):
                                    ?>
                                    <option value="<?php echo $set_shift['shift_id']; ?>" 
                                            <?php echo $set['rec_shift'] == $set_shift['shift_id'] ? 'selected' : ''; ?>
                                            data-rec_id="<?php echo $set['rec_id']; ?>"
                                            data-shift_act="<?php echo $set_shift['shift_name']; ?>"
                                        ><?php echo $set_shift['shift_name'] ?>
                                    </option>
                                    <?php endwhile; ?>
                                </select>
                            </td>
                    
                            <td class="text-end">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $set['rec_id']; ?>">
                                    <i class="far fa-eye"></i>
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-trash"></i>
                                </button>

                            </td>
                        </tr>

                        <!-- Modal tạo mới-->
                        <div class="modal fade create_rec" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Table Receptionist - Tạo mới</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form enctype='multipart/form-data' id="createRecForm" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="new_rec">Họ và tên</label>
                                                <input type="text" class="form-control" name="new_rec" id="new_rec">
                                                <small class="text-danger" id="new_rec_error"></small>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <small class="text-danger" id="new_all_error"></small>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                            <button type="submit" name="submitRec" id="submitRec" class="btn btn-primary">Tạo</button>
                                        </div>
                                    </form>                                
                                </div>
                            </div>
                        </div>
                        
                        <!-- Modal xem chi tiết-->
                        <div class="modal fade" id="exampleModal<?php echo $set['rec_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">*
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xem thông tin cá nhân <span class="detail_rec_name"><?php echo $set['rec_name']; ?></span></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <div class="d-none rec_id_raw" data-rec_id_raw="<?php echo $set['rec_id']; ?>"></div>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <!-- Số điện thoại -->
                                            <div class="col">
                                                <label for="#rec_tel">Số điện thoại</label>
                                                <div class="input-group flex-nowrap">
                                                    <span class="input-group-text" id="addon-wrapping"><i class="fas fa-phone-alt"></i></span>
                                                    <input type="text" class="form-control" name="rec_tel" id="rec_tel" 
                                                        value="<?php echo $set['rec_tel']; ?>"
                                                        data-rec_id="<?php echo $set['rec_id']; ?>"
                                                        data-rec_value="<?php echo $set['rec_tel']; ?>">
                                                </div>                                                
                                            </div>

                                            <!-- Email -->
                                            <div class="col">
                                                <label for="#rec_email">Email</label>
                                                <div class="input-group flex-nowrap">
                                                    <span class="input-group-text" id="addon-wrapping"><i class="fas fa-envelope"></i></span>
                                                    <input type="text" class="form-control" name="rec_email" id="rec_email" 
                                                        value="<?php echo $set['rec_email']; ?>"
                                                        data-rec_id="<?php echo $set['rec_id']; ?>"
                                                        data-rec_value="<?php echo $set['rec_email']; ?>">
                                                </div>                                                
                                            </div>

                                            <!-- Ngày sinh -->
                                            <div class="col">
                                                <label for="#rec_birthday">Ngày sinh</label>
                                                <div class="input-group flex-nowrap">
                                                    <span class="input-group-text" id="addon-wrapping"><i class="far fa-calendar-alt"></i></span>
                                                    <input type="datetime" id="birthday<?php echo $set['rec_id'] ?>" class="form-control birthday" aria-describedby="addon-wrapping"
                                                        value="<?php echo $set['rec_birthday']; ?>"
                                                        data-rec_id="<?php echo $set['rec_id']; ?>"
                                                        data-rec_value="<?php echo $set['rec_birthday']; ?>">
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="row mm mt-4">
                                            <input type="hidden" value="<?php echo $set['rec_id']?>" id="rec_timeWork_id">
                                            <!-- Ngày bắt đầu làm việc -->
                                            <div class="col">
                                                <label for="#rec_startWork">Ngày bắt đầu làm việc</label>
                                                <div class="input-group flex-nowrap">
                                                    <span class="input-group-text" id="addon-wrapping"><i class="fas fa-clock"></i></span>
                                                    <input type="datetime" id="rec_startWork<?php echo $set['rec_id']; ?>" class="form-control rec_startWork" 
                                                        value="<?php echo $set['rec_startWork']; ?>"
                                                        data-rec_id="<?php echo $set['rec_id']; ?>"
                                                        data-rec_value="<?php echo $set['rec_startWork']; ?>">
                                                </div>                                                
                                            </div>

                                            <!-- Số ngày làm việc -->
                                            <div class="col">
                                                <label for="#rec_timeWork">Thời gian làm việc (ngày)</label>
                                                <div class="input-group flex-nowrap">
                                                    <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-clock"></i></span>
                                                    <input type="text" class="form-control rec_timeWork" name="rec_timeWork" id="rec_timeWork<?php echo $set['rec_id']; ?>" disabled
                                                        value="<?php echo $set['rec_timeWork']; ?>"
                                                        data-rec_id="<?php echo $set['rec_id']; ?>"
                                                        data-rec_value="<?php echo $set['rec_timeWork']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <!-- Thưởng -->
                                            <div class="col">
                                                <label for="#rec_bonus">Thưởng</label>
                                                <div class="input-group flex-nowrap">
                                                    <span class="input-group-text" id="addon-wrapping"><i class="fas fa-money-check-alt"></i></span>
                                                    <input type="text" class="form-control" name="rec_bonus" id="rec_bonus" 
                                                        value="<?php echo $fmt->formatCurrency($set['rec_bonus']); ?>"
                                                        data-rec_id="<?php echo $set['rec_id']; ?>"
                                                        data-rec_value="<?php echo $set['rec_bonus']; ?>">
                                                </div>                                                
                                            </div>

                                            <!-- Phạt -->
                                            <div class="col">
                                                <label for="#rec_fine">Phạt</label>
                                                <div class="input-group flex-nowrap">
                                                    <span class="input-group-text" id="addon-wrapping"><i class="fas fa-money-check-alt"></i></span>
                                                    <input type="text" class="form-control" name="rec_fine" id="rec_fine" 
                                                        value="<?php echo $fmt->formatCurrency($set['rec_fine']); ?>"
                                                        data-rec_id="<?php echo $set['rec_id']; ?>"
                                                        data-rec_value="<?php echo $set['rec_fine']; ?>">
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <!-- Lương -->
                                            <div class="col">
                                                <label for="#rec_salary">Lương</label>
                                                <div class="input-group flex-nowrap">
                                                    <span class="input-group-text" id="addon-wrapping"><i class="fas fa-money-bill-alt"></i></span>
                                                    <input type="text" class="form-control" name="rec_salary" id="rec_salary" 
                                                        value="<?php echo $fmt->formatCurrency($set['rec_salary']); ?>"
                                                        data-rec_id="<?php echo $set['rec_id']; ?>"
                                                        data-rec_value="<?php echo $set['rec_salary']; ?>">
                                                </div>                                                
                                            </div>

                                            <!-- Thời điểm nhận lương -->
                                            <div class="col">
                                                <label for="#rec_timeSalary">Thời điểm nhận lương</label>
                                                <?php
                                                    if($set['rec_timeSalary'] == null){                                                    
                                                ?>
                                                    <div class="badge badge-secondary fs-7 mr-1" id="badge">Chưa nhận</div>
                                                    <button class="btn btn-primary btn-sm" id="claimSalary">Nhận lương</button>
                                                    <button class="btn btn-danger btn-sm d-none" id="unClaimSalary">Huỷ nhận</button>
                                                <?php
                                                    }else{
                                                ?>
                                                    <div class="badge badge-secondary fs-7 mr-1" id="badge">Đã nhận</div>
                                                    <button class="btn btn-primary btn-sm d-none" id="claimSalary">Nhận lương</button>
                                                    <button class="btn btn-danger btn-sm" id="unClaimSalary">Huỷ nhận</button>
                                                <?php } ?>
                                                <div class="input-group flex-nowrap">
                                                    <span class="input-group-text" id="addon-wrapping"><i class="fas fa-business-time"></i></span>
                                                    <input type="text" class="form-control" name="rec_timeSalary" id="rec_timeSalary" disabled
                                                        value="<?php echo $set['rec_timeSalary']; ?>"
                                                        data-rec_id="<?php echo $set['rec_id']; ?>"
                                                        data-rec_value="<?php echo $set['rec_timeSalary']; ?>">
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <?php 
                            $count++;
                            endwhile;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- /.container-fluid -->
<style>
    .btn-sm{
        border-radius: 10px !important;
        font-weight: bold;
    }
</style>
<script src="ajax/receptionist/status.js"></script>
<script>
    //Dùng datetimepicker
    $(document).ready(function(){
        let isChanged = false;       

        //Input birthday
        $(".birthday").each(function(){
            $(this).datetimepicker({
                autoclose: true,
                timepicker: false,
                datepicker: true,
                format: "d/m/Y",
                weeks: true,
                // minDate: 0,
            }).on('change', function(){
                if(isChanged) return;
                isChanged = true;
                let $input = $(this); // Lưu trữ tham chiếu đến phần tử input
                let id = $(this).data('rec_id');
                let birthday_value  =$(this).val();
                // console.log(birthday_value);return;
                let prev_birthday = $input.data("rec_value"); //Dùng $input để khi đem xuống AJAX không bị lỗi
                $.ajax({
                    url: 'Controller/admin/admin_rec_list.php?act=update_birthday',
                    method: "POST",
                    data: {
                        id,
                        birthday_value,
                        prev_birthday
                    },
                    dataType: "JSON",
                    success: function(res){
                        if(res.status == 'success'){
                            Swal.fire({                                 
                                title: "Thành công!",
                                text: "Thay đổi thành công!",
                                icon: "success",
                                timer: 900,
                                timerProgressBar: true
                            });
                        }else if(res.status == 'fail'){
                            console.log(res.message);
                            // Swal.fire({                                 
                            //     title: "Thất bại!",
                            //     text: "Thay đổi thất bại! Kiểm tra lại!",
                            //     icon: "error",
                            //     timer: 3000,
                            //     timerProgressBar: true
                            // });
                        }else if(res.status == 'birthday'){
                            Swal.fire({                                 
                                title: "Nhắc nhở!",
                                text: res.message,
                                icon: "info",
                                timer: 3000,
                                timerProgressBar: true
                            });
                            $input.val(prev_birthday); //Quay lại giá trị cũ
                        }else{
                            Swal.fire({                                 
                                title: "Thất bại!",
                                text: "Thay đổi thất bại!",
                                icon: "error",
                                timer: 3000,
                                timerProgressBar: true
                            });
                        }
                        isChanged = false;
                        $input.datetimepicker('hide');
                    },
                    error: function(){
                        Swal.fire({                             
                            title: "Thất bại!",
                            text: "Lỗi khác không xác định!",
                            icon: "error",
                            timer: 3200,
                            timerProgressBar: true
                        })
                    }
                })
            });
        });
        

        //Chỉnh sửa rec_startWork
        let isChangedInputs = {};

        $(".rec_startWork").each(function() {
            let $input = $(this);
            // let id = $input.data('rec_id');
            let id = $input.closest(".modal").find('.rec_id_raw').data("rec_id_raw");

            isChangedInputs[id] = false;

            $input.datetimepicker({
                autoclose: true,
                timepicker: false,
                datepicker: true,
                format: "d/m/Y",
                weeks: true,
                // minDate: 0,
            }); $input.on('change', function() {
                if(isChangedInputs[id]) return;
                isChangedInputs[id] = true;

                let startWork_value = $input.val();
                let prev_startWork = $input.data("rec_value");

                let $input_timeWork = $input.closest(".mm").find(".rec_timeWork");
                let id_timeWork = $input_timeWork.data('rec_id');
                //Lấy thời gian miligiay của ngày hôm nay
                var now = Date.now();

                //Lấy thời gian miligiay của ngày bắt đầu làm việc
                let timeWork_arr = $input.val().split("/");
                let timeWork_day = parseInt(timeWork_arr[0]);
                let timeWork_month = parseInt(timeWork_arr[1]) - 1;
                let timeWork_year = parseInt(timeWork_arr[2]);
                let dateTime = new Date(timeWork_year, timeWork_month, timeWork_day);
                let rec_timeWork_getTime = dateTime.getTime();
                $.ajax({
                    url: 'Controller/admin/admin_rec_list.php?act=update_start-timeWork',
                    method: "POST",
                    data: {
                        id,
                        startWork_value,
                        prev_startWork,
                        id_timeWork,
                        now,
                        rec_timeWork_getTime
                    },
                    dataType: "JSON",
                    success: function(res) {
                        if (res.status == 'success') {
                            $input_timeWork.val(res.rec.rec_timeWork);
                            Swal.fire({
                                title: "Thành công!",
                                text: res.message,
                                icon: "success",
                                timer: 900,
                                timerProgressBar: true
                            });
                        }else if(res.status == 'startWork'){
                            Swal.fire({                                 
                                title: "Nhắc nhở!",
                                text: res.message,
                                icon: "info",
                                timer: 3000,
                                timerProgressBar: true
                            });
                            $input.val(prev_startWork); //Quay lại giá trị cũ
                        } else {
                            console.log(res.message);
                            // Swal.fire({
                            //     title: "Thất bại!",
                            //     text: res.message,
                            //     icon: "error",
                            //     timer: 3200,
                            //     timerProgressBar: true
                            // });
                        }
                        isChangedInputs[id] = false;
                        $input.datetimepicker('hide');
                    },
                    error: function() {
                        Swal.fire({
                            title: "Lỗi!",
                            text: "Lỗi không xác định",
                            icon: "error",
                            timer: 3200,
                            timerProgressBar: true
                        });
                    }
                });
            });
        });
        $.datetimepicker.setLocale('vi');
    });
</script>
<script src="ajax/receptionist/create.js"></script>