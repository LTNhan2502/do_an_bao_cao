<div class="container-fluid">
    <!-- Page Heading --> 
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <span class="m-0 font-weight-bold text-primary">Danh sách phòng đã đặt</span>
        </div>
        <div class="card-body">
        <?php
            $room = new room();
            $fmt = new formatter();
            $booked_room = $room->getBookedRooms();
            $rowCount = $booked_room->rowCount();
        ?>
            <div class="table-responsive">
                <?php
                    if( $rowCount == 0){
                        echo "<h4 class='text-decoration-underline'>Chưa có phòng nào được đặt!</h4>";
                    }else{
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Thông tin khách hàng</th>
                            <th>Phòng</th>
                            <th>Thông tin phòng đặt</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Thông tin khách hàng</th>
                            <th>Phòng</th>
                            <th>Thông tin phòng đặt</th>
                            <th>Hành động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php                            
                            $count = 1;
                            while ($result = $booked_room->fetch()):
                        ?>
                        <tr style="max-height: 100px">
                            <td><?php echo $count; ?></td>
                            <td>
                                <div>ID đặt phòng: 
                                    <span class="badge badge-pill badge-primary booked_room_id" data-id="<?php echo $result['booked_room_id']; ?>"><?php echo $result['booked_room_id']; ?></span>
                                </div>
                                <div>ID khách hàng: 
                                    <span class="badge badge-pill badge-primary customer_booked_id" data-customer_booked_id="<?php echo $result['booked_customer_id']; ?>"><?php echo $result['booked_customer_id']; ?></span>
                                </div>
                                <div class="customer_name" data-customer_name="<?php echo $result['booked_customer_name']; ?>"><span class="text-decoration-underline" style="font-weight: 900">Tên KH:</span> <?php echo $result['booked_customer_name']; ?></div>
                                <div class="tel" data-tel="<?php echo $result['booked_tel']; ?>">Số điện thoại: <?php echo $result['booked_tel']; ?></div>
                                <div id="customer_email" data-email="<?php echo $result['booked_email']; ?>">Email: <?php echo $result['booked_email']; ?></div>
                            </td>
                            <td>
                                <div class="room_name" data-room_name="<?php echo $result['booked_room_name']; ?>"><span class="text-decoration-underline" style="font-weight: 900">Phòng:</span> <?php echo $result['booked_room_name']; ?></div>
                                <div>Giá: <?php echo $fmt->formatCurrency($result['booked_price'])."đ"; ?></div>
                                <div class="customer_sum" data-customer_sum="<?php echo $result['booked_sum']; ?>"><span class="text-decoration-underline" style="font-weight: 900">Tổng:</span> <?php echo $fmt->formatCurrency($result['booked_sum'])."đ"; ?></div>
                            </td>
                            <td>
                                <div class="arrive" data-arrive="<?php echo $result['booked_arrive']; ?>">Ngày vào: <?php echo $result['booked_arrive']; ?></div>
                                <div class="quit" data-quit="<?php echo $result['booked_quit']; ?>">Ngày trả: <?php echo $result['booked_quit']; ?></div>
                                <div><span class="text-decoration-underline" style="font-weight: 900">Tình trạng:</span>
                                    <?php
                                        if($result['booked_session'] == 1 && $result['booked_done_session'] == 0){
                                    ?>
                                            <span class="badge badge-pill badge-info" id="badge_receive">Đã nhận</span>
                                    <?php }else if($result['booked_session'] == 0 && $result['booked_done_session'] == 1){ ?>
                                            <span class="badge badge-pill badge-success" id="badge_receive">Đã trả</span>
                                    <?php }else if($result['booked_session'] == 0 && $result['booked_done_session'] == 0){ ?>
                                            <span class="badge badge-pill badge-warning" id="badge_receive">Chưa nhận</span>
                                    <?php } ?>
                                </div>
                                <div></div>
                            </td>
                            <td>
                            <!-- NHẬN/TRẢ PHÒNG -->
                            <?php
                                if($result['booked_session'] == 0 && $result['booked_done_session'] == 0){ //Chưa nhận phòng, cũng không có trả phòng
                            ?>
                                    <button class="btn btn-outline-primary btn-same text-start mb-2 button_receive" id="receive"><i class="far fa-check-circle"></i> Xác nhận nhận phòng</button> </br>
                                    <button class="btn btn-outline-primary btn-same text-start mb-2 button_leave" id="leave" disabled><i class="far fa-check-circle"></i> Xác nhận trả phòng</button> </br>
                            <?php }else if($result['booked_session'] == 1 && $result['booked_done_session'] == 0){ //Đã nhận phòng, đang trong quá trình dùng?> 
                                    <button class="btn btn-danger btn-same text-start mb-2 button_receive" id="undo_receive"><i class="far fa-times-circle"></i> Huỷ nhận phòng</button> </br>
                                    <button class="btn btn-outline-primary btn-same text-start mb-2 button_leave" id="leave"><i class="far fa-check-circle"></i> Xác nhận trả phòng</button> </br>
                            <?php }else if($result['booked_session'] == 0 && $result['booked_done_session'] == 1){ //Dùng xong, đã trả phòng và muốn huỷ trả phòng?>
                                    <button class="btn btn-outline-primary btn-same text-start mb-2 button_receive" id="receive" disabled><i class="far fa-check-circle"></i> Xác nhận nhận phòng</button> </br>
                                    <button class="btn btn-danger btn-same text-start mb-2 button_leave" id="undo_leave"><i class="far fa-check-circle"></i> Huỷ trả phòng</button> </br>
                            <?php } ?>
                               
                            <!-- HUỶ ĐẶT PHÒNG -->
                                <button class="btn btn-outline-danger btn-same text-start button_recover" disabled id="undo_book"><i class="fas fa-reply"></i> Thu hồi phòng</button>
                            </td>
                        </tr>
                        <?php 
                                $count++;
                                endwhile;
                            } 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="ajax/room/approve.js"></script>

<style>
    .btn-same{
        min-width: 170px;
        font-size: 0.8rem;
    }

    
</style>