<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <span class="m-0 font-weight-bold text-primary">Table Room - Khôi phục</span>
        </div>
        <div class="card-body">
        <?php
            $room = new room();
            $fmt = new formatter();
            $deleted_room = $room->getDeleteRooms();
            $rowCount = $deleted_room->rowCount();
        ?>
            <div class="table-responsive">
            <?php
                    if( $rowCount == 0){
                        echo "<h4 class='text-decoration-underline'>Chưa có phòng nào bị xoá!</h4>";
                    }else{
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Loại</th>
                            <th>Tên phòng</th>
                            <th>Đơn giá (đ)</th>
                            <th>Giảm giá (đ)</th>
                            <th class="text-end">Hành động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Loại</th>
                            <th>Tên phòng</th>
                            <th>Đơn giá (đ)</th>
                            <th>Giảm giá (đ)</th>
                            <th class="text-end">Hành động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $results = $room->getDeleteRooms();
                            $count = 1;
                            while($set = $results->fetch()):
                        ?>
                        <tr id="currency">
                            <!-- ID -->
                            <td><div id="id" data-id="<?php echo $set['id']; ?>"><?php echo $count; ?></div></td>
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
                                <input disabled type="text" class="form-control" name="name" id="name" 
                                        value="<?php echo $set['name']; ?>"
                                        data-id="<?php echo $set['id']; ?>"
                                        data-value="<?php echo $set['name']; ?>">
                            </td>
                            <!-- Price -->
                            <td style="max-width: 120px;">
                                <input disabled type="text" class="form-control" name="price" id="price"
                                    value="<?php echo $fmt->formatCurrency($set['price']); ?>"
                                    data-id="<?php echo $set['id']; ?>"
                                    data-value="<?php echo $fmt->formatCurrency($set['price']); ?>">
                            </td>
                            <!-- Sale -->
                            <td style="max-width: 120px;">
                                <input disabled type="text" class="form-control" name="sale" id="sale"
                                    value="<?php echo $fmt->formatCurrency($set['sale']); ?>"
                                    data-id="<?php echo $set['id']; ?>"
                                    data-value="<?php echo $fmt->formatCurrency($set['sale']); ?>">
                            </td>
                            <td class="text-end">
                                <button type="button" data-delete_room_id="<?php echo $set['id']; ?>" id="delete_room_id" class="btn btn-secondary">
                                    <i class="fas fa-undo-alt"></i>
                                </button>

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


<!-- /.container-fluid -->

<script>
    function del(){
        return 
    }
</script>

<script src="ajax/room/status.js"></script>
<script>
    $(document).ready(function(){        
        $(document).on('click',"#delete_room_id", function(){
            let restore_room_id = $(this).closest('tr').find('#id').data("id");
            Swal.fire({
                title: "Khôi phục?",
                text: "Khi khôi phục xong, hãy vào Quản lí phòng để xem!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes!"
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "Controller/admin/admin_room_list.php?act=restore_room",
                        method: "POST",
                        data: {restore_room_id},
                        dataType: "JSON",
                        success: function(res){
                            if(res.status == 'success'){
                                Swal.fire({                                    
                                    title: "Khôi phục phòng thành công!",
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
                                    title: "Khôi phục phòng thất bại!",
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
</script>