<div class="container-fluid">
    <?php
        $checkout = new checkout();
        $count = $checkout->getBill()->rowCount(); //Tổng bill
        $limit = 8; //Giới hạn số bill trong 1 trang
        $page = new page();
        $trang = $page->findPage($count, $limit); //Lấy được số trang cần có
        $start = $page->findStart($limit); //Lấy được sản phẩm bắt đầu trong 1 trang
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1; //Lấy được trang hiện tại
        $checkout = new checkout();
        $result = $checkout->getBillPage($start, $limit);
    ?>
    <h5>Danh sách hoá đơn</h5>
    <div class="row row-cols-1 row-cols-md-4 g-4" id="bill_list">
    <?php 
        if($count == 0){
            echo "<h4 class='text-decoration-underline pt-4'>Chưa có thông tin!</h4>";
        }else{
            while ($set = $result->fetch()):
    ?>
        <div class="col">
            <div class="card h-100 shadow bg-body-tertiary rounded">
                <div class="card-body">
                    <h5 class="card-title">ID đặt phòng: <span class="badge badge-primary" style="float: right;"><?php echo $set['booked_room_id']; ?></span></h5>
                    <h5 class="card-title">ID KH: <span class="badge badge-primary" style="float: right;"><?php echo $set['customer_booked_id']; ?></span></h5>
                    <div class="card-text">
                        <div>Khách hàng: <span><?php echo $set['customer_name']; ?></span></div>
                        <div>Phòng: <span><?php echo $set['room_name']; ?></span></div>
                        <div>Tổng: <span><?php echo $set['bill_price']; ?></span></div>
                        <div>Ngày nhận: <span><?php echo $set['bill_arrive']; ?></span></div>
                        <div>Ngày trả: <span><?php echo $set['bill_leave']; ?></span></div>
                        <div>Thanh toán: <span><?php echo $set['bill_checkout_at']; ?></span></div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; } ?>
    </div>
    
    <div class="row mt-4">
        <nav aria-label="Page navigation example mt-3">
            <?php
                $link = "admin_index.php?action=admin_bill_list&act=pages&page=[i]";
                echo page::pagination($trang, $current_page, $link);
            ?>
        </nav>
    </div>
</div>

<script src="ajax/bill/bill_page.js"></script>