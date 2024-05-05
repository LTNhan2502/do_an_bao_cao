$(document).ready(function(){
    var isRequested = false; //Biến kiểm tra xem AJAX đã gửi request chưa
    $(document).on('change', '#select_room', function(){
        var value_id = $(this).val();
        // var name = $(document).find("#name");
        // console.log(value_id);
        $("#service_list").empty(); //Để khi đổi sang phòng khác, các thẻ li sẽ không bị ghi đè
        $("#requirement_list").empty();
        $.ajax({
            url: "Controller/admin/admin_room_book.php?act=show_detail",
            method: "GET",
            data: {value_id},
            dataType: "JSON",
            success: function(res){
                //Nếu đối tượng được chọn có thông tin đầy đủ
                if(res.id > 0 && res.id != undefined){
                    isRequested = true; 
                    $("#selected_info").show(300);
                    $("#selected_detail_price").show(300);
                    $("#selected_message").hide(300);
                    $("#selected_name").text(res.name);
                    $("#selected_img").attr("src", "Content/images/"+res.img);
                    $("#selected_price").text(+res.price); //Dấu + là để ép chuỗi thành số, như parseInt()
                    $("#stay-time").text("");
                    $("#selected_sum").text("");
                    $("#from, #to").val('');
                    
                }
                //Nếu đối tượng được chọn là các phòng nhưng chưa có thông tin chi tiết
                else if(res.id == undefined && value_id != 0){
                    isRequested = true;
                    $("#selected_info").hide(300);
                    $("#selected_detail_price").hide(300);
                    $("#selected_message").show(300);
                }
                //Nếu đối tượng được chọn là ---Hãy chọn phòng---
                else if(res.id == undefined && value_id == 0){
                    isRequested = false;
                    $("#selected_info").hide(300);
                    $("#selected_detail_price").hide(300);
                    $("#selected_message").hide(300);
                }
                // console.log(res.name);
                //Nếu log ra là [{...}] thì cần phải res[0].name
                
            }
        });

        //Hiển thị dịch vụ
        $.ajax({
            url: "Controller/admin/admin_room_book.php?act=show_detail",
            method: "GET",
            data: {value_id},
            dataType: "JSON",
            success: function(res){
                var sv_name = res.service_name;
                var sv_arr = sv_name.split(" - ");

                for(let i = 0; i < sv_arr.length; i++){
                    $("#service_list").append('<li>'+ sv_arr[i] +'</li>');
                }                
            }    
        });

        //Hiển thị yêu cầu
        $.ajax({
            url: "Controller/admin/admin_room_book.php?act=show_detail",
            method: "GET",
            data: {value_id},
            dataType: "JSON",
            success: function(res){
                var rqm = res.requirement;
                var rqm_arr = rqm.split(" - ");
                 for(let i = 0; i < rqm_arr.length; i++){
                    $("#requirement_list").append('<li>'+ rqm_arr[i] +'</li>')
                 }
            }
        })
    });    

    //Kiểm tra nếu AJAX vẫn chưa gửi request thì ẩn các div
    if(isRequested == false){
        $("#selected_info").hide(300);
        $("#selected_detail_price").hide(300);
        $("#selected_message").hide(300);
    };
})