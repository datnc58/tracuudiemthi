<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <base href="<?php echo base_url(); ?>" />
    <link href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Tell the browser to be responsive to screen width -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css">
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.js"></script>
    <!-- Bootstrap 3.3.4 -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="../../index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          
          <!-- search form -->
          
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <li><a href="welcome/index"><i class="fa fa-book"></i> <span>Trang chủ</span></a>
            </li>
            <li class="active"><a href="user/view"><i class="fa fa-book"></i> <span>Cấp quyền</span></a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Thêm dữ liệu</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li ><a href="monhoc/view"><i class="fa fa-circle-o"></i> Thêm môn học</a></li>
                <li><a href="welcome/add"><i class="fa fa-circle-o"></i> Thêm điểm</a></li>
               
              </ul>
              
            </li>
            
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Quản lý tài khoản
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                <h2>Cấp quyền</h2>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="user/do_upload" enctype="multipart/form-data" name="sub" >
                  <div class="box-body">
                    <div class="form-group">
                      <label >Tài khoản</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="admin" name="username"/>
                    </div>
                    <div class="form-group">
                      <label >Mật khẩu</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="123456">
                    </div>
                    <div class="form-group">
                      <label >Nhập lại mật khẩu</label>
                      <input type="password" class="form-control" id="exampleInputEmail1" name="repassword" placeholder="123456" />
                    </div>
                    
                        <div class="form-group">
                    <label>Quyền</label>
                    <select class="form-control select2" name="level">
                      
                      <option selected="selected">admin</option>
                    <option>teacher</option>
                    <option>manager</option>
                    <option>user</option>
                    </select>
                  </div>
                  
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" name="ok">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->

              
          </div>   <!-- /.row -->
          <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                <h2>Danh sách tài khoản</h2>
                </div><!-- /.box-header -->
                <!-- form start -->
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Tài khoản</th>
                        <th>Mật khẩu</th>
                        <th>Quyền</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($row as $k =>$val):
                      echo '<tr>                          
                        <th>'.$val->username.'</th>
                        <td>'.$val->password.'</td>
                        <td>'.$val->level.'</td>
                        <td>
                        <button type="submit" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" name="'.$val->username.'"  >'.$val->username.'</button>
                        
                        </td>



                      </tr>
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Edit user</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="post" action="user/view_pdf" enctype="multipart/form-data" name="sub" >
                  <div class="box-body">
                    <div class="form-group">
                      <label >Tài khoản</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="admin" name="username" value="'. $val->id .'"/>
                    </div>
                    <div class="form-group">
                      <label >Mật khẩu</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="123456" value="'. $val->password .'">
                    </div>
                    <div class="form-group">
                      <label >Nhập lại mật khẩu</label>
                      <input type="password" class="form-control" id="exampleInputEmail1" name="repassword" placeholder="123456" />
                    </div>
                    
                        <div class="form-group">
                    <label>Quyền</label>
                    <select class="form-control select2" name="level" >
                      
                      <option selected="selected">admin</option>
                    <option>teacher</option>
                    <option>manager</option>
                    <option>user</option>
                    </select>
                  </div>
                  
                    
                  </div><!-- /.box-body -->

                  
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="'.$val->id .'">Lưu</button>
        </form>
      </div>
    </div>
  </div>
</div>';

   endforeach;?>                  
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Tài khoản</th>
                        <th>Mật khẩu</th>
                        <th>Quyền</th>
                        
                      </tr>
                    </tfoot>
                  </table>
              </div><!-- /.box -->

              
          </div>   <!-- /.row -->
          
        </section><!-- /.content -->
        
      </div><!-- /.content-wrapper -->
      

      <!-- Control Sidebar -->
      
     
    </div><!-- ./wrapper -->
    
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Edit user</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="post" action="user/do_upload" enctype="multipart/form-data" name="sub" >
                  <div class="box-body">
                    <div class="form-group">
                      <label >Tài khoản</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="admin" name="username" value="<?php echo $val->id ?>"/>
                    </div>
                    <div class="form-group">
                      <label >Mật khẩu</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="123456">
                    </div>
                    <div class="form-group">
                      <label >Nhập lại mật khẩu</label>
                      <input type="password" class="form-control" id="exampleInputEmail1" name="repassword" placeholder="123456" />
                    </div>
                    
                        <div class="form-group">
                    <label>Quyền</label>
                    <select class="form-control select2" name="level">
                      
                      <option selected="selected">admin</option>
                    <option>teacher</option>
                    <option>manager</option>
                    <option>user</option>
                    </select>
                  </div>
                  
                    
                  </div><!-- /.box-body -->

                  
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Lưu</button>
        </form>
      </div>
    </div>
  </div>
</div>

    <script src="assets/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/dist/js/demo.js" type="text/javascript"></script>
    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>
