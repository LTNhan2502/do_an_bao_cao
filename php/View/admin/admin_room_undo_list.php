<div class="container-fluid">
    <h5>Hồ sơ đặt phòng</h5>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php
            $room = new room();
            $result = $room->getUndoRoom();
            while($set = $result->fetch()):
        ?>
        <div class="col">
            <div class="card h-100 shadow bg-body-tertiary rounded">
                <div class="card-body">
                    <h5 class="card-title">ID đặt phòng: <span class="badge badge-primary"><?php echo $set['booked_room_id']; ?></span></h5>
                    <div class="card-text">
                        <div>Khách hàng: <?php echo $set['customer_name']; ?></div>
                        <div>Phòng: <?php echo $set['name']; ?></div>
                        <div>Tổng: <?php echo $set['price']; ?></div>
                        <div class="d-none booked_room_id" data-id="<?php echo $set['booked_room_id']; ?>"></div>
                        <div class="d-none email" data-email="<?php echo $set['email']; ?>"></div>
                        <div class="d-none price" data-price="<?php echo $set['price']; ?>"></div>
                        <div class="d-none arrive" data-arrive="<?php echo $set['arrive']; ?>"></div>
                        <div class="d-none quit" data-quit="<?php echo $set['quit'] ?>"></div>
                        <div class="d-none left" data-left_at="<?php echo $set['left_at']; ?>"></div>
                        <div class="d-none room_name" data-room_name="<?php echo $set['name']; ?>"></div>
                        <div class="d-none customer_name" data-customer_name="<?php echo $set['customer_name']; ?>"></div>
                        <div class="d-none tel" data-tel="<?php echo $set['tel']; ?>"></div>
                        <div>Trạng thái: 
                            <?php
                                if($set['session'] == 1 && $set['done_session'] == 0){
                                    echo "<span class='badge badge-info'>Đã nhận phòng</span>";
                                }else if($set['session'] == 0 && $set['done_session'] == 1){
                                    echo "<span class='badge badge-success'>Đã trả phòng</span>";
                                    echo "<button class='btn btn-primary mt-2 d-block mx-auto' id='do_checkout'>Thanh toán → Xem hoá đơn</button>";
                                }else if($set['session'] == 0 && $set['done_session'] == 0){
                                    echo "<span class='badge badge-warning'>Chưa nhận phòng</span>";
                                };
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <?php endwhile; ?>      
    </div>
</div>

<script src="ajax/room/checkout.js"></script>