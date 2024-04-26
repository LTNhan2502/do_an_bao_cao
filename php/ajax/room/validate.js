$(document).ready(function(){
    let formStatus = {
        name: false,
        email: false,
        tel: false,
        arrive: false,
        left: false,
    }; // khởi tạo đối tượng để lưu trữ trạng thái của tất cả các phương thức kiểm tra input

    //Kiểm tra name
    $(document).on("change", "#name_user", function(){
        let name = $(this).val();        
        let regex_name = /^[a-zA-Z\s]+$/;

        //Kiểm tra rỗng
        if(name == ''){
            $("#name_user_error").html("Không được để trống!");
            formStatus.name = true;
        }

        //Kiểm tra số kí tự
        else if(name.length < 2 || name.length > 45){
            $("#name_user_error").html("Họ và tên phải từ 2 tới 45 kí tự!");
            formStatus.name = true;
        }

        //Kiểm tra kí tự đặc biệt

        else if(!regex_name.test(name)){
            $("#name_user_error").html("Họ và tên không được có kí tự đặc biệt và số!");
            formStatus.name = true;
        }

        //Đều ổn
        else{
            $("#name_user_error").html('');
            formStatus.name = false;
        }
    });

    //Kiểm tra email
    $(document).on("change", "#email_user", function() {
        let email = $(this).val();
        let regex_email = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        
    
        //Kiểm tra rỗng
        if (email == '') {
            $("#email_user_error").html("Không được để trống!");
            formStatus.email = true;
        }
    
        //Kiểm tra hợp lệ
        else if (!regex_email.test(email)) {
            $("#email_user_error").html("Email không hợp lệ!");
            formStatus.email = true;
        }
    
        //Kiểm tra tồn tại
        else {
            $.ajax({
                url: "Controller/admin/admin_room_book.php?act=check_email",
                method: "POST",
                data: { email },
                success: function(res) {
                    let isExist = (res == 0) ? false : true;
    
                    if (isExist) {
                        $("#email_user_error").html("Email này đã tồn tại!");
                        formStatus.email = true;
                    }
                    //Đều ổn
                    else {
                        $("#email_user_error").html('');
                        formStatus.email = false;
                    }
                }
            });
        }
    });
    

    //Kiểm tra số điện thoại
    $(document).on("change", "#tel_user", function(){
        let tel = $(this).val();
        let tel_slice = tel.slice(0,1);
        console.log(tel.length);

        //Kiểm tra rỗng
        if(tel == ''){
            $("#tel_user_error").html("Không được để trống!");
            formStatus.tel = true;
        }

        //Kiểm tra số
        if(isNaN(tel)){
            $("#tel_user_error").html("Phải là số!");
            formStatus.tel = true;
        }

        //Kiểm tra số hợp lệ
        else if(tel_slice != 0 && tel.length == 10){
            $("#tel_user_error").html("Số điện thoại phải bắt đầu bằng số 0!");
            formStatus.tel = true;
        }   
        else if(tel_slice == 0 && tel.length != 10){
            $("#tel_user_error").html("Số điện thoại phải có 10 số!");
            formStatus.tel = true;
        }     
        else if(tel_slice != 0 && tel.length != 10){
            $("#tel_user_error").html("Số điện thoại không hợp lệ!");
            formStatus.tel = true;
        }

        //Đểu ổn
        else{
            $("#tel_user_error").html("");
            formStatus.tel = false;
        }
    });

    //Kiểm tra thời gian nhận phòng
    $(document).on("change", "#from", function(){
        let time_arrive = $(this).val();

        //Kiểm tra rỗng
        if(time_arrive == ''){
            $("#time_error").html("Không được để trống!");
            formStatus.arrive = true;
        }

        //Đều ổn
        else{
            $("#time_error").html("");
            formStatus.arrive = false;
        }
    });

    //Kiểm tra thời gian trả phòng
    $(document).on("change", "#to", function(){
        let time_Left = $(this).val();

        //Kiểm tra rỗng
        if(time_left == ''){
            $("#time_error").html("Không được để trống!");
            formStatus.left = true;
        }

        //Đều ổn
        else{
            $("#time_error").html("");
            formStatus.left = false;
        }
    });

    $(document).on("click", ".checkout", function(){
        if(formStatus.name == true || formStatus.email == true || 
            formStatus.tel == true || formStatus.arrive == true || formStatus.left == true){
            alert("Hãy nhập đầy đủ thông tin hợp lệ!");
        }else{
            let name = $("#name_user").val();
            let email = $("#email_user").val();
            let tel = $("#tel_user").val();
            
            //from
            let from = $("#from").val();
            let from_arr = from.split("/");
            let from_day = parseInt(from_arr[0]);
            let from_month = parseInt(from_arr[1]) - 1;
            let from_year = parseInt(from_arr[2]);
            let from_time_object = new Date(from_year, from_month, from_day, 14, 0, 0);
            let day_from = from_time_object.getDate();
            let month_from = from_time_object.getMonth() +1;
            let year_from = from_time_object.getFullYear();
            let hour_from = from_time_object.getHours();
            let minute_from = from_time_object.getMinutes();
            let second_from = from_time_object.getSeconds();
            let from_time = `${year_from}-${month_from < 10 ? "0"+month_from : month_from}-${day_from < 10 ? "0"+day_from : day_from} ${hour_from < 10 ? "0"+hour_from : hour_from}:${minute_from < 10 ? "0"+minute_from : minute_from}:${second_from < 10 ? "0"+second_from : second_from}`;
            


            //to
            let to = $("#to").val();
            let to_arr = to.split("/");
            let to_day = parseInt(to_arr[0]);
            let to_month = parseInt(to_arr[1])-1;
            let to_year = parseInt(to_arr[2]);
            let to_time_object = new Date(to_year, to_month, to_day, 12, 0, 0);
            let day_to = to_time_object.getDate();
            let month_to = to_time_object.getMonth() +1;
            let year_to = to_time_object.getFullYear();
            let hour_to = to_time_object.getHours();
            let minute_to = to_time_object.getMinutes();
            let second_to = to_time_object.getSeconds();
            let to_time = `${year_to}-${month_to < 10 ? "0"+month_to : month_to}-${day_to < 10 ? "0"+day_to : day_to} ${hour_to < 10 ? "0"+hour_to : hour_to}:${minute_to < 10 ? "0"+minute_to : minute_to}:${second_to < 10 ? "0"+second_to : second_to}`;
            
            let id = $("#select_room").val();
            $.ajax({
                url: "Controller/admin/admin_room_book.php?act=book_room",
                method: "POST",
                data: {name, email, tel, from_time, to_time, id},
                dataType: "JSON",
                success: function(res){
                    console.log(res);
                    if(res.status == "success"){
                        Swal.fire({
                            title: "Thành công!",
                            text: res.message,
                            icon: "success",
                            timer: 900
                        });
                    }else{
                        Swal.fire({
                            title: "Thất bại!",
                            text: res.message,
                            icon: "error",
                            timer: 3200
                        });
                    }
                },
                error: function(){
                    Swal.fire({
                        title: "Lỗi!",
                        text: "Không thể chỉnh sửa, thêm mới",
                        icon: "error",
                        timer: 3200
                    })
                }
            })
        } 
    });
    
    
})