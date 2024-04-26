<?php
    $ac = 0;
    if(isset($_GET['id'])){
        $ac = 1;
    }else{
        $ac = 2;
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $room = new room();
        $result = $room->getRoomID($id);
        $info = $result->fetch();
        $name = $info['name'];
        $price = $info['price'];
        $kind_id = $info['kind_id'];
        $sale = $info['sale'];
        $status_id = $info['status_id'];
        $img = $info['img'];
    }
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <?php
        if($ac == 2){
            echo "<h1 class='h3 mb-2 text-gray-800'>Create Anew Room View</h1>";
        }else{
            echo "<h1 class='h3 mb-2 text-gray-800'>Room Updating View</h1>";
        }
    ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <span class="m-0 font-weight-bold text-primary">Table Room</span>
            <a class="btn m-0 font-weight-bold btn-primary" href="admin_index.php?action=admin_room_list">Back to
                List</a>
        </div>
        <div class="card-body d-flex justify-content-center">
            <div class="card" style="width: 70%;">
                <div class="card-body">
                    <?php
                        if($ac == 2){
                            echo "<form action='admin_index.php?action=admin_room_list&act=create_action' enctype='multipart/form-data' id='roomForm' method='post'>";
                        }else{
                            echo "<form action='admin_index.php?action=admin_room_list&act=update_action' enctype='multipart/form-data' id='roomForm' method='post'>";
                        }
                    ?>
                    <div id="success_message"></div>
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <label for="id">ID</label>
                            <input type="number" class="form-control" value="<?php echo $id; ?>" name="id" id="id" readonly>
                            <div class="row d-flex justify-content-between">
                                <div>
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="<?php if(isset($name)) echo $name; ?>">
                                    <small id="name_error"
                                        class="text-danger"></small>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-between">
                                <div>
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" name="price" id="price"
                                        value="<?php if(isset($price)) echo $price; ?>">
                                    <small id="price_error"
                                        class="text-danger"></small>
                                </div>
                                <div>
                                    <label for="sale">Sale</label>
                                    <input type="number" class="form-control" name="sale" id="sale"
                                        value="<?php if(isset($sale)) echo $sale; ?>">
                                    <small id="sale_error"
                                        class="text-danger"></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div>
                                <label for="kind">Status</label>
                                <select class="form-select" name="status_id" id="status_id" <?php echo isset($status_id) ? 'readonly' : ''; ?>>
                                    <?php
                                            $selected = -1;
                                            $room = new room();
                                            $status = $room->getStatus();
                                            if(isset($status_id)){
                                                $selected = $status_id;
                                            }
                                            while($set = $status->fetch()):
                                        ?>
                                    <option value="<?php echo $set['status_id']; ?>"
                                        <?php echo $set['status_id'] == $selected ? 'selected' : ''; ?>>
                                        <?php echo $set['name']; ?>
                                    </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div>
                                <label for="kind">Kind</label>
                                <select class="form-select" name="kind" id="kind" <?php echo isset($kind_id) ? 'readonly' : ''; ?>>
                                    <?php
                                            $selected = -1;
                                            $room = new room();
                                            $kind = $room->getKind();
                                            if(isset($kind_id)){
                                                $selected = $kind_id;
                                            }
                                            while($set = $kind->fetch()):
                                        ?>
                                    <option value="<?php echo $set['kind_id']; ?>"
                                        <?php echo $set['kind_id'] == $selected ? 'selected' : ''; ?>>
                                        <?php echo $set['kind_name']; ?>
                                    </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <label for="img">Image</label>
                            <input type="file" class="form-control" name="img" id="img">
                            <?php if(isset($img)): ?>
                                <img src="Content/images/<?php echo $img; ?>" alt="" width="130px" height="130px">
                            <?php endif; ?>
                            <small id="img_error"
                                class="text-danger"></small>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="mt-3 btn btn-primary me-md-2" type="submit" name="submit" id="submitBtn">
                            <?php echo $ac == 1 ? 'Update' : 'Add' ?>
                        </button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<script>
function del() {
    return confirm("Do you want to delete this room");
}

var flag = true;

$(document).on('change','#name',function(){
    
    let value = $(this).val();
    let regex = /^[a-zA-Z\s]+$/;
    //Kiểm tra rỗng
    if(value == ''){
        $('#name_error').html('Must not be empty!');
        flag = true;
    }

    //Kiểm tra độ dài 2 < name < 30
    else if(value.length < 2 || value.length > 30){
        $('#name_error').html('Name must be more than 2 characters and less than 30 characters!');
        flag = true;
    }

    //Kiểm tra kí tự đặc biệt    
    else if(!regex.test(value)){
        $('#name_error').html('Name must not be included special characters and number!');
        flag = true;
    }

    //Đều đúng
    else{
        $('#name_error').html('');
        flag = false;
    }
});

//Kiểm tra giá
$(document).on('change', '#price', function(){
    let value = $(this).val();

    //Kiểm tra rỗng
    if(value == ''){
        $('#price_error').html('Must not be empty!');
        flag = true;
    }

    //Kiểm tra có phải là số
    else if(isNaN(value)){
        $('#price_error').html('Price must be a number!');
        flag = true;
    }

    //Đều ổn
    else{
        $('#price_error').html('');
        flag = false;
    }
});

//Kiểm tra giảm giá
$(document).on('change', '#sale', function(){
    let value = $(this).val();
    var price = parseInt($('#price').val());

    //Kiểm tra rỗng
    if(value == ''){
        $('#sale_error').html('Must not be empty!');
        flag = true;
    }

    //Kiểm tra có phải là số
    else if(isNaN(value)){
        $('#sale_error').html('Sale must be a number!');
        flag = true;
    }

    //Kiểm tra sale thấp hơn price
    else if(value > price){
        $('#sale_error').html('Sale must be lower than price!');
        flag = true;
    }

    //Đều ổn
    else{
        $('#sale_error').html('');
        flag = false;
    }
})

$(document).on('submit','#roomForm', function(){
    if(flag == true){
        event.preventDefault(); //Có cái này để chặn các submit của trình duyệt
        $('#submitBtn').addClass('disabled');
        flag = false; //Chuyển thành false để chặn submit nhiều lần ngoài ý muốn
        this.submit();
    }
})


</script>

<style>
    .disabled:disabled{
        color: #fff;
        pointer-events: none;
        
    }
</style>

