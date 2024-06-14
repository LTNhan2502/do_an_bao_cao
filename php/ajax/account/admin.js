$(document).ready(function(){
    //Đăng nhập
    $(document).on("submit", "#adminLoginForm", function(e){
        e.preventDefault()
        let form = $("#adminLoginForm")[0]
        let formData = new FormData(form)

        $.ajax({
            url: "Controller/admin/admin_login.php?act=login_action",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function(res){
                if(res.status == 200){
                    Swal.fire({                                 
                        title: "Thành công!",
                        text: res.message,
                        icon: "success",
                        timer: 900,
                        timerProgressBar: true
                    }).then(function(){
                        window.location.href = 'admin_index.php?action=admin_home';
                    });
                }else if(res.status == 404){
                    Swal.fire({                                 
                        title: "Thất bại!",
                        text: res.message,
                        icon: "error",
                        timer: 3200,
                        timerProgressBar: true
                    })
                }else if(res.status == 424){
                    Swal.fire({                                 
                        title: "Nhắc nhở!",
                        text: res.message,
                        icon: "info",
                        timer: 3200,
                        timerProgressBar: true
                    }).then(function(){
                        window.location.href = 'admin_index.php?action=admin_home'
                    })
                }else{
                    Swal.fire({                                 
                        title: "Thất bại!",
                        text: res.message,
                        icon: "error",
                        timer: 3200,
                        timerProgressBar: true
                    })
                }
            },
            error: function(){
                Swal.fire({                                 
                    title: "Lỗi!",
                    text: 'Lỗi không xác định!',
                    icon: "error",
                    timer: 3200,
                    timerProgressBar: true
                })
            }
        })
    })


    //Thay đổi mật khẩu
    $(document).on('submit', "#changePassForm", function(e){
        e.preventDefault()
        let form = $("#changePassForm")[0]
        let formData = new FormData(form)
        $.ajax({
            url: "Controller/admin/admin_login.php?act=change_pass",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function(res){
                if(res.status == 200){
                    Swal.fire({                                 
                        title: "Thành công!",
                        text: res.message,
                        icon: "success",
                        timer: 900,
                        timerProgressBar: true
                    }).then(function(){
                        window.location.href = 'admin_index.php?action=login';
                    });
                }else{
                    Swal.fire({                                 
                        title: "Thất bại!",
                        text: res.message,
                        icon: "error",
                        timer: 3200,
                        timerProgressBar: true
                    })
                }
            },
            error: function(){
                Swal.fire({                                 
                    title: "Lỗi!",
                    text: "Lỗi không xác định!",
                    icon: "error",
                    timer: 3200,
                    timerProgressBar: true
                })
            }
        })
    })
})