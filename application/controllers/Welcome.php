<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


         public function __construct() {
             parent::__construct();
             $this->load->model('admin_model');
             $this->load->helper(array('form', 'url'));
             $this->load->library("session");
         }

         public function index(){
            
            
            $row = $this->admin_model->get_views();            
            $data = array ('row' => $row);          
            $this->load->view('search', $data);
        }
        public function logout(){
            
            $this->session->sess_destroy();
            $row = $this->admin_model->get_views();            
            $data = array ('row' => $row);          
            $this->load->view('search', $data);
        }
        
         public function login(){
            
            $this->load->view('login');
        }
        public function admin(){
            //$this->load->view('add_view');
            $row = $this->admin_model->get_views();            
            $data = array ('row' => $row ,'username' => $this->session->userdata("username"),'level' => $this->session->userdata("level"));          
            $this->load->view('admin_view', $data);
        }
        
        
        
        public function check(){
            if(isset($_POST['ok'])){
                if($_POST['username']!=''&&$_POST['password']!=''){
                    if($this->admin_model->check_username($_POST['username'])){
                        if($this->admin_model->check_password($_POST['username'],$_POST['password'])){
                            $row = $this->admin_model->get_user($_POST['username']);
                            foreach ($row as $k =>$val):              
                            $username=$val->username;
                            $level=$val->level;
                            endforeach;
                            $data1 = array ('username' => $username,'level' => $level);
                            $this->session->set_userdata($data1);
                            $row = $this->admin_model->get_views();
                            $data = array ('row' => $row ,'username' => $this->session->userdata("username"),'level' => $this->session->userdata("level"));
                            if($level=='admin'){
                                $this->load->view('admin_view', $data);
                            }
                            else{ if($level=='teacher')
                                $this->load->view('themdiem_view', $data);

                            else $this->load->view('monhoc_view', $data);}
                        }
                        else{
                        echo '<script language="javascript">';
                        echo 'alert("Tài khoản hoặc mật khẩu không đúng")';
                        echo '</script>';
                        $this->login();
                        }
                    }
                        else{
                        echo '<script language="javascript">';
                        echo 'alert("Tài khoản không tồn tại")';
                        echo '</script>';
                        $this->login();
                }
                    
                }
                else{
                    echo '<script language="javascript">';
                    echo 'alert("Bạn chưa điền đầy đủ thông tin")';
                    echo '</script>';
                    $this->login();
                }
            }
        }
       
        
        public function edit(){
            $query =$this->admin_model->get_monhocid();
            $rows = array();
            
            if($_POST['mamonhoc']!=''&&$_POST['namemonhoc']!=''&&$_POST['namenamhoc']!=''&&$_POST['namehocky']!=''){
            if($query->num_rows() > 0){
                foreach ($query->result() as $row){
                    if(isset($_POST[$row->monhocid])){
                        $this->admin_model->edit($row->monhocid,$_POST['mamonhoc'],$_POST['namemonhoc'],$_POST['namenamhoc'],$_POST['namehocky']); 
                        
                    }
                    
                }
                $this->admin();
            }
            }
            else {
                                
                                echo '<script language="javascript">';
                                echo 'alert("Bạn chưa điền đầy đủ thông tin")';
                                echo '</script>';
                                $this->admin();
                            }  
            
            
        }
        public function delete(){
            $query =$this->admin_model->get_monhocid();
            $rows = array();
            if($query->num_rows() > 0){
                foreach ($query->result() as $row){
                    if(isset($_POST[$row->monhocid])){
                        $this->admin_model->delete($row->monhocid); 
                     
                    }
                    
                    
                }
                $this->admin();
            }
        } 
        public function view_pdf(){
            $query =$this->admin_model->get_monhocid();
            $rows = array();
            if($query->num_rows() > 0){
                foreach ($query->result() as $row){
                    if(isset($_POST[$row->monhocid])){
                        $query1 = $this->db->query("select pdf from monhoc where monhocid=".$row->monhocid);
                        $rows1 = array();
                        if($query1->num_rows() > 0){
                            foreach ($query1->result() as $row1){
                                $rows1[] = $row1;
                            }
                        }
                    $pdf = $row1->pdf;
                    $fh = fopen($pdf, "rb");
                    $pdfData = fread($fh, filesize($pdf));
                    header("Content-type:application/pdf");
                    echo $pdfData;
                    
                    }
                }
            }

        
        }
}
?>