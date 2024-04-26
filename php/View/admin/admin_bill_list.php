<div class="container-fluid">
    <h5>Danh sách hoá đơn</h5>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php
            $checkout = new checkout();
            $result = $checkout->getBill();
            while($set = $result->fetch()):
        ?>
        <div class="col">
            <div class="card h-100 shadow bg-body-tertiary rounded">
                <div class="card-body">
                    <h5 class="card-title">ID đặt phòng: <span class="badge badge-primary"><?php echo $set['booked_room_id']; ?></span></h5>
                    <div class="card-text">
                        <div>Khách hàng: <?php echo $set['customer_name']; ?></div>
                        <div>Phòng: <?php echo $set['room_name']; ?></div>
                        <div>Tổng: <?php echo $set['bill_price']; ?></div>
                        <div>Ngày nhận: <?php echo $set['bill_arrive']; ?> 
                            <?php
                                // if($set['session'] == 1 && $set['done_session'] == 0){
                                //     echo "<span class='badge badge-info'>Đã nhận phòng</span>";
                                // }else if($set['session'] == 0 && $set['done_session'] == 1){
                                //     echo "<span class='badge badge-success'>Đã trả phòng</span>";
                                //     echo "<button class='btn btn-primary mt-2 d-block mx-auto'>Thanh toán → Xem hoá đơn</button>";
                                // }else if($set['session'] == 0 && $set['done_session'] == 0){
                                //     echo "<span class='badge badge-warning'>Chưa nhận phòng</span>";
                                // };
                            ?>
                        </div>
                        <div>Ngày trả: <?php echo $set['bill_leave']; ?></div>
                        <div>Thanh toán vào: <?php echo $set['bill_checkout_at']; ?></div>
                    </div>
                </div>
            </div>
        </div>  
        <?php endwhile; ?>      
    </div>
</div>