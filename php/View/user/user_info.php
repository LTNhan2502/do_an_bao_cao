<link rel="stylesheet" href="content/user/css/user-info.css">

<div class="body">
    <aside class="sidebar">
        <div class="profile">
            <div class="avatar">
                <span><i class="fas fa-user"></i></span>
            </div>
            <div class="profile-info">
                <h3><?php echo $_SESSION['customer_name']; ?></h3>
                <p><?php echo $_SESSION['customer_email']; ?></p>
            </div>
        </div>
        <nav class="sidebar-menu">
            <ul>
                <!-- <li><a href="#"><i class="fas fa-star"></i> Điểm thưởng của tôi</a></li> -->
                <li><a href="#"><i class="fas fa-hotel"></i> Phòng đã đặt</a></li>
                <!-- <li><a href="#"><i class="fas fa-list"></i> Danh sách giao dịch</a></li> -->
                <!-- <li><a href="#"><i class="fas fa-bell"></i> Thông báo giá vé máy bay</a></li> -->
                <!-- <li><a href="#"><i class="fas fa-user-friends"></i> Thông tin hành khách đã lưu</a></li> -->
                <li><a href="#"><i class="fas fa-tags"></i> Khuyến mãi</a></li>
                <li class="active"><a href="#"><i class="fas fa-user"></i> Tài khoản</a></li>
                <li><a href="#" id="logout_button"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
            </ul>
        </nav>
    </aside>
    <div class="container-main">
        <main class="main-content">
            <div class="settings-header">
                <h1>Cài đặt</h1>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home"
                            type="button" role="tab" aria-controls="home" aria-selected="true">Thông tin tài
                            khoản</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button"
                            role="tab" aria-controls="profile" aria-selected="false">Mật khẩu</button>
                    </li>
                    <!-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contact" type="button"
                            role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                    </li> -->
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="settings-content mt-2">
                            <div class="notification">
                                <p>
                                    <i class="fas fa-bell"></i> Bạn muốn nhận thông báo đăng nhập mới và các hoạt động
                                    khác của tài khoản? <a href="#">Cho phép gửi thông báo trên máy tính</a>
                                </p>
                            </div>
                            <form class="personal-info">
                                <h2>Dữ liệu cá nhân</h2>
                                <div class="form-group">
                                    <label for="full-name">Tên đầy đủ</label>
                                    <input type="text" id="full-name" value="<?php echo $_SESSION['customer_name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nickname">Tên trong hồ sơ</label>
                                    <input type="text" id="nickname">
                                </div>
                                <div class="form-group">
                                    <label for="gender">Giới tính</label>
                                    <select id="gender">
                                        <option value="">Chọn giới tính</option>
                                        <option value="male">Nam</option>
                                        <option value="female">Nữ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="birthday">Ngày sinh</label>
                                    <div class="birthday-select">
                                        <select id="day">
                                            <option value="">Ngày</option>
                                            <!-- Ngày từ 1 đến 31 -->
                                        </select>
                                        <select id="month">
                                            <option value="">Tháng</option>
                                            <!-- Tháng từ 1 đến 12 -->
                                        </select>
                                        <select id="year">
                                            <option value="">Năm</option>
                                            <!-- Năm từ 1900 đến 2024 -->
                                        </select>
                                    </div>
                                </div>
                                <div class="form-buttons">
                                    <button type="button" class="btn btn-cancel">Hủy</button>
                                    <button type="submit" class="btn btn-save">Lưu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h2>Đổi mật khẩu</h2>
                        <form class="form" id="loginForm1">
                            <div class="flex-column">
                                <label>Mật khẩu cũ</label>
                            </div>
                            <div class="inputForm">
                                <input type="password" class="input" name="password" id="password_user_old">
                                <svg viewBox="0 0 576 512" height="1em" xmlns="http://www.w3.org/2000/svg" id="showPass_old"
                                    style="cursor:pointer;">
                                    <path
                                        d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z">
                                    </path>
                                </svg>
                            </div>

                            <div class="flex-column">
                                <label>Mật khẩu mới</label>
                            </div>
                            <div class="inputForm">
                                <input type="password" class="input" name="password" id="password_user_new">
                                <svg viewBox="0 0 576 512" height="1em" xmlns="http://www.w3.org/2000/svg" id="showPass_new"
                                    style="cursor:pointer;">
                                    <path
                                        d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z">
                                    </path>
                                </svg>
                            </div>

                            <div class="flex-column">
                                <label>Xác nhận mật khẩu mới</label>
                            </div>
                            <div class="inputForm">
                                <input type="password" class="input" name="password" id="password_user_confirm">
                                <svg viewBox="0 0 576 512" height="1em" xmlns="http://www.w3.org/2000/svg" id="showPass_confirm"
                                    style="cursor:pointer;">
                                    <path
                                        d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z">
                                    </path>
                                </svg>
                            </div>
                            <small class="text-danger" id="password_user_error"></small>
                            <div class="form-buttons">
                                <button type="button" class="btn btn-cancel">Hủy</button>
                                <button type="submit" class="btn btn-save">Lưu</button>
                            </div>
                        </form>
                        <hr>
                        <h2>Xóa tài khoản</h2>
                        <div class="delete-group">
                            <p class="delete-account">Sau khi tài khoản của bạn bị xóa, bạn sẽ không thể lấy lại dữ liệu
                                của
                                mình. Không thể được hoàn tác thao tác này.</p>
                            <button type="button" class="btn btn-danger">Xoá</button>
                        </div>

                    </div>
                </div>
                <!-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">cxcxc</div> -->
            </div>
        </main>
    </div>
</div>

<script>
    $(document).ready(function () {
        let isShow = false;
        let isreShow = false;
        //Hiển thị pass
        function showPass(btn, input) {
            $(document).on("click", btn, function () {
                if (isShow == false) {
                    $(input).attr("type", "text");
                    isShow = true;
                }
                else {
                    $(input).attr("type", "password");
                    isShow = false;
                }
            });
        }

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

        //Hiển thị pass cũ
        showPass("#showPass_old", "#password_user_old");
        showPass("#showPass_new", "#password_user_new");
        showPass("#showPass_confirm", "#password_user_confirm");        
    })
</script>