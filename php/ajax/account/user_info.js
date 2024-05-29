$(document).ready(function(){
    //Đăng xuất
    $(document).on("click", "#logout_button", function () {
        Swal.fire({
            title: "Đăng xuất?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "Controller/user/login.php?act=logout_action",
                    dataType: "JSON",
                    success: function (res) {
                        if (res.status == 200) {
                            Swal.fire({
                                title: "Đăng xuất thành công!",
                                icon: "success",
                                timer: 900,
                                timerProgressBar: true
                            }).then(function () {
                                window.location.href = "index.php";
                            });
                        } else {
                            Swal.fire({
                                title: "Đăng xuất thất bại!",
                                text: res.message,
                                icon: "error",
                                timer: 3200,
                                timerProgressBar: true
                            });
                        }
                    },
                    error: function () {
                        Swal.fire({
                            title: "Lỗi!",
                            text: "Lỗi không xác định!",
                            icon: "error",
                            timer: 3200,
                            timerProgressBar: true
                        });
                    }
                })
            }
        });
    })

    //Xoá tài khoản
    $(document).on("click", "#delete_account", function () {
        let customer_email = $("#customer_email").data("customer_email")
        Swal.fire({
            title: "Xoá tài khoản?",
            text: "Tài khoản sẽ không thể khôi phục!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "Controller/user/user_info.php?act=delete_action",
                    method: "POST",
                    data: {customer_email},
                    dataType: "JSON",
                    success: function (res) {
                        if (res.status == 200) {
                            Swal.fire({
                                title: "Đăng xuất thành công!",
                                icon: "success",
                                timer: 900,
                                timerProgressBar: true
                            }).then(function () {
                                window.location.href = "index.php";
                            });
                        } else {
                            Swal.fire({
                                title: "Đăng xuất thất bại!",
                                text: res.message,
                                icon: "error",
                                timer: 3200,
                                timerProgressBar: true
                            });
                        }
                    },
                    error: function () {
                        Swal.fire({
                            title: "Lỗi!",
                            text: "Lỗi không xác định!",
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