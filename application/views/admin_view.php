<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>UET</title>
    <base href="<?php echo base_url(); ?>" />
    <link href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css">
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.js"></script>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    
  </head>
  <body class="skin-blue sidebar-mini">
  
    <div class="wrapper">

      <header class="main-header">
        <a href="welcome/index" class="logo">
          
          <span class="logo-lg"><b>UET</b></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                   
                  <span class="hidden-xs"><?php echo $username.'('.$level.')'; ?></span>
                 
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    
                    <p>
                      <?php echo '<h2 style="color: white;">'.$username.'</h2><br><h4 style="color: white;" >Quyền: '.$level.'</h4>'; ?>
                      
                    </p>
                  </li>
                  <li class="user-footer">
                    
                    <div class="pull-right">
                    <form action="welcome/logout">
                      <button  type="submit" class="btn btn-primary" name="logout">Sign out</button>
                      </form>
                    </div>
                  </li>
                </ul>
              </li>
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
            
            <li class="active"><a href="welcome/admin"><i class="fa fa-desktop"></i> <span>Trang chủ</span></a>
            </li>
            <li ><a href="user/view"><i class="fa fa-book"></i> <span>Cấp quyền</span></a>
            </li>
            <li class="treeview menu">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Thêm dữ liệu</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li ><a href="monhoc/view"><i class="fa fa-circle-o"></i> Thêm môn học</a></li>
                <li ><a href="themdiem/view"><i class="fa fa-circle-o"></i> Thêm điểm</a></li>
               
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
            Danh sách môn học
           
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#'.$val->monhocid.'edit" >Edit</button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#'.$val->monhocid.'delete">Delete</button>';
                        
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
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked />
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked />
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked />
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked />
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right" />
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
      

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
