<?php

class Admin_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
        }

        public function get_views()
        {
                $query = $this->db->query("SELECT m.monhocid,m.hockyid,m.namemonhoc,m.mamonhoc,m.pdf,n.namenamhoc,h.namehocky FROM monhoc m INNER JOIN hocky h ON m.hockyid = h.hockyid INNER JOIN namhoc n ON h.namhocid = n.namhocid ;");
                $rows = array();
                if($query->num_rows() > 0){
                    foreach ($query->result() as $row){
                        $rows[] = $row;
                    }
                }
                return $rows;
        }
        public function get_user($username)
        {
                $query = $this->db->query("SELECT username,level from user where username='$username';");
                $rows = array();
                if($query->num_rows() > 0){
                    foreach ($query->result() as $row){
                        $rows[] = $row;
                    }
                }
                return $rows;
        }
        public function get_level($username)
        {
                $query = $this->db->query("SELECT level from user where username='$username';");
                $rows = array();
                if($query->num_rows() > 0){
                    foreach ($query->result() as $row){
                        $rows[] = $row;
                    }
                }
                return $rows;
        }
        public function insertData1($namhocid, $name) {
            $query = $this->db->query("INSERT INTO namhoc VALUES ('NULL','$name')");
            
        }
        public function insertData($monhocid, $namhocid, $hockyid, $namemonhoc, $mamonhoc) {
            $query1 = $this->db->query("INSERT INTO monhoc VALUES ('$monhocid','$hockyid','$namemonhoc','$mamonhoc','$image')");      
        }
        public function edit($monhocid, $mamonhoc, $namemonhoc, $namenamhoc, $namehocky) {
            $query1 = $this->db->query("UPDATE `monhoc` SET `hockyid` = (SELECT h.hockyid FROM hocky h INNER JOIN namhoc n ON h.namhocid=n.namhocid WHERE h.namehocky='$namehocky' and n.namenamhoc='$namenamhoc'), `namemonhoc` = '$namemonhoc', `mamonhoc` = '$mamonhoc' WHERE `monhocid` = '$monhocid';");      
        //$query1 = $this->db->query("UPDATE `monhoc` SET `hockyid` = (SELECT h.hockyid FROM hocky h INNER JOIN namhoc n ON h.namhocid=n.namhocid WHERE h.namehocky='$namehocky' and n.namenamhoc='$namenamhoc'), `namemonhoc` = '$namemonhoc', `mamonhoc` = '$mamonhoc' WHERE `monhocid` = $monhocid;");      
        }
        public function delete($id) {
            $query1 = $this->db->query("DELETE FROM `monhoc` WHERE `monhocid` = $id;");      
        }
        
        public function get_monhocid() {
            return $this->db->query("select monhocid from monhoc");
        }
        public function check_username($username) {
            $query = $this->db->query("SELECT username from user where username='$username';");
            if($query->num_rows() > 0){
                return true;
            }
                else return false; 
        }
        public function check_password($username,$password) {
            $query = $this->db->query("SELECT id from user where username='$username' and password='$password';");
            if($query->num_rows() ==1){
                return true;
            }
                else return false; 
        }
        

}

