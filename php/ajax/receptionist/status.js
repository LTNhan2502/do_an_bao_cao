$(document).ready(function(){
    let error_empty = 'Không được để trống!';
    let error_special = 'Không được có kí tự đặc biệt!';
    let error_number = 'Không được có kí tự số!';
    let error_length = 'Độ dài kí tự từ 2-45!';
    // //Lấy thời gian yyyy-mm-dd hh:ii:ss
    // function getLocalTimeString() {
    //     const now = new Date();
    //     const year = now.getFullYear();
    //     const month = String(now.getMonth() + 1).padStart(2, '0'); // Tháng từ 0-11 nên cần +1
    //     const day = String(now.getDate()).padStart(2, '0');
    //     const hours = String(now.getHours()).padStart(2, '0');
    //     const minutes = String(now.getMinutes()).padStart(2, '0');
    //     const seconds = String(now.getSeconds()).padStart(2, '0');
    
    //     return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
    // }
    //Vừa nhập vừa định dạng
    function formatCurrency(number) {
        const formatter = new Intl.NumberFormat('vi-VI', {
            numberStyle: 'decimal',
            maximumFractionDigits: 2,
        });      
        return formatter.format(parseFloat(number));
    }
    //Function chứa sweetalert để hiện thông báo khi thay đổi giá trị của input
    function SweetAlrt(name_error){
        return Swal.fire({                         
            title: "Thất bại!",
            text: name_error,
            icon: "error",
            timer: 3200,
            timerProgressBar: true
        });
    }
      
    let value = ['#rec_bonus', '#rec_fine', '#rec_salary'];
    for(let i = 0; i < value.length; i++ ){
        $(document).on('input',value[i], function() {
            let number_input = $(this).val().replace(/[^0-9]/g, ""); // Lấy giá trị hiện tại của ô input và loại bỏ các ký tự không phải số
            // const formattedNumber = new Intl.NumberFormat('vi-VI', {
            //     numberStyle: 'decimal',
            //     maximumFractionDigits: 2,
            // }).format(parseFloat(number_input)); // Định dạng giá trị theo chuẩn VND
    
            // Cập nhật giá trị ô input với giá trị đã định dạng
            $(this).val(formatCurrency(number_input));
        });
    }
    //Chỉnh sửa rec_name
    $(document).on('change', '#rec_name', function(){
        let $input = $(this); // Lưu trữ tham chiếu đến phần tử input
        let id = $(this).data('rec_id');
        let name_value  =$(this).val();
        let prevName = $input.data("rec_value"); //Dùng $input để khi đem xuống AJAX không bị lỗi
        let action = "update_name";
        let regex_name_special = /[~!@#$%^&*()_+`\-={}[\]:;"'<>,.?/\\|]/;
        let regex_name_number = /\d/;

        //Kiểm tra trống
        if(name_value == '' && name_value.trim() == ''){
            SweetAlrt(error_empty);
            $input.val(prevName); //Quay lại giá trị cũ
            return;
        }
        //Kiểm tra kí tự đặc biệt
        else if(regex_name_special.test(name_value)){
            SweetAlrt(error_special);
            $input.val(prevName);
            return;
        }
        //Kiểm tra số
        else if(regex_name_number.test(name_value)){
            SweetAlrt(error_number);
            $input.val(prevName);
            return;
        }
        //Kiểm tra độ dài phải từ 2-45
        else if(name_value.length < 2 || name_value.length > 45){
            SweetAlrt(error_length);
            $input.val(prevName);
            return;
        }
        //Đều ổn
        else{
            $.ajax({
                url: 'Controller/admin/admin_rec_list.php?act=update_name',
                method: "POST",
                data: {
                    id,
                    name_value,
                    action
                },
                dataType: "JSON",
                success: function(res){
                    if(res.status == 'success'){
                        Swal.fire({
                             
                            title: "Thành công!",
                            text: "Thay đổi thành công!",
                            icon: "success",
                            timer: 900,
                            timerProgressBar: true
                        });
                        $(".detail_rec_name").html(name_value);
                    }else if(res.status == 'fail'){
                        Swal.fire({
                             
                            title: "Thất bại!",
                            text: "Thay đổi thất bại! Kiểm tra lại!",
                            icon: "error",
                            timer: 3000,
                            timerProgressBar: true
                        });
                    }else if(res.status == 'name'){
                        Swal.fire({
                             
                            title: "Thất bại!",
                            text: res.message,
                            icon: "error",
                            timer: 3000,
                            timerProgressBar: true
                        });
                        $input.val(prevName); //Quay lại giá trị cũ
                    }else{
                        Swal.fire({
                             
                            title: "Thất bại!",
                            text: "Thay đổi thất bại!",
                            icon: "error",
                            timer: 3000,
                            timerProgressBar: true
                        });
                    }
                },
                error: function(){
                    Swal.fire({
                         
                        title: "Thất bại!",
                        text: "Lỗi khác ở hệ thống, CSDL, connect, đường dẫn",
                        icon: "error",
                        timer: 3200,
                        timerProgressBar: true
                    })
                }
            })
        }
    });
    //Chỉnh sửa chức vụ
    $(document).on('change', '#part', function() {
        let rec_part = $(this).val();
        let rec_id = $(this).find(":selected").data('rec_id'); //Lấy ra data-id của option đang chọn thuộc rec_id của nv nào
        let act = $(this).find(":selected").data('part_act');
        $.ajax({
            url: 'Controller/admin/admin_rec_list.php?act='+act,
            method: 'POST',
            data: {rec_id, rec_part},
            dataType: "JSON",
            success: function(res){ 
                console.log(res);
                if(res.status == "success"){               
                    Swal.fire({
                         
                        title: "Thành công",
                        text: "Thay đổi thành công!",
                        icon: "success",
                        timer: 900,
                        timerProgressBar: true
                    });                
                }else{
                    Swal.fire({
                         
                        title: "Thất bại",
                        text: "Thay đổi thất bại! Kiểm tra lại",
                        icon: "error",
                        timer: 2500,
                        timerProgressBar: true
                    })
                }
            },
            error: function(){
                Swal.fire({
                     
                    title: "Thất bại!",
                    text: "Lỗi khác ở hệ thống, connect, CSDL",
                    icon: "error",
                    timer: 3000,
                    timerProgressBar: true
                });
            }
        })
    });

    //Chỉnh sửa ca làm việc
    $(document).on('change', '#shift', function() {
        let rec_shift = $(this).val();
        let rec_id = $(this).find(":selected").data('rec_id'); //Lấy ra data-id của option đang chọn thuộc rec_id của nv nào
        let act = $(this).find(":selected").data('shift_act');
        $.ajax({
            url: 'Controller/admin/admin_rec_list.php?act='+act,
            method: 'POST',
            data: {rec_id, rec_shift},
            dataType: "JSON",
            success: function(res){ 
                console.log(res);
                if(res.status == "success"){               
                    Swal.fire({                         
                        title: "Thành công",
                        text: "Thay đổi thành công!",
                        icon: "success",
                        timer: 900,
                        timerProgressBar: true
                    });                
                }else if(res.status == 'fail_timeWork'){
                    Swal.fire({                         
                        title: "Thất bại",
                        text: res.message,
                        icon: "error",
                        timer: 3200,
                        timerProgressBar: true
                    });
                }else{
                    Swal.fire({                         
                        title: "Thất bại",
                        text: res.message,
                        icon: "error",
                        timer: 3200,
                        timerProgressBar: true
                    })
                }
            },
            error: function(){
                Swal.fire({
                     
                    title: "Thất bại!",
                    text: "Lỗi khác không xác định",
                    icon: "error",
                    timer: 3000,
                    timerProgressBar: true
                });
            }
        })
    });

    //Chỉnh sửa rec_tel
    $(document).on('change', '#rec_tel', function(){
        let $input = $(this); // Lưu trữ tham chiếu đến phần tử input
        let id = $(this).data('rec_id');
        let tel_value  =$(this).val();
        let prev_tel = $input.data("rec_value"); //Dùng $input để khi đem xuống AJAX không bị lỗi
        $.ajax({
            url: 'Controller/admin/admin_rec_list.php?act=update_tel',
            method: "POST",
            data: {
                id,
                tel_value,
            },
            dataType: "JSON",
            success: function(res){
                if(res.status == 'success'){
                    Swal.fire({
                         
                        title: "Thành công!",
                        text: "Thay đổi thành công!",
                        icon: "success",
                        timer: 900,
                        timerProgressBar: true
                    });
                }else if(res.status == 'fail'){
                    Swal.fire({
                         
                        title: "Thất bại!",
                        text: "Thay đổi thất bại! Kiểm tra lại!",
                        icon: "error",
                        timer: 3000,
                        timerProgressBar: true
                    });
                    $input.val(prev_tel);
                }else if(res.status == 'tel'){
                    Swal.fire({
                         
                        title: "Thất bại!",
                        text: res.message,
                        icon: "error",
                        timer: 3000,
                        timerProgressBar: true
                    });
                    $input.val(prev_tel); //Quay lại giá trị cũ
                }else{
                    Swal.fire({
                         
                        title: "Thất bại!",
                        text: "Thay đổi thất bại!",
                        icon: "error",
                        timer: 3000,
                        timerProgressBar: true
                    });
                }
            },
            error: function(){
                Swal.fire({
                     
                    title: "Thất bại!",
                    text: "Lỗi khác không xác định!",
                    icon: "error",
                    timer: 3200,
                    timerProgressBar: true
                })
            }
        })
    });

    //Chỉnh sửa rec_email
    $(document).on('change', '#rec_email', function(){
        let $input = $(this); // Lưu trữ tham chiếu đến phần tử input
        let id = $(this).data('rec_id');
        let email_value  =$(this).val();
        let prev_email = $input.data("rec_value"); //Dùng $input để khi đem xuống AJAX không bị lỗi
        $.ajax({
            url: 'Controller/admin/admin_rec_list.php?act=update_email',
            method: "POST",
            data: {
                id,
                email_value,
            },
            dataType: "JSON",
            success: function(res){
                if(res.status == 'success'){
                    Swal.fire({
                         
                        title: "Thành công!",
                        text: "Thay đổi thành công!",
                        icon: "success",
                        timer: 900,
                        timerProgressBar: true
                    });
                }else if(res.status == 'fail'){
                    Swal.fire({
                         
                        title: "Thất bại!",
                        text: "Thay đổi thất bại! Kiểm tra lại!",
                        icon: "error",
                        timer: 3000,
                        timerProgressBar: true
                    });
                    $input.val(prev_email);
                }else if(res.status == 'email'){
                    Swal.fire({
                         
                        title: "Thất bại!",
                        text: res.message,
                        icon: "error",
                        timer: 3000,
                        timerProgressBar: true
                    });
                    $input.val(prev_email); //Quay lại giá trị cũ
                }else{
                    Swal.fire({
                         
                        title: "Thất bại!",
                        text: "Thay đổi thất bại!",
                        icon: "error",
                        timer: 3000,
                        timerProgressBar: true
                    });
                }
            },
            error: function(){
                Swal.fire({
                     
                    title: "Thất bại!",
                    text: "Lỗi khác không xác định!",
                    icon: "error",
                    timer: 3200,
                    timerProgressBar: true
                })
            }
        })
    }); 

    //Chỉnh sửa thưởng
    $(document).on('change', '#rec_bonus', function(){
        let $input = $(this); // Lưu trữ tham chiếu đến phần tử input
        let id = $(this).data('rec_id');
        let bonus_value  =$(this).val().replace(/[^0-9]/g, "");
        let prev_bonus = $input.data("rec_value"); //Dùng $input để khi đem xuống AJAX không bị lỗi
        let rec_receive = $input.closest("tr").find("#rec_receive");
        $.ajax({
            url: 'Controller/admin/admin_rec_list.php?act=update_bonus',
            method: "POST",
            data: {
                id,
                bonus_value,
            },
            dataType: "JSON",
            success: function(res){
                if(res.status == 'success'){
                    Swal.fire({                         
                        title: "Thành công!",
                        text: "Thay đổi thành công!",
                        icon: "success",
                        timer: 900,
                        timerProgressBar: true
                    });
                    rec_receive.val(formatCurrency((res.rec_salary.rec_salary*res.rec_salary.rec_factor)+res.rec_salary.rec_bonus-res.rec_salary.rec_fine));
                }else if(res.status == 'fail'){
                    Swal.fire({
                         
                        title: "Thất bại!",
                        text: "Thay đổi thất bại! Kiểm tra lại!",
                        icon: "error",
                        timer: 3000,
                        timerProgressBar: true
                    });
                    $input.val(prev_bonus);
                }else if(res.status == 'bonus'){
                    Swal.fire({                         
                        title: "Thất bại!",
                        text: res.message,
                        icon: "error",
                        timer: 3000,
                        timerProgressBar: true
                    });
                    $input.val(prev_bonus); //Quay lại giá trị cũ
                }else{
                    Swal.fire({                         
                        title: "Thất bại!",
                        text: "Thay đổi thất bại!",
                        icon: "error",
                        timer: 3000,
                        timerProgressBar: true
                    });
                }
            },
            error: function(){
                Swal.fire({                     
                    title: "Thất bại!",
                    text: "Lỗi khác không xác định!",
                    icon: "error",
                    timer: 3200,
                    timerProgressBar: true
                })
            }
        })
    });
    
    //Chỉnh sửa phạt
    $(document).on('change', '#rec_fine', function(){
        let $input = $(this); // Lưu trữ tham chiếu đến phần tử input
        let id = $(this).data('rec_id');
        let fine_value  =$(this).val().replace(/[^0-9]/g, "");
        let prev_fine = $input.data("rec_value"); //Dùng $input để khi đem xuống AJAX không bị lỗi
        let rec_receive = $input.closest("tr").find("#rec_receive");
        $.ajax({
            url: 'Controller/admin/admin_rec_list.php?act=update_fine',
            method: "POST",
            data: {
                id,
                fine_value,
            },
            dataType: "JSON",
            success: function(res){
                if(res.status == 'success'){
                    Swal.fire({                         
                        title: "Thành công!",
                        text: "Thay đổi thành công!",
                        icon: "success",
                        timer: 900,
                        timerProgressBar: true
                    });
                    rec_receive.val(formatCurrency((res.rec_salary.rec_salary*res.rec_salary.rec_factor)+res.rec_salary.rec_bonus-res.rec_salary.rec_fine));
                }else if(res.status == 'fail'){
                    Swal.fire({                         
                        title: "Thất bại!",
                        text: "Thay đổi thất bại! Kiểm tra lại!",
                        icon: "error",
                        timer: 3000,
                        timerProgressBar: true
                    });
                    $input.val(prev_fine);
                }else if(res.status == 'fine'){
                    Swal.fire({
                         
                        title: "Thất bại!",
                        text: res.message,
                        icon: "error",
                        timer: 3000,
                        timerProgressBar: true
                    });
                    $input.val(prev_fine); //Quay lại giá trị cũ
                }else{
                    Swal.fire({
                         
                        title: "Thất bại!",
                        text: "Thay đổi thất bại!",
                        icon: "error",
                        timer: 3000,
                        timerProgressBar: true
                    });
                }
            },
            error: function(){
                Swal.fire({
                     
                    title: "Thất bại!",
                    text: "Lỗi khác không xác định!",
                    icon: "error",
                    timer: 3200,
                    timerProgressBar: true
                })
            }
        })
    });

    //Chỉnh sửa lương
    $(document).on('change', '#rec_salary', function(){
        let $input = $(this); // Lưu trữ tham chiếu đến phần tử input
        let id = $(this).data('rec_id');
        let salary_value  =$(this).val().replace(/[^0-9]/g, "");
        let prev_salary = $input.data("rec_value"); //Dùng $input để khi đem xuống AJAX không bị lỗi
        let rec_receive = $input.closest("tr").find("#rec_receive");
        $.ajax({
            url: 'Controller/admin/admin_rec_list.php?act=update_salary',
            method: "POST",
            data: {
                id,
                salary_value,
            },
            dataType: "JSON",
            success: function(res){
                if(res.status == 'success'){
                    Swal.fire({                         
                        title: "Thành công!",
                        text: "Thay đổi thành công!",
                        icon: "success",
                        timer: 900,
                        timerProgressBar: true
                    });
                    rec_receive.val(formatCurrency((res.rec_salary.rec_salary*res.rec_salary.rec_factor)+res.rec_salary.rec_bonus-res.rec_salary.rec_fine));
                }else if(res.status == 'fail'){
                    Swal.fire({                         
                        title: "Thất bại!",
                        text: "Thay đổi thất bại! Kiểm tra lại!",
                        icon: "error",
                        timer: 3000,
                        timerProgressBar: true
                    });
                    $input.val(prev_salary);
                }else if(res.status == 'salary'){
                    Swal.fire({                         
                        title: "Thất bại!",
                        text: res.message,
                        icon: "error",
                        timer: 3000,
                        timerProgressBar: true
                    });
                    $input.val(prev_salary); //Quay lại giá trị cũ
                }else{
                    Swal.fire({
                         
                        title: "Thất bại!",
                        text: "Thay đổi thất bại!",
                        icon: "error",
                        timer: 3000,
                        timerProgressBar: true
                    });
                }
            },
            error: function(){
                Swal.fire({
                     
                    title: "Thất bại!",
                    text: "Lỗi khác không xác định!",
                    icon: "error",
                    timer: 3200,
                    timerProgressBar: true
                })
            }
        })
    });

    //Chỉnh sửa hệ số
    $(document).on('change', '#rec_factor', function(){
        let $input = $(this); // Lưu trữ tham chiếu đến phần tử input
        let id = $(this).data('rec_id');
        let factor_value  =$(this).val();
        let prev_factor = $input.data("rec_value"); //Dùng $input để khi đem xuống AJAX không bị lỗi
        let rec_receive = $input.closest("tr").find("#rec_receive");
        $.ajax({
            url: 'Controller/admin/admin_rec_list.php?act=update_factor',
            method: "POST",
            data: {
                id,
                factor_value,
            },
            dataType: "JSON",
            success: function(res){
                if(res.status == 'success'){
                    Swal.fire({
                         
                        title: "Thành công!",
                        text: "Thay đổi thành công!",
                        icon: "success",
                        timer: 900,
                        timerProgressBar: true
                    });
                    rec_receive.val(formatCurrency((res.rec_salary.rec_salary*res.rec_salary.rec_factor)+res.rec_salary.rec_bonus-res.rec_salary.rec_fine));
                }else if(res.status == 'fail'){
                    Swal.fire({
                         
                        title: "Thất bại!",
                        text: "Thay đổi thất bại! Kiểm tra lại!",
                        icon: "error",
                        timer: 3000,
                        timerProgressBar: true
                    });
                    $input.val(prev_factor);
                }else if(res.status == 'factor'){
                    Swal.fire({
                         
                        title: "Thất bại!",
                        text: res.message,
                        icon: "error",
                        timer: 3000,
                        timerProgressBar: true
                    });
                    $input.val(prev_factor); //Quay lại giá trị cũ
                }else{
                    Swal.fire({
                         
                        title: "Thất bại!",
                        text: "Thay đổi thất bại!",
                        icon: "error",
                        timer: 3000,
                        timerProgressBar: true
                    });
                }
            },
            error: function(){
                Swal.fire({
                     
                    title: "Thất bại!",
                    text: "Lỗi khác không xác định!",
                    icon: "error",
                    timer: 3200,
                    timerProgressBar: true
                })
            }
        })
    });

    //Xác nhận nhận lương
    $(document).on("click", "#claimSalary", function(){
        let $input = $(this).closest(".col");
        let rec_id = $(this).closest(".modal").find(".d-none").data("rec_id_raw");
        let claim = $input.find("#claimSalary");
        let unClaim = $input.find("#unClaimSalary");
        let badge = $input.find("#badge");
        //Lấy thời gian hiện tại theo định dạng yyyy/mm/dd hh:ii:ss
        let currentTime = getLocalTimeString();
        let input_timeSalary = $input.find("#rec_timeSalary");
        $.ajax({
            url: "Controller/admin/admin_rec_list.php?act=claim_salary",
            method: "POST",
            data: {rec_id},
            dataType: "JSON",
            success: function(res){
                if(res.status == "success"){
                    Swal.fire({
                         
                        title: "Thành công!",
                        text: res.message,
                        icon: "success",
                        timer: 900
                    });                    
                                        
                    claim.addClass("d-none");
                    unClaim.removeClass("d-none");
                    badge.text("Đã nhận");

                    input_timeSalary.val(currentTime);
                    
                }else{
                    Swal.fire({                         
                        title: "Thất bại!",
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
        });
    });

    //Xác nhận huỷ nhận lương
    $(document).on("click", "#unClaimSalary", function(){
        let $input = $(this).closest(".col");
        let rec_id = $(this).closest(".modal").find(".d-none").data("rec_id_raw");
        let claim = $input.find("#claimSalary");
        let unClaim = $input.find("#unClaimSalary");
        let badge = $input.find("#badge");
        let input_timeSalary = $input.find("#rec_timeSalary");

        Swal.fire({
            title: "Huỷ nhận lương?",
            text: "Huỷ nhận lương sẽ xoá mất thời gian nhận lương!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes!"
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "Controller/admin/admin_rec_list.php?act=un_claim_salary",
                    method: "POST",
                    data: {rec_id},
                    dataType: "JSON",
                    success: function(res){
                        if(res.status == "success"){
                            Swal.fire({
                                title: "Thành công!",
                                text: res.message,
                                icon: "success",
                                timer: 900
                            });                    
                            
                            unClaim.addClass("d-none");
                            claim.removeClass("d-none");
                            badge.text("Chưa nhận");

                            input_timeSalary.val("");                            
                        }else{
                            Swal.fire({                                 
                                title: "Thất bại!",
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
                });
            }
        });
    });

    //Xác nhận nhận lương (admin_rec_salary)
    $(document).on("click", "#claimSalary_", function(){
        let $input = $(this).closest("tr");
        let rec_id = $input.find("#rec_id").data("id");
        let claim = $input.find("#claimSalary_");
        let new_id = 'unClaimSalary_'
        $.ajax({
            url: "Controller/admin/admin_rec_list.php?act=claim_salary",
            method: "POST",
            data: {rec_id},
            dataType: "JSON",
            success: function(res){
                if(res.status == "success"){
                    Swal.fire({                         
                        title: "Thành công!",
                        text: res.message,
                        icon: "success",
                        timer: 900
                    });                    
                                        
                    claim.removeClass("btn-primary");
                    claim.addClass("btn-danger");
                    claim.text("Huỷ nhận");
                    claim.attr("id", new_id)
                    
                }else{
                    Swal.fire({                         
                        title: "Thất bại!",
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
        });
    });

    //Xác nhận huỷ nhận lương (admin_rec_salary)
    $(document).on("click", "#unClaimSalary_", function(){
        let $input = $(this).closest("tr");
        let rec_id = $input.find("#rec_id").data("id");
        let unClaim = $input.find("#unClaimSalary_");
        let new_id = 'claimSalary_'

        Swal.fire({
            title: "Huỷ nhận lương?",
            text: "Huỷ nhận lương sẽ xoá mất thời gian nhận lương!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes!"
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "Controller/admin/admin_rec_list.php?act=un_claim_salary",
                    method: "POST",
                    data: {rec_id},
                    dataType: "JSON",
                    success: function(res){
                        if(res.status == "success"){
                            Swal.fire({
                                title: "Thành công!",
                                text: res.message,
                                icon: "success",
                                timer: 900
                            });                    
                            
                            unClaim.removeClass("btn-danger");
                            unClaim.addClass("btn-primary");
                            unClaim.text("Nhận lương");
                            unClaim.attr("id", new_id)                          
                        }else{
                            Swal.fire({                                 
                                title: "Thất bại!",
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
                });
            }
        });
    });
});