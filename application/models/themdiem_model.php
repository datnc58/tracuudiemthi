<?php

class Themdiem_model extends CI_Model {

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
        
        public function insertData($mamonhoc, $hocky, $namhoc, $image) {
            $query1 = $this->db->query("UPDATE `monhoc` SET `pdf`='$image' WHERE mamonhoc='$mamonhoc' and hockyid=(SELECT h.hockyid FROM hocky h INNER JOIN namhoc n ON h.namhocid=n.namhocid WHERE h.namehocky='$hocky' and n.namenamhoc='$namhoc');");      
        }
        
        

}

