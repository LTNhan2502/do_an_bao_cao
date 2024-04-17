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
                                        <img src="Content/images/<?php echo $detail['img']; ?>" alt="" width="100%">
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="row d-flex justify-content-between">
                                            <h4>Thông tin chung</h4>
                                            <span><i class="fas fa-pencil-ruler fa-lg" style="color: #0d6efd;"></i></i><?php echo " " . $detail['square_meter'] . "m²";?></span>
                                            <span><i class="fas fa-users fa-lg" style="color: #0d6efd";></i><?php echo " " . $detail['quantity'] . " khách"; ?></span>
                                        </div>
                                        <div class="row">
                                            <div>
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