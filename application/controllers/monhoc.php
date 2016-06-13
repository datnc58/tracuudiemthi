<?php


class Monhoc extends CI_Controller {


         public function __construct() {
             parent::__construct();
             $this->load->model('monhoc_model');
             $this->load->helper(array('form', 'url'));
            $this->load->library("session");
         }

         
        public function view(){
            $row = $this->monhoc_model->get_views();            
            $data = array ('row' => $row ,'username' => $this->session->userdata("username"),'level' => $this->session->userdata("level"));         
            $this->load->view('monhoc_view', $data);
        }
       
        public function do_upload()
        {
            if($_FILES['file']['name'] != NULL){

                $target_file = $_FILES['file']['tmp_name'] . basename($_FILES['file']['name']);
                $FileType = pathinfo($target_file,PATHINFO_EXTENSION);
                $filename=$_FILES['file']['tmp_name'];
                if($FileType=="xlsx"||$FileType=="xls"){
                    $this->monhoc_model->readexcel($filename);
                    $this->view();
                }
                else {

                    echo '<script language="javascript">';
                    echo 'alert("Sai kiểu file")';
                    echo '</script>';
                    $this->view();
                }  
            }
            else {
                                
                echo '<script language="javascript">';
                echo 'alert("Bạn chưa chọn file")';
                echo '</script>';
                $this->view();
            }  
        }
        public function edit(){
            $query =$this->monhoc_model->get_monhocid();
            $rows = array();
            if($_POST['mamonhoc']!=''&&$_POST['namemonhoc']!=''){
                if($query->num_rows() > 0){
                    foreach ($query->result() as $row){
                    if(isset($_POST[$row->monhocid])){
                            $this->monhoc_model->edit_monhoc($row->monhocid,$_POST['mamonhoc'],$_POST['namemonhoc']); 
                        }
                    }
                    $this->view();
                }
                else {

                    echo '<script language="javascript">';
                    echo 'alert("Bạn chưa điền đầy đủ thông tin")';
                    echo '</script>';
                    $this->view();
                }  
            }
        }
        
        public function add(){
            $mamonhoc=$_POST['mamonhoc'];
            $tenmonhoc=$_POST['tenmonhoc'];
            $namehocky=$_POST['hocky'];
            $namenamhoc=$_POST['namhoc'];
            if($mamonhoc!=''&&$tenmonhoc!=''){

                    $this->monhoc_model->insertData($mamonhoc,$tenmonhoc,$namehocky,$namenamhoc);
                    $this->monhoc_model->update($mamonhoc,$tenmonhoc,$namehocky,$namenamhoc);
                    $this->view();
            }
            else {
                    echo '<script language="javascript">';
                    echo 'alert("Bạn chưa điền đầy đủ thông tin")';
                    echo '</script>';
                    $this->view();
                }       
        }
        
        public function delete(){
            $query =$this->monhoc_model->get_monhocid();
            $rows = array();
            if($query->num_rows() > 0){
                foreach ($query->result() as $row){
                    if(isset($_POST[$row->monhocid])){
                        $this->monhoc_model->delete_monhoc($row->monhocid); 
                    
                    }
                }
                $this->view();
            }
        }    
       
}