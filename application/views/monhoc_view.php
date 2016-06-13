<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>UET</title>
    <base href="<?php echo base_url(); ?>" />
    <!-- Tell the browser to be responsive to screen width -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css">
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.js"></script>
    <!-- Bootstrap 3.3.4 -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
    
      <header class="main-header">
        <!-- Logo -->
        <a href="welcome/index" class="logo">
          <span class="logo-lg"><b>UET</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          
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
            <?php if($level=='admin'){
                echo '
            <li><a href="welcome/admin"><i class="fa fa-desktop"></i> <span>Trang chủ</span></a>
            </li>
            <li><a href="user/view"><i class="fa fa-book"></i> <span>Cấp quyền</span></a>
            </li>
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Thêm dữ liệu</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="monhoc/view"><i class="fa fa-circle-o"></i> Thêm môn học</a></li>
                <li ><a href="themdiem/view"><i class="fa fa-circle-o"></i> Thêm điểm</a></li>
               
              </ul>
            </li>';}
            else {
                echo '
            
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Thêm dữ liệu</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                
                <li class="active"><a href="monhoc/view"><i class="fa fa-circle-o"></i> Thêm môn học</a></li>
               
              </ul>
            </li>';
            }
            ?>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          
          
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h2>Thêm môn học bằng file excel</h2>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="monhoc/do_upload" enctype="multipart/form-data" name="sub" >
                  <div class="box-body">
                    
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" id="exampleInputFile" name="file">
                      
                    </div>
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" name='save'> Submit </button>
                  </div>
                </form>
              </div><!-- /.box -->
              
              <div class="box box-primary">
                <div class="box-header with-border">
                <h2>Thêm Môn Học</h2>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="monhoc/add" enctype="multipart/form-data" name="sub" >
                
                  <div class="box-body">
                    <div class="form-group">
                        <label>Mã môn học</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="mã lớp môn học" name="mamonhoc"/>    
                      
                    </div>
                    <div class="form-group">
                        <label>Tên môn học</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="tên lóp môn học" name="tenmonhoc"/>    
                      
                    </div>
                    
                    <div class="form-group">
                      <label>Học kì</label>
                        <select class="form-control select2" name="hocky" >
                        <option>kì I</option>
                        <option>kì II</option>
                    </div>
                    <div class="form-group">
                    <label></label>
                    <select class="form-control">
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Năm học</label>
                        <select class="form-control select2" name="namhoc" >
                        <option>2015-2016</option>
                        <option>2014-2015</option>
                    </div>
                    <div class="form-group">
                    <label></label>
                    <select class="form-control">
                        </select>
                    </div>
                    
                    
                  </div>
                
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" name='submit'> Submit </button>
                  </div>
                </form>
              </div><!-- /.box -->
            
            <div class="box box-primary">
                <div class="box-header with-border">
                <h2>Danh sách môn học</h2>
                </div><!-- /.box-header -->
                <!-- form start -->
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Mã môn học</th>
                        <th>Tên môn học</th>
                        
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($row as $k =>$val):
                      echo '<tr>                          
                        
                        <td>'.$val->mamonhoc.'</td>
                        <td>'.$val->namemonhoc.'</td>
                      <td>
                        
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#'.$val->monhocid.'edit" >Edit</button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#'.$val->monhocid.'delete">Delete</button>
                        </td>



                      </tr>';
                      
                      echo '
                      <div class="modal fade" id="'.$val->monhocid.'edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel">Edit user</h4>
                              </div>
                              <div class="modal-body">
                                <form role="form" method="post" action="monhoc/edit" enctype="multipart/form-data" name="sub" >
                                  <div class="box-body">
                                    <div class="form-group">
                                      <label >Mã môn học</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1"  name="mamonhoc" value="'. $val->mamonhoc .'"/>
                                    </div>
                                    <div class="form-group">
                                      <label >Tên môn học</label>
                                      <input type="text" class="form-control" id="exampleInputPassword1" name="namemonhoc"  value="'. $val->namemonhoc .'">
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
                                <h3>Bạn có đồng ý xóa môn học: '.$val->namemonhoc." ".$val->mamonhoc.'</h3>
                            
                              <div class="modal-footer">
                              <form role="form" method="post" action="monhoc/delete" enctype="multipart/form-data" name="sub" >
                                <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                                <button type="submit" class="btn btn-primary" name="'.$val->monhocid .'">Có</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>  
                   
                      </tr>';
                       endforeach;?>
                       
                      
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Mã môn học</th>
                        <th>Tên môn học</th>
                        
                      </tr>
                    </tfoot>
                  </table>
              </div><!-- /.box -->
              
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      

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
