$(document).ready(function(){
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
                        timer: 1000
                    });                
                }else{
                    Swal.fire({
                        title: "Thất bại",
                        text: "Thay đổi không thành công! Kiểm tra lại",
                        icon: "error",
                        timer: 1000
                    })
                }
            },
            error: function(){
                Swal.fire({
                    title: "Thất bại!",
                    text: "Lỗi khác ở hệ thống, connect, CSDL",
                    icon: "error",
                    timer: 1000
                });
            }
        })
   })
})