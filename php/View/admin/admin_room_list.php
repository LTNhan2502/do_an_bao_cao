<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <a href="#" class="test btn btn-primary">Test</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <span class="m-0 font-weight-bold text-primary">Table Room</span>
            <a class="btn m-0 font-weight-bold btn-primary" href="admin_index.php?action=admin_room_list&act=create_room">Create anew</a>
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
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $room = new room();
                            $results = $room->getRooms();
                            while($set = $results->fetch()):
                        ?>
                        <tr>
                            <td><?php echo $set['id']; ?></td>
                            <td>
                                <img src="Content/images/<?php echo $set['img']; ?>" width="60px" height="60px" alt="">
                            </td>
                            <td>
                                <select name="kind" class="form-control" id="kind">
                                    <?php 
                                        $kind = $room->getKind();
                                        while($set_kind = $kind->fetch()):
                                    ?>
                                    <option value="<?php echo $set['kind_id']; ?>" <?php echo $set['kind_id'] == $set_kind['kind_id'] ? 'selected' : ''; ?>><?php echo $set_kind['kind_name'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </td>
                            <td><?php echo $set['name']; ?></td>
                            <td><?php echo $set['price']; ?></td>
                            <td><?php echo $set['sale']; ?></td>
                            <td>
                                <select name="status" class="form-control" id="status" name="status">
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
                        </tr>
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

<script>
    
</script>