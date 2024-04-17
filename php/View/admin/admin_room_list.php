<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <!-- DataTales Example -->
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
                            <th>Image</th>
                            <th>Kind</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Sale</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Kind</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Sale</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $room = new room();
                            $results = $room->getRooms();
                            while($set = $results->fetch()):
                        ?>
                        <tr>
                            <td><div id="id" data-id="<?php echo $set['id']; ?>"><?php echo $set['id']; ?></div></td>
                            <td>
                                <img src="Content/images/<?php echo $set['img']; ?>" width="60px" height="60px" alt="">
                            </td>
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
                            <td>                                
                                <input type="text" class="form-control" name="name" id="name" 
                                        value="<?php echo $set['name']; ?>"
                                        data-id="<?php echo $set['id']; ?>">
                            </td>
                            <td style="max-width: 120px;">
                                <input type="number" class="form-control" name="price" id="price"
                                    value="<?php echo $set['price']; ?>"
                                    data-id="<?php echo $set['id']; ?>">
                            </td>
                            <td style="max-width: 120px;">
                                <input type="number" class="form-control" name="sale" id="sale"
                                    value="<?php echo $set['sale']; ?>"
                                    data-id="<?php echo $set['id']; ?>">
                            </td>
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
                            <td>
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
                                <h5 class="modal-title" id="exampleModalLabel">Xem chi tiết phòng <?php echo $set['name']; ?></h5>
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
                                <div class="row" id="loadDetail">
                                    <div class="col-lg-8">
                                        <div class="image-container">
                                            <img src="Content/images/<?php echo $detail['img']; ?>" class="image-big">
                                            <div class="image-row">
                                                <?php 
                                                    $item_img = $detail['img_name'];
                                                    $img_arr = explode(' - ', $item_img);
                                                    $img_num = count($img_arr);
                                                    for($i = 0; $i < $img_num; $i++){
                                                        echo "<img src='Content/images/".$img_arr[$i]."' class='image-small'";
                                                    }
                                                ?>
                                            </div>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        <?php endwhile; ?>
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

<script src="ajax/detail_modal.js"></script>
<style>
    .image-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .image-big {
        width: 500px; /* Adjust width as needed */
        height: auto;
        margin-bottom: 20px; /* Adjust spacing as needed */
    }

    .image-row {
        display: flex;
        justify-content: space-between;
        width: 100%; /* Match width of the parent container */
    }

    .image-small {
        width: 150px; /* Adjust width of each small image */
        height: auto;
    }

</style>