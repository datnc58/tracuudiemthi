<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Themdiem extends CI_Controller {


         public function __construct() {
             parent::__construct();
             $this->load->model('themdiem_model');
             $this->load->helper(array('form', 'url'));
             $this->load->library("session");
         }

        public function view(){
            $row = $this->themdiem_model->get_views();            
            $data = array ('row' => $row ,'username' => $this->session->userdata("username"),'level' => $this->session->userdata("level"));          
            $this->load->view('themdiem_view', $data);
        }
        
        public function do_upload()
        {
            $this->load->helper(array('form', 'url'));
            if(isset($_POST['ok'])){
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 2048000;
                $this->load->library('upload', $config);
                if($_FILES['userfile']['name'] != NULL){
                    if($_FILES['userfile']['type'] == "application/pdf"){

                    $tmp_name = $_FILES['userfile']['tmp_name'];
                    $name = $_FILES['userfile']['name'];
                    $path = "uploads/";
                    move_uploaded_file($tmp_name,$path.$name);
                    $image  = 'uploads/' . $_FILES['userfile']['name'];
                    $monhocid = NULL;
                    $mamonhoc = $this->input->post('mamonhoc');
                    $hocky = $this->input->post('hocky');
                    $namhoc = $this->input->post('namhoc');
                   // $namemonhoc = $this->input->post('namemonhoc');


                    $this->themdiem_model->insertData($mamonhoc, $hocky, $namhoc, $image);
                    echo '<script language="javascript">';
                        echo 'alert("Bạn đã thêm điểm thành công")';
                        echo '</script>';
                        $this->view();
                    }
                    else {
                        $this->view();
                        echo '<script language="javascript">';
                        echo 'alert("Kiểu file phải là pdf")';
                        echo '</script>';
                    }
                 }

                 else {
                        $this->view();
                        echo '<script language="javascript">';
                        echo 'alert("Bạn chưa chọn file")';
                        echo '</script>';
                    }
            }
                    
                
        }
        
        
        
        
}
?>