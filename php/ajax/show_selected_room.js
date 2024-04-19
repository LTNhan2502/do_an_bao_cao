$(document).ready(function(){
    var isRequested = false; //Biến kiểm tra xem AJAX đã gửi request chưa
    $(document).on('change', '#select_room', function(){
        var value_id = $(this).val();
        // var name = $(document).find("#name");
        // console.log(value_id);
        $.ajax({
            url: "Controller/admin/admin_room_book.php?act=show_detail",
            method: "GET",
            data: {value_id},
            dataType: "JSON",
            success: function(res){
                console.log(res.id);
                console.log(value_id);
                console.log(res.name);
                console.log(res.img);
                console.log(res.price);
                if(res.id > 0 && res.id != undefined){
                    isRequested = true; 
                    $("#selected_info").show();
                    $("#selected_detail_price").show();
                    $("#selected_message").hide();
                    $("#selected_name").text(res.name);
                    $("#selected_img").attr("src", "Content/images/"+res.img);
                    $("#selected_price").text(+res.price); //Dấu + là để ép chuỗi thành số, như parseInt()
                }else if(res.id == undefined && value_id != 0){
                    isRequested = true;
                    $("#selected_info").hide();
                    $("#selected_detail_price").hide();
                    $("#selected_message").show();
                }else if(res.id == undefined && value_id == 0){
                    isRequested = false;
                    $("#selected_info").hide();
                    $("#selected_detail_price").hide();
                    $("#selected_message").hide();
                }
                // console.log(res.name);
                //Nếu log ra là [{...}] thì cần phải res[0].name
                
            }
        })
    });

    //Kiểm tra nếu AJAX vẫn chưa gửi request thì ẩn các div
    if(isRequested == false){
        $("#selected_info").hide();
        $("#selected_detail_price").hide();
        $("#selected_message").hide();
    };
})