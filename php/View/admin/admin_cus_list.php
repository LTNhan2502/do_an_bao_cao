<link rel="stylesheet" href="Content/user/css/room_card.css">
<div class="container-fluid">
    <?php
    $room = new room();
    $fmt = new formatter();
    $rec = new receptionist();
    $cus = new customers();
    $fmt = new formatter();
    $count = $cus->getAllCus()->rowCount(); //Tổng đối tượng
    $limit = 3; //Giới hạn số đối tượng trong 1 trang
    $page = new page();
    $trang = $page->findPage($count, $limit); //Lấy được số trang cần có
    $start = $page->findStart($limit); //Lấy được sản phẩm bắt đầu trong 1 trang
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1; //Lấy được trang hiện tại
    ?>
    <div class="card shadow mb-4">
        <div class="d-none" id="limit" data-limit="<?php echo $limit; ?>"></div>
        <div class="card-header py-3 d-flex justify-content-between">
            <span class="m-0 font-weight-bold text-primary">Table Customers - Danh sách</span>
            <button class="btn m-0 font-weight-bold btn-primary" data-toggle="modal" data-target="#modalCreate">
                <i class="fas fa-plus-circle"></i>
            </button>
            <!-- Modal tạo mới-->
            <div class="modal fade create_rec" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Table Customers - Tạo mới</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form enctype='multipart/form-data' id="createRecForm" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="new_cus">Họ và tên</label>
                                    <input type="text" class="form-control" name="new_cus" id="new_cus">
                                    <small class="text-danger" id="new_cus_error"></small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <small class="text-danger" id="new_all_error"></small>
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Đóng</button>
                                <button type="submit" name="submitRec" id="submitRec"
                                    class="btn btn-primary">Tạo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên khách hàng</th>
                            <th>Email (thành viên)</th>
                            <th>Email (khách)</th>
                            <th>Số điện thoại</th>
                            <th class="text-end">Hành động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên khách hàng</th>
                            <th>Email (thành viên)</th>
                            <th>Email (khách)</th>
                            <th>Số điện thoại</th>
                            <th class="text-end">Hành động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $c = $cus->getAllCusNotDeletedPage($start, $limit);
                            $count = 1;
                            while ($set = $c->fetch()):
                        ?>
                            <tr id="currency">
                                <!-- STT/ID -->
                                <td>
                                    <div id="customer_id" data-id="<?php echo $set['customer_id']; ?>"><?php echo $count; ?>
                                    </div>
                                </td>

                                <!-- Tên khách hàng -->
                                <td>
                                    <input type="text" class="form-control" name="customer_name" id="customer_name"
                                        value="<?php echo $set['customer_name']; ?>"
                                        data-customer_id="<?php echo $set['customer_id']; ?>"
                                        data-customer_value="<?php echo $set['customer_name']; ?>">
                                </td>

                                <!-- Email thành viên -->
                                <td>
                                    <input type="text" class="form-control" name="email" id="email"
                                        value="<?php echo $set['email']; ?>"
                                        data-customer_id="<?php echo $set['customer_id']; ?>"
                                        data-email_value="<?php echo $set['email']; ?>">
                                </td>

                                <!-- Email khách -->
                                <td>
                                    <input type="text" class="form-control" name="email_guest" id="email_guest"
                                        value="<?php echo $set['email_guest']; ?>"
                                        data-customer_id="<?php echo $set['customer_id']; ?>"
                                        data-email_value="<?php echo $set['email_guest']; ?>">
                                </td>

                                <!-- Tel -->
                                <td>
                                    <input type="text" class="form-control" name="tel" id="tel"
                                        value="<?php echo $set['tel']; ?>"
                                        data-customer_id="<?php echo $set['customer_id']; ?>"
                                        data-tel_value="<?php echo $set['tel']; ?>">
                                </td>

                                <!-- Button -->
                                <td class="text-end">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal<?php echo $set['customer_id']; ?>">
                                        <i class="far fa-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" id="soft_delete_btn">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </td>
                            </tr>

                            <!-- Modal xem chi tiết-->
                            <div class="modal fade" id="exampleModal<?php echo $set['customer_id']; ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-fullscreen-lg-down">
                                    <div class="modal-content" style="min-width: 520px;">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Xem thông tin đặt phòng của <span
                                                    class="detail_customer_name"><?php echo $set['customer_name']; ?></span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                <div class="d-none customer_id_raw"
                                                    data-customer_id_raw="<?php echo $set['customer_id']; ?>"></div>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php if (!$set['email']): ?>
                                                <h5>Khách hàng này chưa đăng kí thành viên.</h5>
                                            <?php endif;
                                                if($set['history']){
                                            ?>
                                                <!-- <h6>Đã đặt phòng</h6> -->
                                                <div id="room_cards" class="card-container-">
                                                    <?php
                                                        $history_arr = explode(' - ', $set['history']);
                                                        $history_count = count($history_arr);
                                                        for($i = 0; $i < $history_count; $i++){
                                                            $result = $room->getHistoryRooms($history_arr[$i]);
                                                            if($result){  
                                                                $history_room = $result->fetch();                                                          
                                                    ?>
                                                            <div class="card mb-3 room_card_list">
                                                                <div class="row g-0">
                                                                    <div class="col-md-4">
                                                                        <img src="Content/images/<?php echo $history_room['img']; ?>"
                                                                            class="img-fluid rounded-start" alt="...">
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="card-body">
                                                                            <h6 class="card-title pt-2"><?php echo $history_room['name']; ?></h6>
                                                                            <div class="row">                                                                                
                                                                                <div class="col">
                                                                                    <p><?php echo $history_room['square_meter']; ?>m²</p>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <p><?php echo $history_room['quantity']; ?> khách</p>                                                                                    
                                                                                </div>
                                                                            </div>
                                                                            <p><strong>Tổng: <?php echo $fmt->formatCurrency($history_room['sale']); ?>VND</strong></p>
                                                                            <p>Lúc vào: <?php echo $history_room['booked_arrive']; ?></p>
                                                                            <p>Lúc ra: <?php echo $history_room['booked_quit']; ?></p>
                                                                            <p>Thanh toán: <?php echo $history_room['booked_left_at']; ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    <?php   }
                                                        } 
                                                    ?>
                                                </div>
                                            <?php }else{ ?>
                                                <h6>Khách hàng này chưa đặt phòng.</h6>
                                            <?php } ?>
                                            
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

                <?php 
                    if($trang <= 1){
                        echo '';
                    }else{
                ?>
                <div class="row mt-4">
                    <nav aria-label="Page navigation example mt-3">
                        <?php
                            $link = "admin_index.php?action=admin_cus_list&act=pages&page=[i]";
                            echo page::pagination($trang, $current_page, $link);
                        ?>
                    </nav>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script src="ajax/customer/status.js"></script>
<script src="ajax/customer/restore.js"></script>
<script src="ajax/customer/cus_page.js"></script>
