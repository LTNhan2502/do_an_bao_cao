<div class="container-fluid">
    <?php
        $room = new room();
        $fmt = new formatter();
        $rec = new receptionist();
        $cus = new customers();
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <span class="m-0 font-weight-bold text-primary">Table Customers - Danh sách</span>
            <button class="btn m-0 font-weight-bold btn-primary" data-toggle="modal" data-target="#modalCreate">
                <i class="fas fa-plus-circle"></i>
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên khách hàng</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th class="text-end">Hành động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Tên khách hàng</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th class="text-end">Hành động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $c = $cus->getAllCus();
                            $count = 1;
                            while($set = $c->fetch()):
                        ?>
                        <tr id="currency">
                            <!-- STT/ID -->
                            <td><div id="customer_id" data-id="<?php echo $set['customer_id']; ?>"><?php echo $count; ?></div></td>

                            <!-- Tên khách hàng -->
                            <td>
                                <input type="text" class="form-control" name="customer_name" id="customer_name" 
                                        value="<?php echo $set['customer_name']; ?>"
                                        data-customer_id="<?php echo $set['customer_id']; ?>"
                                        data-customer_value="<?php echo $set['customer_name']; ?>">
                            </td>
                            
                            <!-- Email -->
                            <td>
                                <input type="text" class="form-control" name="email" id="email" 
                                    value="<?php echo $set['email']; ?>"
                                    data-customer_id="<?php echo $set['customer_id']; ?>"
                                    data-email_value="<?php echo $set['email']; ?>">
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $set['customer_id']; ?>">
                                    <i class="far fa-eye"></i>
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-trash"></i>
                                </button>

                            </td>
                        </tr>

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
                                                <label for="new_rec">Tên (Không dấu)</label>
                                                <input type="text" class="form-control" name="new_rec" id="new_rec">
                                                <small class="text-danger" id="new_rec_error"></small>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <small class="text-danger" id="new_all_error"></small>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                            <button type="submit" name="submitRec" id="submitRec" class="btn btn-primary">Tạo</button>
                                        </div>
                                    </form>                                
                                </div>
                            </div>
                        </div>
                        
                        <!-- Modal xem chi tiết-->
                        <div class="modal fade" id="exampleModal<?php echo $set['customer_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">*
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xem thông tin cá nhân <span class="detail_customer_name"><?php echo $set['customer_name']; ?></span></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <div class="d-none customer_id_raw" data-customer_id_raw="<?php echo $set['customer_id']; ?>"></div>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        
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