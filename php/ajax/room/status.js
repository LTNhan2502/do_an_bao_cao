const formatCurrency = require('../currency/number_format');
$(document).ready(function(){
    //Chỉnh sửa name
    $(document).on('change', '#name', function(){
        let $input = $(this); // Lưu trữ tham chiếu đến phần tử input
        let id = $(this).data('id');
        let name_value  =$(this).val();
        let prevName = $input.data("value"); //Dùng $input để khi đem xuống AJAX không bị lỗi
        let action = "update_name";
        $.ajax({
            url: 'Controller/admin/admin_room_list.php?act=update_name',
            method: "POST",
            data: {
                id,
                name_value,
                action
            },
            success: function(res){
                let data = JSON.parse(res);
                if(data.status == 'success'){
                    Swal.fire({
                        title: "Thành công!",
                        text: "Thay đổi thành công!",
                        icon: "success",
                        timer: 900,
                        timerProgressBar: true
                    });
                    $(".detail_name").html(name_value);
                }else if(data.status == 'fail'){
                    Swal.fire({
                        title: "Thất bại!",
                        text: "Thay đổi thất bại! Kiểm tra lại!",
                        icon: "error",
                        timer: 3000,
                        timerProgressBar: true
                    });
                }else if(data.status == 'name'){
                    Swal.fire({
                        title: "Thất bại!",
                        text: data.message,
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
    });

    //Chỉnh sửa price    
    let priceValue = ""; // Lưu giá trị ban đầu của ô input
    $(document).on('input',"#price", function() {
        let price = $(this).val();
        priceValue = $(this).val().replace(/[^0-9]/g, ""); // Lấy giá trị hiện tại của ô input và loại bỏ các ký tự không phải số
        const formattedPrice = formatCurrency(price); // Định dạng giá trị

        // Cập nhật giá trị ô input với giá trị đã định dạng
        $(this).val(formattedPrice);
    });
    $(document).on('change', '#price', function(){
        let $input = $(this); // Lưu trữ tham chiếu đến phần tử input
        let price_value = $(this).val().replace(/[^0-9]/g, "");;
        let sale_value = $(this).closest("tr").find("#sale").val();
        let prevPrice = $input.data('value'); //Dùng $input để khi đem xuống AJAX không bị lỗi
        let id = $(this).data('id');
        
        $.ajax({
            url: 'Controller/admin/admin_room_list.php?act=update_price',
            method: "POST",
            data: {
                price_value,
                id,
                sale_value
            },
            success: function(res){
                let data = JSON.parse(res);
                if(data.status == 'success'){
                    Swal.fire({
                        title: "Thành công!",
                        text: "Thay đổi thành công!",
                        icon: "success",
                        timer: 900,
                        timerProgressBar: true
                    });
                }else if(data.status == 'price'){
                    Swal.fire({
                        title: "Thất bại!",
                        text: data.message,
                        icon: "error",
                        timer: 3200,
                        timerProgressBar: true
                    });
                    $input.val(prevPrice); //Quay lại giá trị cũ
                    // $(this).val(); //Sai vì this sẽ trỏ tới AJAX chứ không còn trỏ tới bên input html, log sẽ ra undefined
                    console.log(prevPrice);
                }else{
                    Swal.fire({
                        title: "Thất bại!",
                        text: "Thay đổi thất bại! Kiểm tra lại!",
                        icon: "error",
                        timer: 3200,
                        timerProgressBar: true
                    });
                }
            },
            error: function(){
                Swal.fire({
                    title: "Thất bại!",
                    text: "Lỗi khác ở hệ thống, connect, CSDL, đường dẫn",
                    icon: "error",
                    timer: 3000,
                    timerProgressBar: true
                });
            }
        })
    });

    //Chỉnh sửa sale
    $(document).on('change', '#sale', function(){
        let $input = $(this); // Lưu trữ tham chiếu đến phần tử input
        let sale_value = $(this).val();
        let id = $(this).data('id');
        let price_value = $(this).closest('tr').find("#price").val(); //Tìm tới chỗ có id là price gần nhất trong thẻ tr
        let prevSale = $input.data("value"); //Dùng $input để khi đem xuống AJAX không bị lỗi
        $.ajax({
            url: 'Controller/admin/admin_room_list.php?act=update_sale',
            method: "POST",
            data: {
                sale_value,
                id,
                price_value
            },
            success: function(res){
                let data = JSON.parse(res);
                if(data.status == 'success'){
                    Swal.fire({
                        title: "Thành công!",
                        text: "Thay đổi thành công!",
                        icon: "success",
                        timer: 900
                    });
                }else if(data.status == 'sale'){
                    Swal.fire({
                        title: "Thất bại!",
                        text: data.message,
                        icon: "error",
                        timer: 3200,
                        timerProgressBar: true
                    });
                    $input.val(prevSale); //Quay lại giá trị cũ
                    console.log(prevSale);
                }else{
                    Swal.fire({
                        title: "Thất bại!",
                        text: "Thay đổi thất bại! Kiểm tra lại!",
                        icon: "error",
                        timer: 3200,
                        timerProgressBar: true
                    });
                }
            },
            error: function(){
                Swal.fire({
                    title: "Thất bại!",
                    text: "Lỗi khác ở hệ thống, connect, CSDL, đường dẫn",
                    icon: "error",
                    timer: 3000,
                    timerProgressBar: true
                });
            }
        })
    });

    //Chỉnh sửa status
   $(document).on('change', '#status', function() {
        let status_id = $(this).val();
        let id = $(this).find(":selected").data('id'); //Lấy ra data-id của option đang chọn
        let act = $(this).find(":selected").data('act');
        $.ajax({
            url: 'Controller/admin/admin_room_list.php?act='+act,
            method: 'POST',
            data: {status_id, id},
            success: function(res){ 
                let data = JSON.parse(res) //Vì res đang ở dạng chuỗi JSON chứ không phải là JSON thật sự nên phải parse
                console.log(data);
                if(data.status == "success"){               
                    Swal.fire({
                        title: "Thành công",
                        text: "Thay đổi thành công!",
                        icon: "success",
                        timer: 900
                    });                
                }else{
                    Swal.fire({
                        title: "Thất bại",
                        text: "Thay đổi thất bại! Kiểm tra lại",
                        icon: "error",
                        timer: 2500
                    })
                }
            },
            error: function(){
                Swal.fire({
                    title: "Thất bại!",
                    text: "Lỗi khác ở hệ thống, connect, CSDL",
                    icon: "error",
                    timer: 3000
                });
            }
        })
   });

   //Chỉnh sửa kind
   $(document).on('change', '#kind', function(){
        let kind_id = $(this).val();
        let id = $(this).find(":selected").data("id");
        let kind_name = $(this).find(":selected").data("act");    
        $.ajax({
            url: "Controller/admin/admin_room_list.php?act="+kind_name,
            method: "POST",
            data: {
                kind_id,
                id,
                kind_name
            },
            success: function(res){
                let data = JSON.parse(res);
                console.log(data);
                if(data.status == "success"){
                    Swal.fire({
                        title: "Thành công!",
                        text: "Thay đổi thành công!",
                        icon: "success",
                        timer: 900
                    });
                }else{
                    Swal.fire({
                        title: "Thất bại!",
                        text: "Thay đổi không thành công! Kiểm tra lại!",
                        icon: "error",
                        timer: 2500
                    });
                }
            },
            error: function(){
                Swal.fire({
                    title: "Lỗi",
                    text: "Lỗi khác ở hệ thống, connect, CSDL!",
                    icon: "error",
                    timer: 3000
                });
            }
        })
   });

   
})