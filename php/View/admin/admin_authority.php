<link rel="stylesheet" href="Content/admin/css/authorize.css">
<div class="containerr">
    <?php
        $rec = new receptionist();
        $admin = new admin();
        $member = $admin->getAllMember();
        $permission = $admin->getPermission();
    ?>
    <h3 class="text-center">Phân Quyền Thành Viên</h3>
    <div class="select-container">
        <div class="form-group">
            <label for="selectEmployee">Chọn Đối Tượng:</label>
            <select class="form-control" id="selectEmployee">
                <option value="0" data-per_id="0">--- Chọn đối tượng ---</option>
                <?php while($set_member = $member->fetch()): ?>
                    <div class="d-none" id="user_type" data-user_type="<?php echo $set_member['user_type']; ?>"></div>
                    <div class="d-none" id="user_id" data-user_id="<?php echo $set_member['user_id']; ?>"></div>
                    <option value="<?php echo $set_member['per_id']; ?>" data-per_id="<?php echo $set_member['per_id']; ?>">
                        <?php echo $set_member['name']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="selectRole">Chọn Nhóm:</label>
            <select class="form-control" id="selectRole">
                <option value="0">--- Chọn cấp quyền ---</option>
                <?php while($set_per = $permission->fetch()): ?>
                    <option value="<?php echo $set_per['per_id']; ?>">
                        <?php echo $set_per['per_name']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Quyền</th>
                <th>Miêu Tả</th>
                <th>Trạng Thái</th>
            </tr>
        </thead>
        <tbody id="permissionsTable">
            <!-- Nội dung bảng sẽ được cập nhật động -->
        </tbody>
    </table>
</div>
<script src="ajax/authority/authorize.js"></script>