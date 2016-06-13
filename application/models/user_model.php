<?php

class User_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
        }

        public function insertData($username, $password, $level) {
            $query1 = $this->db->query("INSERT INTO `user` VALUES (NULL, '$username', '$password', '$level');");      
        }
        public function edit_user($id,$username, $password, $level) {
            $query1 = $this->db->query("UPDATE `user` SET `username` = '$username', `password` = '$password',`level`= '$level' WHERE `user`.`id` = $id;");      
        }
        public function delete_user($id) {
            $query1 = $this->db->query("DELETE FROM `user` WHERE `user`.`id` = $id;");      
        }
        public function check($password, $repassword) {
            if($password==$repassword)
            return true;
            else
            return false;
        }
        
        public function checkuser($username) {
            $query = $this->db->query("SELECT username from user where username='$username';");
                
                if($query->num_rows() > 0) return false;
                else return true;
        }
        public function get_views()
        {
                $query = $this->db->query("SELECT * from user;");
                $rows = array();
                if($query->num_rows() > 0){
                    foreach ($query->result() as $row){
                        $rows[] = $row;
                    }
                }
                return $rows;
        }
        

}

