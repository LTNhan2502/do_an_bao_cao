<div class="container-fluid">
    <?php
        $room = new room();
        $fmt = new formatter();
        
    ?>
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <span class="m-0 font-weight-bold text-primary">Table Room</span>
            <a class="btn m-0 font-weight-bold btn-primary" href="admin_index.php?action=admin_room_list&act=create_room"><i class="fas fa-plus-circle"></i></a>
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
                            <th>Đơn giá (đ)</th>
                            <th>Giảm giá (đ)</th>
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
                            <th>Đơn giá (đ)</th>
                            <th>Giảm giá (đ)</th>
                            <th>Trạng thái</th>
                            <th class="text-end">Hành động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
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
                                    value="<?php echo $fmt->formatCurrency($set['price']); ?>"
                                    data-id="<?php echo $set['id']; ?>"
                                    data-value="<?php echo $fmt->formatCurrency($set['price']); ?>">
                            </td>
                            <!-- Sale -->
                            <td style="max-width: 120px;">
                                <input type="text" class="form-control" name="sale" id="sale"
                                    value="<?php echo $fmt->formatCurrency($set['sale']); ?>"
                                    data-id="<?php echo $set['id']; ?>"
                                    data-value="<?php echo $fmt->formatCurrency($set['sale']); ?>">
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
                                    <i class="far fa-eye"></i>
                                </button>
                                <button type="button" data-delete_room_id="<?php echo $set['id']; ?>" id="delete_room_id" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>

                            </td>
                        </tr>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $set['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <?php 
                            $id = $set['id'];
                            $detail = $room->getDetailRooms($id);                                            
                            $detail = $detail->fetch();
                            if(isset($detail['id'])){
                        ?> 
                            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Xem chi tiết phòng <span class="detail_name"><?php echo $set['name']; ?></span>
                                        </h5>
                                        <div class="header-buttons ml-auto">
                                            <a href="admin_index.php?action=admin_room_list&act=edit_detail&id=<?php echo $set['id']; ?>" class="btn btn-edit"><i class="far fa-edit"></i></a>
                                            <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                                                <!-- <span aria-hidden="true">&times;</span> -->
                                            </button>
                                        </div>
                                    </div>


                                    <div class="modal-body">                                        
                                        <div class="row" ">
                                            <!-- Ảnh -->
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
                                            <!-- Mét vuông và số lượng người/phòng -->
                                            <div class="col-lg-4">
                                                <div class="row d-flex justify-content-between">
                                                    <h4>Thông tin sơ bộ</h4>
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
                                                        <!-- Tiện ích -->
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

                                                        <!-- Yêu cầu -->
                                                        <h4>Yêu cầu</h4>
                                                        <?php  
                                                            $reqs = $detail['requirement'];
                                                            $req = explode(" - ", $reqs);
                                                            $set_req = count($req);    
                                                        ?>
                                                            <ul>
                                                                <?php for($i = 0; $i < $set_req; $i++): ?>
                                                                    <li><?php echo $req[$i]; ?></li>
                                                                <?php endfor; ?>
                                                            </ul>
                                                        <hr>

                                                        <!-- Mô tả -->
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
                                                                echo "Khởi điểm từ <span style='color: rgb(255, 94, 31);'>".$fmt->formatCurrency($detail['sale'])."</span> đ/phòng/đêm";
                                                            ?>
                                                            <a class="btn btn-primary" width=""100% href="admin_index.php?action=admin_room_book">Chọn phòng này</a>
                                                        </div>                                               
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }else{ ?>
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xem chi tiết phòng <span class="detail_name"><?php echo $set['name']; ?></span></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row parent text-center">
                                            <h5 class="before-open-h5 text-center">Chưa có thông tin chi tiết của phòng này</h5>
                                            <h5 class="after-open-h5 hide">Thêm mới thông tin chi tiết cho phòng <?php echo $set['name']; ?></h5>
                                            <span class="open-btn">
                                                <a href="admin_index.php?action=admin_room_list&act=create_detail&id=<?php echo $set['id']; ?>" class="btn btn-primary open-create-detail"><i class="fas fa-plus-circle"></i></a>
                                            </span>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- End Modal -->
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


<script src="ajax/room/status.js"></script>
<script src="ajax/room/detail_modal.js"></script>
<script>
    $(document).ready(function(){        
        $(document).on('click',"#delete_room_id", function(){
            let delete_room_id = $(this).closest('tr').find('#id').data("id");
            Swal.fire({
                title: "Xoá phòng này?",
                text: "Sau khi xoá phòng có thể vào Khôi phục để xem!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes!"
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "Controller/admin/admin_room_list.php?act=delete_room",
                        method: "POST",
                        data: {delete_room_id},
                        dataType: "JSON",
                        success: function(res){
                            if(res.status == 'success'){
                                Swal.fire({                                    
                                    title: "Xoá phòng thành công!",
                                    text: res.message,
                                    icon: "success",
                                    timer: 900,
                                    timerProgressBar: true
                                });
                                setTimeout(function(){
                                    window.location.reload();
                                }, 930)
                            }else{
                                Swal.fire({                                    
                                    title: "Xoá phòng thất bại!",
                                    text: res.message,
                                    icon: "error",
                                    timer: 3200,
                                    timerProgressBar: true
                                });                           
                            }
                        },
                        error: function(){
                            Swal.fire({                                
                                title: "Lỗi!",
                                text: "Có lỗi xảy ra!",
                                icon: "error",
                                timer: 3200,
                                timerProgressBar: true
                            });
                        }
                    })
                }
            });
        })
    })
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

    .image-small{
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

    .hide{
        display: none;
    }

    .show{
        display: block;
    }

    .modal-header {
        display: flex;
        align-items: center;
    }

    .header-buttons {
        display: flex;
        align-items: center;
    }

    .btn-edit i,
    .btn-close span {
        font-size: 1.5em; /* Tăng kích thước font */
    }

    .btn-edit,
    .btn-close {
        padding: 0.5em; /* Thêm padding để làm cho nút lớn hơn */
    }

    .btn-edit:hover{
        color: rgb(64, 64, 64);
    }



    /* small{
        margin: -15px 0 15px 0;
    } */
</style>