<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>UET</title>
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
    <?php echo form_open_multipart('welcome/view_pdf');?>

      <header class="main-header">
        <!-- Logo -->
        <a href="welcome/index" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>UET</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          
         <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="welcome/login">
                  
                  <span class="hidden-xs">Đăng nhập</span>
                </a>
                
              </li>
            </ul>
          </div>
          
        </nav>
      </header>
      
      <!-- Left side column. contains the logo and sidebar -->
      

      <!-- Content Wrapper. Contains page content -->
      
        <!-- Content Header (Page header) -->
       <section class="content-header">
          <h1>
            Danh sách điểm môn học
           
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        
                        <th>Mã lớp môn học</th>
                        <th>Tên môn học</th>
                        <th>Năm học</th>
                        <th>Học kỳ</th>
                        <th></th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($row as $k =>$val):
                      echo '<tr>                          
                        <td>'.$val->mamonhoc.'</td>
                        <td>'.$val->namemonhoc.'</td>
                        <td>'.$val->namenamhoc.'</td>
                        <td>'.$val->namehocky.' </td>
                        <td>
                        <form method="post" action="welcome/view_pdf" enctype="multipart/form-data"  >
                        ';
                        if($val->pdf!=''){
                        echo '
                        <button type="submit" class="btn btn-primary" name="'.$val->monhocid.'">View</button>';
                        }
                        echo '
                        </form>
                        </td>
                      </tr>';
                      
                      echo '
                      <div class="modal fade" id="'.$val->monhocid.'edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel">Edit</h4>
                              </div>
                              <div class="modal-body">
                                <form role="form" method="post" action="welcome/edit" enctype="multipart/form-data" name="sub" >
                  <div class="box-body">
                    <div class="form-group">
                      <label >Tên Môn Học</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="namemonhoc" value="'.$val->namemonhoc.'" />
                    </div>
                    <div class="form-group">
                      <label >Mã Lớp Môn Học</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" name="mamonhoc" value="'.$val->mamonhoc.'">
                    </div>
                    
                    <div class="form-group">
                      <label >Học Kỳ</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" name="namehocky" value="'.$val->namehocky.'">
                    </div>
                    <div class="form-group">
                      <label >Năm học</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" name="namenamhoc" value="'.$val->namenamhoc.'">
                    </div>
                    
                    
                  </div><!-- /.box-body -->
                    </div>
                              <div class="modal-footer">
                              
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="'.$val->monhocid.'">Lưu</button>
                              </form>
                              </div>
                            </div>
                          </div>
                        </div>';
                    echo '
                      <div class="modal fade" id="'.$val->monhocid.'delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel">Edit user</h4>
                              </div>
                              <div class="modal-body">
                                <h3>Bạn có đồng ý xóa môn học: '.$val->namemonhoc.' '.$val->mamonhoc.'</h3>
                            
                              <div class="modal-footer">
                              <form role="form" method="post" action="welcome/delete" enctype="multipart/form-data" name="sub" >
                                <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                                <button type="submit" class="btn btn-primary" name="'.$val->monhocid .'">Có</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>';
                       endforeach;?>
                      
                    </tbody>
                    <tfoot>
                      <tr>
                        
                        <th>Mã lớp môn học</th>
                        <th>Tên môn học</th>
                        <th>Năm học</th>
                        <th>Học kỳ</th>
                        <th></th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      
      <footer class="main">
      <center>
        <div class="pull-right hidden-xs">
          
        </div>
        <strong>Copyright &copy; 2015-2016 <a href="#">Nhóm 12</a>.</strong>
      </center>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    <!-- ./wrapper -->
      

      <!-- Control Sidebar -->
      
     
    </div><!-- ./wrapper -->

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
