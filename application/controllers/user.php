<?php


class User extends CI_Controller {


         public function __construct() {
             parent::__construct();
             $this->load->model('user_model');
             $this->load->helper(array('form', 'url'));
             $this->load->library("session");
         }

         
        public function view(){
            $row = $this->user_model->get_views();            
            $data = array ('row' => $row ,'username' => $this->session->userdata("username"),'level' => $this->session->userdata("level"));          
            $this->load->view('user_view', $data);
        }
       
        public function do_upload()
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $repassword = $this->input->post('repassword');
            $level = $this->input->post('level');
             if(isset($_POST['ok'])){
                if($username!=''&&$password!=''&&$repassword!=''){
                if($this->user_model->checkuser($username)){    
                if($this->user_model->check($_POST['password'],$_POST['repassword'])){
                    $this->user_model->insertData($username,$password,$level);
                    $row = $this->user_model->get_views();
                    $this->view();        
                }
                else{ 
                                
                    echo '<script language="javascript">';
                    echo 'alert("Mật khẩu chưa trùng nhau")';
                    echo '</script>';
                    $this->view();
                }
                }
                else{ 
                                
                    echo '<script language="javascript">';
                    echo 'alert("Tài khoản đã tồn tại")';
                    echo '</script>';
                    $this->view();
                }
                }
                else { 
                                
                    echo '<script language="javascript">';
                    echo 'alert("Bạn chưa điền đủ thông tin")';
                    echo '</script>';
                    $this->view();
                }
             }
             
        }
        
        
        public function edit_user(){
            $query = $this->db->query("select id from user");
            $rows = array();
            if($_POST['username']!=''&&$_POST['password']!=''&&$_POST['repassword']!=''){
            if($this->user_model->check($_POST['password'],$_POST['repassword'])){    
            if($query->num_rows() > 0){
                foreach ($query->result() as $row){
                    if(isset($_POST[$row->id])){
                        $this->user_model->edit_user($row->id,$_POST['username'],$_POST['password'],$_POST['level']); 
                        
                    }
                    
                }
                $this->view();
                }
            }
            else{ 
                                
                echo '<script language="javascript">';
                echo 'alert("Mật khẩu chưa trùng nhau")';
                echo '</script>';
                $this->view();
            }
            }
            else { 
                                
                echo '<script language="javascript">';
                echo 'alert("Bạn chưa điền đủ thông tin")';
                echo '</script>';
                $this->view();
            }
            
        }
        
        public function delete_user(){
                      
                            
            $query = $this->db->query("select id from user");
            $rows = array();
            if($query->num_rows() > 0){
                foreach ($query->result() as $row){
                    if(isset($_POST[$row->id])){
                        $this->user_model->delete_user($row->id); 
                      
                    }
                }
            }
            $this->view();
        }      
        
        
}
