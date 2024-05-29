$(document).ready(function(){
    function getLocalTimeString() {
        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0'); // Tháng từ 0-11 nên cần +1
        const day = String(now.getDate()).padStart(2, '0');
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
    
        return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
    }
    //Xác nhận nhận phòng
    $(document).on("click", "#receive", function(){
        let booked_room_id = $(this).closest("tr").find(".booked_room_id").data("id");
        let status = $(this).closest("tr").find("#badge_receive");
        let button_receive = $(this).closest("tr").find(".button_receive");
        let undo_receive_id = "undo_receive"; 
        let disable_leave = $(this).closest("tr").find(".button_leave");
        console.log(button_receive);
        $.ajax({
            url: "Controller/admin/admin_room_check.php?act=approve_arrive",
            method: "POST",
            data: {booked_room_id},
            dataType: "JSON",
            success: function(res){
                if(res.status == "success"){
                    Swal.fire({
                         
                        title: "Thành công!",
                        text: res.message,
                        icon: "success",
                        timer: 900
                    });                    
                    status.html("Đã nhận");
                    status.removeClass('badge-warning');
                    status.addClass('badge-info');

                    button_receive.html("<i class='far fa-times-circle'></i> Huỷ nhận phòng");
                    button_receive.removeClass('btn-outline-primary');
                    button_receive.addClass('btn-danger');
                    button_receive.attr("id", undo_receive_id);

                    if(disable_leave.attr("disabled")){
                        disable_leave.attr("disabled", false);
                    }
                    
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

    //Huỷ nhận phòng
    $(document).on("click", "#undo_receive", function(){
        let booked_room_id = $(this).closest("tr").find(".booked_room_id").data("id");
        let status = $(this).closest("tr").find("#badge_receive");
        let button_receive = $(this).closest("tr").find(".button_receive");
        let receive_id = "receive";
        let disable_leave = $(this).closest("tr").find(".button_leave");
        console.log(button_receive);
        $.ajax({
            url: "Controller/admin/admin_room_check.php?act=undo_approve_arrive",
            method: "POST",
            data: {booked_room_id},
            dataType: "JSON",
            success: function(res){
                if(res.status == "success"){
                    Swal.fire({
                         
                        title: "Thành công!",
                        text: res.message,
                        icon: "success",
                        timer: 900
                    });                    
                    status.html("Chưa nhận");
                    status.removeClass('badge-info');
                    status.addClass('badge-warning');

                    button_receive.html("<i class='far fa-check-circle'></i> Xác nhận nhận phòng");
                    button_receive.removeClass('btn-danger');
                    button_receive.addClass('btn-outline-primary');
                    button_receive.attr("id", receive_id);

                    disable_leave.attr("disabled", true);
                    if(button_receive.attr("disabled")){
                        button_receive.attr("disabled", false);
                    }
                    
                    
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

    //Xác nhận trả phòng
    $(document).on("click", "#leave", function(){
        let booked_room_id = $(this).closest("tr").find(".booked_room_id").data("id");
        let status = $(this).closest("tr").find("#badge_receive");
        let button_receive = $(this).closest("tr").find(".button_receive");
        let button_leave = $(this).closest("tr").find(".button_leave");
        let button_recover = $(this).closest("tr").find(".button_recover");
        let undo_leave_id = "undo_leave"; 
        let receive_id = "receive";
        console.log(button_leave);
        $.ajax({
            url: "Controller/admin/admin_room_check.php?act=approve_leave",
            method: "POST",
            data: {booked_room_id},
            dataType: "JSON",
            success: function(res){
                if(res.status == "success"){
                    Swal.fire({                         
                        title: "Thành công!",
                        text: res.message,
                        icon: "success",
                        timer: 900
                    });
                    status.html("Đã trả");
                    status.removeClass('badge-info');
                    status.addClass('badge-success');

                    button_receive.html("<i class='far fa-check-circle'></i> Xác nhận nhận phòng");
                    button_receive.removeClass('btn-danger');
                    button_receive.addClass('btn-outline-primary');
                    button_receive.attr("id", receive_id);
                    button_receive.attr("disabled", true);

                    button_leave.html("<i class='far fa-times-circle'></i> Huỷ trả phòng");
                    button_leave.removeClass('btn-outline-primary');
                    button_leave.addClass('btn-danger');
                    button_leave.attr("id", undo_leave_id);

                    if(button_recover.attr("disabled")){
                        button_recover.attr("disabled", false);
                    }
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

    //Huỷ trả phòng
    $(document).on("click", "#undo_leave", function(){
        let booked_room_id = $(this).closest("tr").find(".booked_room_id").data("id");
        let status = $(this).closest("tr").find("#badge_receive");
        let button_receive = $(this).closest("tr").find(".button_receive");
        let button_leave = $(this).closest("tr").find(".button_leave");
        let button_recover = $(this).closest("tr").find(".button_recover");
        let leave_id = "leave";
        let undo_receive_id = "undo_receive";
        console.log(button_leave);
        $.ajax({
            url: "Controller/admin/admin_room_check.php?act=undo_approve_leave",
            method: "POST",
            data: {booked_room_id},
            dataType: "JSON",
            success: function(res){
                if(res.status == "success"){
                    Swal.fire({                         
                        title: "Thành công!",
                        text: res.message,
                        icon: "success",
                        timer: 900
                    });                    
                    status.html("Đã nhận");
                    status.removeClass('badge-success');
                    status.addClass('badge-info');

                    button_receive.html("<i class='far fa-times-circle'></i> Huỷ nhận phòng");
                    button_receive.removeClass('btn-outline-primary');
                    button_receive.addClass('btn-danger');
                    button_receive.attr("id", undo_receive_id);
                    if(button_receive.attr("disabled")){
                        button_receive.attr("disabled", false);
                    }

                    button_leave.html("<i class='far fa-check-circle'></i> Xác nhận trả phòng");
                    button_leave.removeClass('btn-danger');
                    button_leave.addClass('btn-outline-primary');
                    button_leave.attr("id", leave_id);

                    button_recover.attr("disabled", true);
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

    //Thu hồi phòng
    $('#undo_book').on('click', function() {
        let booked_room_id = $(this).closest("tr").find(".booked_room_id").data("id");
        let email = $(this).closest("tr").find("#customer_email").data("email");
        let customer_sum = $(this).closest("tr").find(".customer_sum").data("customer_sum");
        let arrive = $(this).closest("tr").find(".arrive").data("arrive");
        let quit = $(this).closest("tr").find(".quit").data("quit");
        //Lấy thời gian hiện tại theo kiểu yyyy-mm-dd hh:ii:ss  
        let left_at = getLocalTimeString();
        
        let room_name = $(this).closest("tr").find(".room_name").data("room_name");
        let customer_name = $(this).closest("tr").find(".customer_name").data("customer_name");
        let tel = $(this).closest("tr").find(".tel").data("tel");
        let customer_booked_id = $(this).closest("tr").find(".customer_booked_id").data("customer_booked_id");
        let $input = $(this);
        // alert(booked_room_id);

        Swal.fire({
            title: "Thu hồi phòng không?",
            text: "Phòng chỉ thu hồi khi khách đã thanh toán và rời đi!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes!"
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "Controller/admin/admin_room_check.php?act=undo_book",
                    method: "POST",
                    data: {booked_room_id},
                    dataType: "JSON",
                    success: function(res){
                        if(res.status == 'success'){
                            //Gửi ajax để thực hiện thanh toán   
                            $.ajax({
                                url: "Controller/admin/admin_room_undo_list.php?act=do_checkout",
                                method: "POST",
                                data: {booked_room_id, customer_booked_id, email, customer_sum, arrive, quit, left_at, room_name, customer_name, tel},
                                dataType: "JSON",
                                success: function(resp){
                                    console.log(resp);
                                    if(resp.status == 'success'){
                                        Swal.fire({                                 
                                            title: "Thu hồi phòng thành công!",
                                            text: resp.message,
                                            icon: "success",
                                            timer: 900,
                                            timerProgressBar: true
                                        }).then(() => {
                                            window.location.reload();
                                        })
                                        
                                    }else{
                                        Swal.fire({                             
                                            title: "Thất bại!",
                                            text: "Xảy ra lỗi trong lúc thực hiện thanh toán!",
                                            icon: "error",
                                            timer: 3200,
                                            timerProgressBar: true
                                        });
                                    }                    
                                },
                                error: function(){
                                    Swal.fire({                         
                                        title: "Lỗi!",
                                        text: "Lỗi không xác định tại khâu thanh toán!",
                                        icon: "error",
                                        timer: 3200,
                                        timerProgressBar: true
                                    });
                                }
                            })                            
                        }else{
                            Swal.fire({                                 
                                title: "Thu hồi phòng thất bại!",
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