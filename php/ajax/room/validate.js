var form = $("#formBook")[0];
//{name, email, tel, from_time, to_time, id}
$("#formBook").on("submit", function(e){
    e.preventDefault();
    if(nameflag || emailflag || telflag || fromflag || toflag){
        $(".checkout_error").html("Hãy nhập đầy đủ các thông tin hợp lệ!");
        console.log(nameflag, emailflag, telflag, fromflag, toflag);
    
    }else if($("#name_user").val() == '' || $("#email_user").val() == '' || 
            $("#tel_user").val() == '' || $("#from").val() == '' || $("#to").val() == ''){
        $(".checkout_error").html("Hãy nhập đầy đủ các thông tin hợp lệ!");
        console.log($("#name_user").val());
    }else{
        $(".checkout_error").html("");
        console.log(nameflag, emailflag, telflag, fromflag, toflag);
        let name = $("#name_user").val();
        let email = $("#email_user").val();
        let tel = $("#tel_user").val();
        
        //from
        var from = $("#from").val();
        var from_arr = from.split("/");
        var from_day = parseInt(from_arr[0]);
        var from_month = parseInt(from_arr[1]) - 1;
        var from_year = parseInt(from_arr[2]);
        var from_time_object = new Date(from_year, from_month, from_day, 14, 0, 0);
        var day_from = from_time_object.getDate();
        var month_from = from_time_object.getMonth() +1;
        var year_from = from_time_object.getFullYear();
        var hour_from = from_time_object.getHours();
        var minute_from = from_time_object.getMinutes();
        var second_from = from_time_object.getSeconds();
        var from_time = `${year_from}-${month_from < 10 ? "0"+month_from : month_from}-${day_from < 10 ? "0"+day_from : day_from} ${hour_from < 10 ? "0"+hour_from : hour_from}:${minute_from < 10 ? "0"+minute_from : minute_from}:${second_from < 10 ? "0"+second_from : second_from}`;
        
        //to
        var to = $("#to").val();
        var to_arr = to.split("/");
        var to_day = parseInt(to_arr[0]);
        var to_month = parseInt(to_arr[1])-1;
        var to_year = parseInt(to_arr[2]);
        var to_time_object = new Date(to_year, to_month, to_day, 12, 0, 0);
        var day_to = to_time_object.getDate();
        var month_to = to_time_object.getMonth() +1;
        var year_to = to_time_object.getFullYear();
        var hour_to = to_time_object.getHours();
        var minute_to = to_time_object.getMinutes();
        var second_to = to_time_object.getSeconds();
        var to_time = `${year_to}-${month_to < 10 ? "0"+month_to : month_to}-${day_to < 10 ? "0"+day_to : day_to} ${hour_to < 10 ? "0"+hour_to : hour_to}:${minute_to < 10 ? "0"+minute_to : minute_to}:${second_to < 10 ? "0"+second_to : second_to}`;
        
        let id = $("#select_room").val();
        $.ajax({
            url: "Controller/admin/admin_room_book.php?act=book_room",
            method: "POST",
            data: new FormData(form),
            contentType: false,
            preocessData: false,
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
                    setTimeout(function(){
                        window.reload();
                    }, 950)
                }else{
                    Swal.fire({
                        title: "Thất bại!",
                        text: res.message,
                        icon: "error",
                        timer: 3200,
                        timerProgressBar: true
                    });
                    setTimeout(function(){
                        window.reload();
                    }, 3270)
                }

            },
            error: function(){
                Swal.fire({
                    title: "Lỗi!",
                    text: "Không thể chỉnh sửa, thêm mới",
                    icon: "error",
                    timer: 3200,
                    timerProgressBar: true
                });
                setTimeout(function(){
                    window.reload();
                },3270)
            }
        })
    }
});