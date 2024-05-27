<?php
    set_include_path(get_include_path() . PATH_SEPARATOR . '../../Model/');
    spl_autoload_extensions('.php');    
    spl_autoload_register();

    $act = 'admin_rec_list';
    if(isset($_GET['act'])){
        $act = $_GET['act'];
    }

    switch($act){
        case 'admin_rec_list':
            include_once "View/admin/admin_rec_list.php";
            break;
        case "create_rec":
            include_once "View/admin/admin_rec_insert.php";
            break;
        case "create_action":
            if(isset($_POST['new_rec'])){
                $name = $_POST['new_rec'];
                $rec = new receptionist();
                $result = $rec->createRec($name); 
                if ($result) {                 
                    $res = array(
                        'status' => 'success',
                        'message' => 'Tạo mới thành công!'
                    ); 
                    // echo '<meta http-equiv="refresh" content="0;url=./admin_index.php?action=admin_room_list&act=room_create"/>';
                }else{ 
                    $res = array(
                        'status' => 'fail',
                        'message'=> 'Tạo mới thất bại!'
                    );        
                    // echo '<meta http-equiv="refresh" content="0;url=./admin_index.php?action=admin_room_list&act=room_create"/>';
                }
                echo json_encode($res);
            }
            break;
        case "update_name":
            if(isset($_POST['name_value']) && isset($_POST['id'])){
                $id = $_POST['id'];
                $name_value = $_POST['name_value'];
                $regex_name = '/^[a-zA-Z\s]+$/';
                if(!preg_match($regex_name, $name_value)){
                    $res = array(
                        'status' => 'name',
                        'message' => 'Tên không được bao gồm kí tự đặc biệt và số!'
                    );
                }else if($name_value == ''){
                    $res = array(
                        'status'=> 'name',
                        'message'=> 'Không được để trống!'
                    );
                }else if(strlen($name_value) < 2 || strlen($name_value) > 30){
                    $res = array(
                        'status'=> 'name',
                        'message'=> 'Tên phải từ 2 đến 30 kí tự!'
                    );
                }else{
                    $rec = new receptionist();
                    $result = $rec->changeRecName($id, $name_value);
                    if($result){
                        $res = array(
                            "status" => "success",
                            "message" => "changed"
                        );
                    }else{
                        $res = array(
                            "status" => "fail",
                            "message" => "Lenh SQL, kieu du lieu (JOSN), json_encode, value view"
                        );
                    }
                }
                
                echo json_encode($res);
            }
            break;
        case 'Ca 1 - 06:00 tới 14:00':
            $rec_id = $_POST['rec_id'];
            $rec_shift = $_POST['rec_shift'];
            $rec = new receptionist();
            $result = $rec->changeRecShift1($rec_id);
            $result->execute();
            if ($result !== false) {
                $res = array(
                    "status" => "success",
                    "message" => "Changed"
                );
            } else {
                $res = array(
                    "status" => "fail",
                    "message" => "Lenh SQL, kieu du lieu(JSON), json_encode, value view"
                );
            }    
            echo json_encode($res);
            break;
        case 'Ca 2 - 14:00 tới 22:00':
            $rec_id = $_POST['rec_id'];
            $rec_shift = $_POST['rec_shift'];
            $rec = new receptionist();
            $result = $rec->changeRecShift2($rec_id);
            $result->execute();
            if ($result !== false) {
                $res = array(
                    "status" => "success",
                    "message" => "Changed"
                );
            } else {
                $res = array(
                    "status" => "fail",
                    "message" => "Lenh SQL, kieu du lieu(JSON), json_encode, value view"
                );
            }    
            echo json_encode($res);
            break;
        case 'Ca 3 - 22:00 tới 06:00':
            $rec_id = $_POST['rec_id'];
            $rec_shift = $_POST['rec_shift'];
            $rec = new receptionist();
            $result = $rec->changeRecShift3($rec_id);
            $result->execute();
            if ($result !== false) {
                $res = array(
                    "status" => "success",
                    "message" => "Changed"
                );
            } else {
                $res = array(
                    "status" => "fail",
                    "message" => "Lenh SQL, kieu du lieu(JSON), json_encode, value view"
                );
            }    
            echo json_encode($res);
            break;
        case "update_tel":
            if(isset($_POST['tel_value']) && isset($_POST['id'])){
                $id = $_POST['id'];
                $tel_value = $_POST['tel_value'];
                $first_zero = substr($tel_value,0,1) == "0" ? "yes" : "no";
                if($first_zero == "no" && strlen($tel_value) == 10){
                    $res = array(
                        'status' => 'tel',
                        'message' => 'Số điện thoại phải bắt đầu bằng số 0!'
                    );
                }else if($tel_value == ''){
                    $res = array(
                        'status'=> 'tel',
                        'message'=> 'Không được để trống!'
                    );
                }else if(strlen($tel_value) != 10 && $first_zero == "yes"){
                    $res = array(
                        'status'=> 'tel',
                        'message'=> 'Số điện thoại phải có 10 chữ số!'
                    );
                }else if(strlen($tel_value) != 10 && $first_zero == 'no'){
                    $res = array(
                        'status'=> 'tel',
                        'message'=> 'Số điện thoại không hợp lệ!'
                    );                
                }else if(!is_numeric($tel_value)){
                    $res = array(
                        'status'=> 'tel',
                        'message'=> 'Số điện thoại phải là số!'
                    );
                }else{
                    $rec = new receptionist();
                    $result = $rec->changeRecTel($id, $tel_value);
                    if($result){
                        $res = array(
                            "status" => "success",
                            "message" => "changed"
                        );
                    }else{
                        $res = array(
                            "status" => "fail",
                            "message" => "Lenh SQL, kieu du lieu (JOSN), json_encode, value view"
                        );
                    }
                }
                
                echo json_encode($res);
            }
            break;
        case "update_email":
            if(isset($_POST['email_value']) && isset($_POST['id'])){
                $id = $_POST['id'];
                $email_value = $_POST['email_value'];
                $regex_email = '/^[a-zA-Z0-9._%+-]+@gmail+\.com$/';
                
                if(!preg_match($regex_email, $email_value)){
                    $res = array(
                        'status' => 'email',
                        'message' => 'Email không đúng định dạng!'
                    );
                }else if($email_value == ''){
                    $res = array(
                        'status'=> 'email',
                        'message'=> 'Không được để trống!'
                    );
                }else{
                    $rec = new receptionist();
                    $result = $rec->changeRecEmail($id, $email_value);
                    if($result){
                        $res = array(
                            "status" => "success",
                            "message" => "changed"
                        );
                    }else{
                        $res = array(
                            "status" => "fail",
                            "message" => "Lenh SQL, kieu du lieu (JOSN), json_encode, value view"
                        );
                    }
                }
                
                echo json_encode($res);
            }
            break;
        case "update_birthday":
            if(isset($_POST['birthday_value']) && isset($_POST['id']) && isset($_POST['prev_birthday'])){
                $id = $_POST['id'];
                $birthday_value = $_POST['birthday_value'];
                $prev_birthday = $_POST['prev_birthday'];
                
                if($birthday_value == ''){
                    $res = array(
                        'status' => 'birthday',
                        'message' => 'Không được để trống!'
                    );
                }else if($birthday_value == $prev_birthday){
                    $res = array(
                        'status'=> 'birthday',
                        'message'=> 'Nếu muốn thay đổi, hãy chọn ngày khác!'
                    );
                }else{
                    $rec = new receptionist();
                    $result = $rec->changeRecBirthday($id, $birthday_value);
                    if($result){
                        $res = array(
                            "status" => "success",
                            "message" => "Thay đổi thành công!"
                        );
                    }else{
                        $res = array(
                            "status" => "fail",
                            "message" => "Lenh SQL, kieu du lieu (JOSN), json_encode, value view!"
                        );
                    }
                }
                
                echo json_encode($res);
            }
            break;
        case "update_start-timeWork":
            if(isset($_POST['startWork_value']) && isset($_POST['id']) && 
                isset($_POST['prev_startWork']) && isset($_POST["id_timeWork"]) && 
                isset($_POST["now"]) && isset($_POST["rec_timeWork_getTime"])){

                $id = $_POST['id'];
                $startWork_value = $_POST['startWork_value'];
                $prev_startWork = $_POST['prev_startWork'];
                $id_timeWork = $_POST["id_timeWork"];
                $now = $_POST["now"];
                $rec_timeWork_getTime = $_POST["rec_timeWork_getTime"];
                
                if($startWork_value == ''){
                    $res = array(
                        'status' => 'startWork',
                        'message' => 'Không được để trống!'
                    );
                }else if($startWork_value == $prev_startWork){
                    $res = array(
                        'status'=> 'startWork',
                        'message'=> 'Nếu muốn thay đổi, hãy chọn ngày khác!'
                    );
                }else{
                    $rec = new receptionist();
                    $timeWork_getTime = $now - $rec_timeWork_getTime;
                    $rec_timeWork = floor($timeWork_getTime / (1000 * 60 * 60 * 24));
                    $result_startWork = $rec->changeRecStartWork($id, $startWork_value);
                    $result_startWork->execute();
                    
                    if($result_startWork){   
                        $result_timeWork = $rec->changeRecTimeWork($id, $rec_timeWork);
                        $result_timeWork->execute();
                        if($result_timeWork){
                            $all_recs = array();
                            $all_rec = $rec->getRecs($id);
                            $all_recs = $all_rec->fetch(PDO::FETCH_ASSOC);
                            $res = array(
                                "status"=> "success",
                                "message"=> "Thay đổi thành công!",
                                "rec" => $all_recs
                            );
                        }else{
                            $res = array(
                                "status"=> "fail_timeWork",
                                "message"=> "Kiểm tra lại hàm thay đổi rec_timeWork!",
                                "rec" => $all_recs
                            );
                        }                        
                    }else{
                        $res = array(
                            "status" => "fail",
                            "message" => "Hàm thay đổi rec_startWork không được thực hiện!"
                        );
                    }
                }                
                echo json_encode($res);
            }
            break;
        case "update_timeWork":
            if(isset($_POST["id_timeWork"]) && isset($_POST["now"]) && isset($_POST["rec_timeWork_getTime"])){
                
                $rec = new receptionist();
                
                if($result){
                    
                }else{
                    $res = array(
                        "status"=> "fail",
                        "message"=> "Thay đổi thất bại! Xem lại!"
                    );
                }
                echo json_encode($res);
            }
            break;
        case "update_bonus":
            if(isset($_POST['bonus_value']) && isset($_POST['id'])){
                $id = $_POST['id'];
                $bonus_value = $_POST['bonus_value'];
                
                if(!is_numeric($bonus_value)){
                    $res = array(
                        'status'=> 'bonus',
                        'message'=> 'Tiền thưởng phải là một số!'
                    );
                }else if($bonus_value < 0){
                    $res = array(
                        'status'=> 'bonus',
                        'message'=> 'Tiền thưởng phải là số dương!'
                    );
                }else{
                    $rec = new receptionist();
                    $result = $rec->changeRecBonus($id, $bonus_value);
                    if($result){
                        $rec_receives = array();
                        $rec_receive = $rec->getRecs($id);
                        $rec_receives = $rec_receive->fetch(PDO::FETCH_ASSOC);
                        $res = array(
                            "status" => "success",
                            "message" => "changed",
                            "rec_salary" => $rec_receives
                        );
                    }else{
                        $res = array(
                            "status" => "fail",
                            "message" => "Lenh SQL, kieu du lieu (JOSN), json_encode, value view"
                        );
                    }
                }
                
                echo json_encode($res);
            }
            break;
        case "update_fine":
            if(isset($_POST['fine_value']) && isset($_POST['id'])){
                $id = $_POST['id'];
                $fine_value = $_POST['fine_value'];
                
                if(!is_numeric($fine_value)){
                    $res = array(
                        'status'=> 'fine',
                        'message'=> 'Tiền phạt phải là một số!'
                    );
                }else if($fine_value < 0){
                    $res = array(
                        'status'=> 'fine',
                        'message'=> 'Tiền phạt phải là số dương!'
                    );
                }else{
                    $rec = new receptionist();
                    $result = $rec->changeRecFine($id, $fine_value);
                    if($result){
                        $rec_receives = array();
                        $rec_receive = $rec->getRecs($id);
                        $rec_receives = $rec_receive->fetch(PDO::FETCH_ASSOC);
                        $res = array(
                            "status" => "success",
                            "message" => "changed",
                            "rec_salary" => $rec_receives
                        );
                    }else{
                        $res = array(
                            "status" => "fail",
                            "message" => "Lenh SQL, kieu du lieu (JOSN), json_encode, value view"
                        );
                    }
                }
                
                echo json_encode($res);
            }
            break;
        case "update_salary":
            if(isset($_POST['salary_value']) && isset($_POST['id'])){
                $id = $_POST['id'];
                $salary_value = $_POST['salary_value'];
                
                if(!is_numeric($salary_value)){
                    $res = array(
                        'status'=> 'salary',
                        'message'=> 'Lương phải là một số!'
                    );
                }else if($salary_value < 0){
                    $res = array(
                        'status'=> 'salary',
                        'message'=> 'Lương phải là số dương!'
                    );
                }else{
                    $rec = new receptionist();
                    $result = $rec->changeRecSalary($id, $salary_value);
                    if($result){
                        $rec_receives = array();
                        $rec_receive = $rec->getRecs($id);
                        $rec_receives = $rec_receive->fetch(PDO::FETCH_ASSOC);
                        $res = array(
                            "status" => "success",
                            "message" => "changed",
                            "rec_salary" => $rec_receives
                        );
                    }else{
                        $res = array(
                            "status" => "fail",
                            "message" => "Lenh SQL, kieu du lieu (JOSN), json_encode, value view"
                        );
                    }
                }
                
                echo json_encode($res);
            }
            break;
        case "update_factor":
            $id = $_POST["id"];
            $factor_value = $_POST["factor_value"];
            $regex_factor = '/^[0-9]+(\.[0-9]{1,2})?$/';
            $rec = new receptionist();
            
            if(!preg_match($regex_factor, $factor_value)){
                $res = array(
                    'status' => 'factor',
                    'message' => 'Hệ số chỉ bao gồm số nguyên và số thập phân!'
                );
            }else if($factor_value == ''){
                $res = array(
                    'status'=> 'factor',
                    'message'=> 'Không được để trống!'
                );
            }else{
                $result = $rec->changeRecFactor($id, $factor_value);
                if($result){
                    //Lấy ra dữ liệu từ mysql
                    $rec_receives = array();
                    $rec_receive = $rec->getRecs($id);
                    $rec_receives = $rec_receive->fetch(PDO::FETCH_ASSOC);
                    $res = array(
                        "status" => "success",
                        "message" => "changed",
                        "rec_salary" => $rec_receives
                    );
                }else{
                    $res = array(
                        "status" => "fail",
                        "message" => "Lenh SQL, kieu du lieu (JOSN), json_encode, value view"
                    );
                }
            }
            
            echo json_encode($res);
            break;

        case "claim_salary":
            if(isset($_POST['rec_id'])){
                $id = $_POST['rec_id'];

                $rec = new receptionist();
                $result = $rec->claimSalary($id);
                if($result){
                    $res = array(
                        "status" => "success",
                        "message" => "Thời điểm nhận lương đã cập nhật!"
                    );
                }else{
                    $res = array(
                        "status" => "fail",
                        "message" => "Thay đổi thất bại! Kiểm tra lại!"
                    );
                }
                echo json_encode($res);
            }
            break;
        case "un_claim_salary":
            if(isset($_POST['rec_id'])){
                $id = $_POST['rec_id'];

                $rec = new receptionist();
                $result = $rec->unClaimSalary($id);
                if($result){
                    $res = array(
                        "status" => "success",
                        "message" => "Thay đổi thành công!"
                    );
                }else{
                    $res = array(
                        "status" => "fail",
                        "message" => "Lenh SQL, kieu du lieu (JOSN), json_encode, value view"
                    );
                }
                
                
                echo json_encode($res);
            }
            break;

        
    }
    //Chỉnh sửa chức vụ
    $recParts = array(1, 2, 3, 4, 5, 6, 7, 8);
    if (in_array($act, $recParts)) { // Check if act is a valid rec_part
        $rec_id = $_POST['rec_id'];
        $rec_part = $_POST['rec_part'];
    
        $rec = new receptionist();
        $result = $rec->changeRecPart($rec_id, $rec_part);
        $result->execute();
        if ($result !== false) {
            $res = array(
                "status" => "success",
                "message" => "Changed"
            );
        } else {
            $res = array(
                "status" => "fail",
                "message" => "Lenh SQL, kieu du lieu(JSON), json_encode, value view"
            );
        }    
        echo json_encode($res);
    };
?>