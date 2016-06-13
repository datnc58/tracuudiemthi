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
          <!-- mini logo for sidebar mini 50x50 pixels -->
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
                
                <li ><a href="themdiem/view"><i class="fa fa-circle-o"></i> Thêm điểm</a></li>
               
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
                <h2>Thêm điểm</h2>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="themdiem/do_upload" enctype="multipart/form-data" name="sub" >
                
                  <div class="box-body">
                    <div class="form-group">
                        <label>Mã môn học</label>
                        <select class="form-control select2" name="mamonhoc" >
                        <?php foreach ($row as $k =>$val):
                        echo '
                        <option>'.$val->mamonhoc.'</option>';
                        endforeach; ?>    
                      
                    </div>
                    <div class="form-group">
                    <label></label>
                    <select class="form-control">
                        </select>
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
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" id="exampleInputFile" name="userfile">
                      
                    </div>
                    
                  </div>
                
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" name="ok">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->

              
          </div>   <!-- /.row -->
          
          
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      

      <!-- Control Sidebar -->
      
     
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="assets/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>
