<div class="container-fluid">
    <?php
        $room = new room();
        $count = $room->getRooms()->rowCount(); //Tổng đối tượng
        $limit = 6; //Giới hạn số đối tượng trong 1 trang
        $page = new page();
        $trang = $page->findPage($count, $limit); //Lấy được số trang cần có
        $start = $page->findStart($limit); //Lấy được sản phẩm bắt đầu trong 1 trang
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1; //Lấy được trang hiện tại
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <span class="m-0 font-weight-bold text-primary">Table Room</span>
            <a class="btn m-0 font-weight-bold btn-primary" href="admin_index.php?action=admin_room_list&act=create_room">Tạo mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ảnh</th>
                            <th>Loại</th>
                            <th>Tên phòng</th>
                            <th>Đơn giá</th>
                            <th>Giảm giá</th>
                            <th>Trạng thái</th>
                            <th class="text-end">Hành động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Ảnh</th>
                            <th>Loại</th>
                            <th>Tên phòng</th>
                            <th>Đơn giá</th>
                            <th>Giảm giá</th>
                            <th>Trạng thái</th>
                            <th class="text-end">Hành động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $room = new room();
                            $results = $room->getRooms();
                            $count = 1;
                            while($set = $results->fetch()):
                        ?>
                        <tr id="currency">
                            <!-- ID -->
                            <td><div id="id" data-id="<?php echo $set['id']; ?>"><?php echo $count; ?></div></td>
                            <!-- Image -->
                            <td>
                                <img src="Content/images/<?php echo $set['img']; ?>" width="60px" height="60px" alt="">
                            </td>
                            <!-- Kind of room -->
                            <td>
                                <select name="kind" class="form-control" id="kind">
                                    <?php 
                                        $kind = $room->getKind();
                                        while($set_kind = $kind->fetch()):
                                    ?>
                                    <option value="<?php echo $set_kind['kind_id']; ?>" 
                                            <?php echo $set['kind_id'] == $set_kind['kind_id'] ? 'selected' : ''; ?>
                                            data-id="<?php echo $set['id']; ?>"
                                            data-act="<?php echo $set_kind['kind_name']; ?>"
                                        ><?php echo $set_kind['kind_name'] ?>
                                    </option>
                                    <?php endwhile; ?>
                                </select>
                            </td>
                            <!-- Name of room -->
                            <td>  
                                <input type="text" class="form-control" name="name" id="name" 
                                        value="<?php echo $set['name']; ?>"
                                        data-id="<?php echo $set['id']; ?>"
                                        data-value="<?php echo $set['name']; ?>">
                            </td>
                            <!-- Price -->
                            <td style="max-width: 120px;">
                                <input type="text" class="form-control" name="price" id="price"
                                    value="<?php echo $set['price']; ?>"
                                    data-id="<?php echo $set['id']; ?>"
                                    data-value="<?php echo $set['price']; ?>">
                            </td>
                            <!-- Sale -->
                            <td style="max-width: 120px;">
                                <input type="text" class="form-control" name="sale" id="sale"
                                    value="<?php echo $set['sale']; ?>"
                                    data-id="<?php echo $set['id']; ?>"
                                    data-value="<?php echo $set['sale']; ?>">
                            </td>
                            <!-- Status of room -->
                            <td>
                                <select name="status" class="form-control" id="status">
                                    <?php 
                                        $status = $room->getStatus();
                                        while($result = $status->fetch()):
                                    ?>
                                    <option value="<?php echo $result['status_id']; ?>" 
                                            data-id="<?php echo $set['id']; ?>" 
                                            data-act=<?php echo $result['act']; ?>
                                            <?php echo $result['status_id'] == $set['status_id'] ? 'selected' : '' ?>
                                        ><?php echo $result['name']; ?>
                                    </option>
                                    <?php endwhile; ?>
                                </select>
                            </td>
                            <td class="text-end">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $set['id']; ?>">
                                Xem chi tiết
                                </button>

                            </td>
                        </tr>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $set['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">*
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xem chi tiết phòng <span class="detail_name"><?php echo $set['name']; ?></span></h5>
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
                                        <div class="row" ">
                                            <?php if(isset($detail['id'])){ ?>
                                            <div class="col-lg-8 bg-dark card image-container">
                                                <img src="Content/images/<?php echo $detail['img']; ?>" class="image-big m-4" width="90%">
                                                <div class="image-row">
                                                    <?php 
                                                        $item_img = $detail['img_name'];
                                                        $img_arr = explode(' - ', $item_img);
                                                        $img_num = count($img_arr);
                                                        echo "<img src='Content/images/".$detail['img']."' class='image-small mb-4 selected'"; 
                                                        for($i = 0; $i < $img_num; $i++){
                                                            echo "<img src='Content/images/".$img_arr[$i]."' class='image-small mb-4' 
                                                                  data-img-show='Content/images/".$img_arr[$i]."'>"; 
                                                        }
                                                    ?>
                                                </div>                                        
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row d-flex justify-content-between">
                                                    <h4>Thông tin chung</h4>
                                                    <div>
                                                        <ul>
                                                            <li><?php echo " " . $detail['square_meter'] . "m²";?></li>
                                                            <li><?php echo " " . $detail['quantity'] . " khách"; ?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div>
                                                        <hr>
                                                        <h4>Tiện ích</h4>
                                                        <?php  
                                                            $item = $detail['service_name'];
                                                            $service = explode(" - ", $item);
                                                            $set_sv = count($service);    
                                                        ?>
                                                            <ul>
                                                                <?php for($i = 0; $i < $set_sv; $i++): ?>
                                                                    <li><?php echo $service[$i]; ?></li>
                                                                <?php endfor; ?>
                                                            </ul>
                                                        <hr>
                                                        <h4>Về phòng này</h4>
                                                        <?php
                                                            $item_des  = $detail['description'];
                                                            $des = explode(' - ', $item_des);
                                                            $des_num = count($des);
                                                            for($i = 0; $i < $des_num; $i++){
                                                                echo "- $des[$i] </br>";
                                                            }
                                                        ?> 
                                                        <br>
                                                        <div class="shadow-inset-md bg-body-tertiary p-3 text-center fw-bolder fs-6">
                                                            <?php
                                                                echo "Khởi điểm từ <span style='color: rgb(255, 94, 31);'>".$detail['sale']."</span> VNĐ/phòng/đêm";
                                                            ?>
                                                            <a class="btn btn-primary" width=""100% href="admin_index.php?action=admin_room_book">Chọn phòng này</a>
                                                        </div>                                               
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }else{
                                                echo "<h3 class='text-center'>Chưa có thông tin chi tiết của phòng này</h3>";
                                            } ?>
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

<script>
    function del(){
        return confirm("Do you want to delete this room")
    }
</script>

<script src="ajax/room/status.js"></script>
<script src="ajax/currency/number_format"></script>
<script>
    $(document).on("click", ".image-small", function(){
        let image_container = $(this).closest(".image-container");
        let image_big = image_container.find(".image-big");

        //Xoá tất cả selected class trong image-small (mỗi đối tượng mỗi khác)
        image_container.find(".image-small").removeClass("selected");

        //Thêm selected class vào image-small được click
        $(this).addClass("selected");

        //Lấy data từ data-img-show
        let newSrc = $(this).data("img-show");

        //Cập nhật lại đường link của image-big
        image_big.attr("src", newSrc);
    });


</script>
<style>
    .image-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .image-row {
        display: flex;
        justify-content: space-around;
        width: 100%; /* Match width of the parent container */
    }

    .image-big{
        border-radius: 10px;
        max-height: 650px;
    }

    .image-small {
        width: 150px; /* Adjust width of each small image */
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


</style>