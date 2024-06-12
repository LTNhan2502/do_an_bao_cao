<?php
    class admin{
        //Phương thức lấy ra tài khoản admin
        function getAdmin($username, $pass){
            $db = new connect();
            $select = "SELECT id, username, pass FROM admin WHERE admin.username='$username' AND admin.pass=$pass";
            $result = $db->getList($select);
            return $result;
        }

        //Phương thức lấy ra tất cả thông tin tài khoản trong web
        function getAllMember(){
            $db = new connect();
            $select = "SELECT 
                        user_id, 
                        name, 
                        per_id, 
                        per_name, 
                        user_type, 
                        GROUP_CONCAT(action_code ORDER BY action_code SEPARATOR ' - ') AS actions, 
                        GROUP_CONCAT(check_action ORDER BY action_code SEPARATOR ' - ') AS checks
                    FROM (
                        SELECT 
                            a.id AS user_id, 
                            a.name AS name, 
                            up_admin.admin_id, 
                            p.per_id, 
                            p.per_name, 
                            pd.per_id AS pd_per_id, 
                            pd.action_code, 
                            pd.check_action, 
                            'admin' AS user_type
                        FROM admin AS a
                        JOIN user_per AS up_admin ON a.id = up_admin.admin_id
                        JOIN permission AS p ON up_admin.per_id = p.per_id
                        JOIN per_detail AS pd ON p.per_id = pd.per_id

                        UNION

                        SELECT 
                            r.rec_id AS user_id, 
                            r.rec_name AS name, 
                            up_rec.rec_id AS admin_id, 
                            p.per_id, 
                            p.per_name, 
                            pd.per_id AS pd_per_id, 
                            pd.action_code, 
                            pd.check_action, 
                            'receptionist' AS user_type
                        FROM receptionist AS r
                        JOIN user_per AS up_rec ON r.rec_id = up_rec.rec_id
                        JOIN permission AS p ON up_rec.per_id = p.per_id
                        JOIN per_detail AS pd ON p.per_id = pd.per_id
                    ) AS combined
                    GROUP BY user_id, name, per_id, per_name, user_type";
            $result = $db->getList($select);
            return $result;        
        }

        //Phương thức lấy ra tất cả các role
        function getPermission(){
            $db = new connect();
            $select = "SELECT * FROM permission";
            $result = $db->getList($select);
            return $result;   
        }

        //Phương thức lấy ra thông tin của một thành viên
        function getMember($user_id, $user_type){
            $db = new connect();
            $select = "SELECT 
                        user_id, 
                        name, 
                        per_id, 
                        per_name, 
                        user_type, 
                        GROUP_CONCAT(action_code ORDER BY action_code SEPARATOR ' - ') AS actions, 
                        GROUP_CONCAT(check_action ORDER BY action_code SEPARATOR ' - ') AS checks
                    FROM (
                        SELECT 
                            a.id AS user_id, 
                            a.name AS name, 
                            up_admin.admin_id, 
                            p.per_id, 
                            p.per_name, 
                            pd.per_id AS pd_per_id, 
                            pd.action_code, 
                            pd.check_action, 
                            'admin' AS user_type
                        FROM admin AS a
                        JOIN user_per AS up_admin ON a.id = up_admin.admin_id
                        JOIN permission AS p ON up_admin.per_id = p.per_id
                        JOIN per_detail AS pd ON p.per_id = pd.per_id

                        UNION

                        SELECT 
                            r.rec_id AS user_id, 
                            r.rec_name AS name, 
                            up_rec.rec_id AS admin_id, 
                            p.per_id, 
                            p.per_name, 
                            pd.per_id AS pd_per_id, 
                            pd.action_code, 
                            pd.check_action, 
                            'receptionist' AS user_type
                        FROM receptionist AS r
                        JOIN user_per AS up_rec ON r.rec_id = up_rec.rec_id
                        JOIN permission AS p ON up_rec.per_id = p.per_id
                        JOIN per_detail AS pd ON p.per_id = pd.per_id
                    ) AS combined
                    GROUP BY user_id, name, per_id, per_name, user_type
                    HAVING user_id = '$user_id' AND user_type = '$user_type'";
            $result = $db->getInstance($select);
            return $result;
        }
    }
?>