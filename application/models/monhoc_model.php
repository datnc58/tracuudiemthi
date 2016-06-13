<?php


class Monhoc_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
                require_once 'PHPExcel.php';
                
        }
        
        public function readexcel($filename){
            $inputFileType = PHPExcel_IOFactory::identify($filename);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objReader->setReadDataOnly(true);
            $objPHPExcel = $objReader->load("$filename");
            $total_sheets=$objPHPExcel->getSheetCount();
            $allSheetName=$objPHPExcel->getSheetNames();
            $objWorksheet  = $objPHPExcel->setActiveSheetIndex(0);
            $highestRow    = $objWorksheet->getHighestRow();
            $highestColumn = $objWorksheet->getHighestColumn();
            $arraydata = array();
            for ($row = 2; $row <= $highestRow;++$row)
            {
                $mamonhoc=$objWorksheet->getCellByColumnAndRow(0, $row)->getValue();
                $tenmonhoc=$objWorksheet->getCellByColumnAndRow(1, $row)->getValue();
                $namehocky=$objWorksheet->getCellByColumnAndRow(2, $row)->getValue();
                $namenamhoc=$objWorksheet->getCellByColumnAndRow(3, $row)->getValue();
                $this->insertData($mamonhoc,$tenmonhoc,$namehocky,$namenamhoc);
                $this->update($mamonhoc,$tenmonhoc,$namehocky,$namenamhoc);
            }
       }

        public function insertData( $mamonhoc, $tenmonhoc,$namehocky,$namenamhoc) {
            $query1 = $this->db->query("INSERT INTO `monhoc`  VALUES (NULL,'', '$tenmonhoc', '$mamonhoc', '');");
            
        }
        public function update( $mamonhoc, $tenmonhoc,$namehocky,$namenamhoc) {
            
            $query2 = $this->db->query("UPDATE `monhoc` SET `hockyid` = (SELECT h.hockyid FROM hocky h INNER JOIN namhoc n ON h.namhocid=n.namhocid WHERE h.namehocky='$namehocky' and n.namenamhoc='$namenamhoc') WHERE `namemonhoc` = '$tenmonhoc' and `mamonhoc` = '$mamonhoc';");       
        }
        public function check($mamonhoc) {
                $query = $this->db->query("SELECT mamonhoc from monhoc where mamonhoc='$mamonhoc';");
                
                if($query->num_rows() > 0) {
                    return false;
                }
                
                else {
                    return true;
                }
        }
         public function get_views()
        {
                $query = $this->db->query("SELECT * from monhoc;");
                $rows = array();
                if($query->num_rows() > 0){
                    foreach ($query->result() as $row){
                        $rows[] = $row;
                    }
                }
                return $rows;
        }
        
        public function edit_monhoc($monhocid, $mamonhoc, $namemonhoc) {
            $query1 = $this->db->query("UPDATE `monhoc` SET `mamonhoc` = '$mamonhoc', `namemonhoc` = '$namemonhoc' WHERE `monhocid` = $monhocid;");      
        }
        public function delete_monhoc($id) {
            $query1 = $this->db->query("DELETE FROM `monhoc` WHERE `monhocid` = $id;");      
        }
        public function get_monhocid() {
            return $this->db->query("select monhocid from monhoc");
        }
        

}

