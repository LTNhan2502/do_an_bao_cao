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
                    <form enctype='multipart/form-data' id='roomForm' method='post'>
                        
                        <div id="success_message"></div>
                        <div class="row">
                            <div class="col-lg-8 col-md-8">
                                <label for="id">ID</label>
                                <input type="number" class="form-control" name="id" id="id" readonly>
                                <div class="row d-flex justify-content-between">
                                    <div>
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name">
                                        <small id="name_error" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-between">
                                    <div>
                                        <label for="price">Price</label>
                                        <input type="text" class="form-control" name="price" id="price">
                                        <small id="price_error" class="text-danger"></small>
                                    </div>
                                    <div>
                                        <label for="sale">Sale</label>
                                        <input type="text" class="form-control" name="sale" id="sale">
                                        <small id="sale_error" class="text-danger"></small>
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
                            <small id="all_error" class="text-danger mt-4 me-md-2"></small>
                            <button class="mt-3 btn btn-primary me-md-2" type="submit"  name="submit" id="submitBtn">
                                Add
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

    $(document).ready(function(){
        var submitBtn = $("#submitBtn");
        var imgValid = false;
        var nameValid = false;
        var priceValid = false;
        var saleValid = false;


        //Kiểm tra file
        $("#img").on("change", function() {
            var file = this.files[0];
            var fileType = file.type;
            var match = ['image/jpeg', 'image/jpg', 'image/png'];
            if (match.indexOf(fileType) < 0) {
                $("#img_error").html("Ảnh phải là jpeg/jpg/png!");
                $("#img").replaceWith($("#img").val('').clone(true));//Xoá ảnh trong input
                imgValid = false; // cập nhật trạng thái của hình ảnh
                return false;
            } else {
                $("#img_error").html("");
                imgValid = true; // cập nhật trạng thái của hình ảnh
            }
        });

        // Kiểm tra name
        $(document).on('change','#name',function(){
            var value = $(this).val();
            var regex = /^[a-zA-Z\s]+$/;

            // Kiểm tra rỗng
            if(value == ''){
                $('#name_error').html('Không được để trống!');
                nameValid = false; 
                return false;            
            }

            // Kiểm tra độ dài 2 < name < 30
            else if(value.length < 2 || value.length > 30){
                $('#name_error').html('Tên phải từ 2 tới 30 kí tự!');
                nameValid = false; 
                return false;
            }

            // Kiểm tra kí tự đặc biệt
            else if(!regex.test(value)){
                $('#name_error').html('Tên không được bao gồm số và kí tự đặc biệt!');
                nameValid = false; 
                return false;
            }

            // Đều đúng
            else{
                $('#name_error').html('');
                nameValid = true; 
            }
            console.log(nameValid);
        });

        // Kiểm tra giá
        $(document).on('change', '#price', function(){
            var value = $(this).val();
            var sale = parseFloat($("#sale").val());

            // Kiểm tra rỗng
            if(value == ''){
                $('#price_error').html('Không được để trống!');
                priceValid = false; 
                return false;
            }

            // Kiểm tra có phải là số
            else if(isNaN(value)){
                $('#price_error').html('Giá phải là một số!');
                priceValid = false; 
                return false;
            }

            // Kiểm tra sale thấp hơn price
            else if(value < sale){
                $('#price_error').html('Giá phải lớn hơn giảm giá!');
                priceValid = false; 
                return false;
            }

            // Đều ổn
            else{
                $('#price_error').html('');
                priceValid = true;
            }
            console.log(priceValid);
        });

        // Kiểm tra giảm giá
        $(document).on('change', '#sale', function(){
            var value = $(this).val();
            var price = parseFloat($('#price').val());

            // Kiểm tra rỗng
            if(value == ''){
                $('#sale_error').html('Không được để trống!');
                saleValid = false; 
                return false;
            }

            // Kiểm tra có phải là số
            else if(isNaN(value)){
                $('#sale_error').html('Giảm giá phải là một số!');
                saleValid = false; 
                return false;
            }

            // Kiểm tra sale thấp hơn price
            else if(value >= price){
                $('#sale_error').html('Giảm giá phải nhỏ hơn giá gốc!');
                saleValid = false; 
                return false;
            }

            // Đều ổn
            else{
                $('#sale_error').html('');
                saleValid = true;
            }
            console.log(saleValid);
        });

        // Update button state based on combined validation status
        // var allValid = $("#name_error").val().trim() === '' &&
        //                 $("#price_error").val().trim() === '' &&
        //                 $("#sale_error").val().trim() === '';
        var form = $("#roomForm")[0]; //Truy cập vào đối tượng DOM
        $("#roomForm").on("submit", function(e){
            e.preventDefault();
            if (!imgValid || !nameValid || !priceValid || !saleValid) { // kiểm tra trạng thái của input
                $("#all_error").html("Hãy nhập đầy đủ thông tin hợp lệ!");
                return false;
            }else if($("#name").val() == '' || $("#price").val() == '' || $("#sale").val() == ''){
                $("#all_error").html("Hãy nhập đầy đủ thông tin hợp lệ!");
            }else{
                $("#all_error").html("");
                console.log(imgValid, nameValid, saleValid, priceValid);
                $.ajax({
                    type: "POST",
                    url: "Controller/admin/admin_room_list.php?act=create_action",
                    dataType: "JSON",
                    data: new FormData(form),
                    contentType: false, //Dùng FormData thì bắt buộc phải có cái này
                    processData: false, //Dùng FormData thì bắt buộc phải có cái này
                    dataType: "JSON",
                    success: function(res){
                        if(res.status == 'success'){
                            Swal.fire({
                                title: 'Thành công!',
                                text: res.message,
                                icon: 'success',
                                timer: 900,
                                timerProgressBar: true
                            });
                            // setTimeout(() => {
                            //     window.location.href = './admin_index.php?action=admin_room_list&act=room_create';
                            // }, 1600);
                        }else{
                            Swal.fire({
                                title: 'Thất bại!',
                                text: res.message,
                                icon: 'error',
                                timer: 3000,
                                timerProgressBar: true
                            });
                            // setTimeout(() => {
                            //     window.location.href = './admin_index.php?action=admin_room_list&act=room_create';
                            // }, 1600);
                        }                    
                    }
                })
            }
            return false;
        });


    });

 
</script>

<style>
    .disabled{
        opacity: 0.65;
        pointer-events: none;        
    }
</style>

