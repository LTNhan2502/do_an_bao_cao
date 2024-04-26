<div class="container-fluid">
    <!-- Page Heading --> 
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <span class="m-0 font-weight-bold text-primary">DANH SÁCH PHÒNG ĐÃ ĐẶT</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
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
                            $room = new room();
                            $booked_room = $room->getBookedRoom();
                            $count = 1;
                            while ($result = $booked_room->fetch()):
                        ?>
                        <tr style="max-height: 100px">
                            <td><?php echo $count; ?></td>
                            <td>
                                <div>ID đặt phòng: 
                                    <span class="badge badge-pill badge-primary booked_room_id" data-id="<?php echo $result['booked_room_id']; ?>"><?php echo $result['booked_room_id']; ?></span>
                                </div>
                                <div><span class="text-decoration-underline" style="font-weight: 900">Tên KH:</span> <?php echo $result['customer_name']; ?></div>
                                <div>Số điện thoại: <?php echo $result['tel']; ?></div>
                                <div id="customer_email" data-email="<?php echo $result['email']; ?>">Email: <?php echo $result['email']; ?></div>
                            </td>
                            <td>
                                <div>Phòng: <?php echo $result['name']; ?></div>
                                <div>Giá: <?php echo $result['price']; ?></div>
                                <div><span class="text-decoration-underline" style="font-weight: 900">Tổng:</span> <?php echo $result['price']; ?></div>
                            </td>
                            <td>
                                <div>Ngày vào: <?php echo $result['arrive']; ?></div>
                                <div>Ngày trả: <?php echo $result['quit']; ?></div>
                                <div><span class="text-decoration-underline" style="font-weight: 900">Tình trạng:</span>
                                    <?php
                                        if($result['session'] == 1 && $result['done_session'] == 0){
                                    ?>
                                            <span class="badge badge-pill badge-info" id="badge_receive">Đã nhận</span>
                                    <?php }else if($result['session'] == 0 && $result['done_session'] == 1){ ?>
                                            <span class="badge badge-pill badge-success" id="badge_receive">Đã trả</span>
                                    <?php }else if($result['session'] == 0 && $result['done_session'] == 0){ ?>
                                            <span class="badge badge-pill badge-warning" id="badge_receive">Chưa nhận</span>
                                    <?php } ?>
                                </div>
                                <div></div>
                            </td>
                            <td>
                            <!-- NHẬN/TRẢ PHÒNG -->
                            <?php
                                if($result['session'] == 0 && $result['done_session'] == 0){ //Chưa nhận phòng, cũng không có trả phòng
                            ?>
                                    <button class="btn btn-outline-primary btn-same text-start mb-2 button_receive" id="receive"><i class="far fa-check-circle"></i> Xác nhận nhận phòng</button> </br>
                                    <button class="btn btn-outline-primary btn-same text-start mb-2 button_leave" id="leave" disabled><i class="far fa-check-circle"></i> Xác nhận trả phòng</button> </br>
                            <?php }else if($result['session'] == 1 && $result['done_session'] == 0){ //Đã nhận phòng, đang trong quá trình dùng?> 
                                    <button class="btn btn-danger btn-same text-start mb-2 button_receive" id="undo_receive"><i class="far fa-times-circle"></i> Huỷ nhận phòng</button> </br>
                                    <button class="btn btn-outline-primary btn-same text-start mb-2 button_leave" id="leave"><i class="far fa-check-circle"></i> Xác nhận trả phòng</button> </br>
                            <?php }else if($result['session'] == 0 && $result['done_session'] == 1){ //Dùng xong, đã trả phòng và muốn huỷ trả phòng?>
                                    <button class="btn btn-outline-primary btn-same text-start mb-2 button_receive" id="receive" disabled><i class="far fa-check-circle"></i> Xác nhận nhận phòng</button> </br>
                                    <button class="btn btn-danger btn-same text-start mb-2 button_leave" id="undo_leave"><i class="far fa-check-circle"></i> Huỷ trả phòng</button> </br>
                            <?php } ?>
                               
                            <!-- HUỶ ĐẶT PHÒNG -->
                                <button class="btn btn-outline-danger btn-same text-start" id="undo_book"><i class="fas fa-reply"></i> Thu hồi phòng</button>
                            </td>
                        </tr>
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

<script>
    function del(){
        return confirm("Do you want to delete this room?")
    }
</script>
<script src="ajax/room/approve.js"></script>

<style>
    .btn-same{
        min: 200px;
        font-size: 0.8rem;
    }

    
</style>