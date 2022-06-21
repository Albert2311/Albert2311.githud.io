<?php 
include_once("connection3.php"); 
$result = mysqli_query($conn, "SELECT * FROM tintuc " );
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--THEM ICON!!!-->
    <script src="https://kit.fontawesome.com/ed720e4b54.js" crossorigin="anonymous"></script>  
    <script src="https://use.fontawesome.com/9ea6af6279.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
    <title>ADMIN - TIN TỨC </title>
    <link rel="shortcut icon" href="images/ava.png">
</head>
<style>
  *{
    margin:0; padding:0;
    box-sizing: border-box;
    outline: none; border:none;
    text-decoration: none;
    -webkit-tap-highlight-color: transparent;
  }
  body{
    align-content: center;
    padding:0;
    margin:0;
    overflow-x: hidden;
    position: relative;
    /* overflow: hidden; */
    -webkit-tap-highlight-color: transparent;
}
  body{
    width:100%;
  }
  img{
    width:100%;
    height:100%;
  }
  /* SCROLLBAR */ 
::-webkit-scrollbar {
  width: 7px;
}
 
::-webkit-scrollbar-track {
  background: #f1f1f1;
  border-radius: 10px;
}
 
::-webkit-scrollbar-thumb {
  background: #7d7d7d; 
  border-radius: 10px;
}
 
::-webkit-scrollbar-thumb:hover {
  background: black;
}
  .table thead th {
    vertical-align: middle;
    text-align: center;
  }
  .pagination-circle .page-item:first-child .page-link, .pagination-circle .page-item:last-child .page-link {
    border-radius: 0;
    border: 0;
      }
      .page-link:not(:disabled):not(.disabled) {
    cursor: pointer;
    border: 0;
    }
    .nav-sm ul.nav.child_menu li {
      display:none;
    }
    .page-link:hover {
        z-index: 2;
        color: #ffffff;
        text-decoration: none;
        background-color: #0080ff;
        border-color: #dee2e6;
    }
    .input-group.has-validation>.dropdown-toggle:nth-last-child(n+4), .input-group.has-validation>:nth-last-child(n+3):not(.dropdown-toggle):not(.dropdown-menu), .input-group:not(.has-validation)>.dropdown-toggle:nth-last-child(n+3), .input-group:not(.has-validation)>:not(:last-child):not(.dropdown-toggle):not(.dropdown-menu) {
        height: 40px;
    }
    .top_search .form-control {
        border-radius: 8px 0px 0px 8px;
        /* height: 40px; */
    }
    .top_search .input-group-btn button {
        border-radius: 0px 8px 8px 0px;
        height: 40px;
    }
    .form{
      width:100%;
      display:flex;

    }
    .table td, .table th {
    padding: 0.25rem;
    vertical-align: middle;

  }
  table.table-bordered.dataTable tbody th, table.table-bordered.dataTable tbody td {
      text-align: center;
  }
  table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after {
      bottom: 10px;
  }
  table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting {
      /* padding-right: 30px; */
      padding-top: 10px;
      padding-bottom: 10px;
  }
  .dataTables_paginate a {
      background: #0066ff4d;
      cursor: pointer;
  }
</style>
<body class="nav-sm">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a class="site_title">
                <i class="fa-solid fa-crown"></i> 
                <span>Biutyphunshop</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/ava.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Xin Chào Admin</span>
               
              </div>
            </div>
            <!-- /menu profile quick info -->

       

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
             
              <ul class="nav side-menu">
                  <li class="">
                    <a><i class="fa fa-home"></i>Trang chủ <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display:none;">
                    <li><a href="user.php">Danh sách khách hàng</a></li>
                    <li><a href="nhanvien.php">Danh sách nhân viên</a></li>
                    <li><a href="product.php">Danh sách sản phẩm</a></li>
                    <li><a href="donhang.php">Đơn hàng</a></li>
                    </ul>
                  </li>
                </ul>

                <ul class="nav side-menu">
                  <li class="">
                    <a><i class="fa fa-solid fa-chart-column"></i>Thống kê <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display:none;">
                      <li><a href="thongke.php">Bar</a></li>
                      <li><a href="thongke2.php">Line</a></li>
                    </ul>
                  </li>
                </ul>

                <ul class="nav side-menu">
                  <li class="">
                    <a><i class="fa fa-solid fa-bullhorn"></i>Tin tức <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display:none;">
                    <li><a href="admin_tintuc.php">Tin tức</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="images/ava.jpg" alt="">Admin
                    </a>
                      <a class="user-profile"  href="../dangnhap.php">
                        <i class="fa fa-sign-out"></i>Đăng xuất
                      </a>
                  </li> 
                </ul>
              </li>
            </ul>
          </nav>
        </div>
     </div>
        <!-- /top navigation -->
        <!-- page content -->
        
        
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>THÔNG BÁO </h3>
              </div>

<!-- TÌM KIẾM -->
<!-- TÌM KIẾM -->
<!-- TÌM KIẾM -->
<!-- TÌM KIẾM -->
<!-- TÌM KIẾM -->
<!-- TÌM KIẾM --> 
              <div class="title_right">
                <div class="col-md-7 col-sm-7   form-group pull-right top_search">
                  <div class="input-group">

                  </div>
                </div>
              </div>
            </div>

<!--  -->
            <div class="row" style="display: block;">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                  <div class="buttons">
                      <h2><a href ="add_tintuc.php" ><i class="fa-solid fa-plus"></i>Thêm tin mới</a></h2>
                  </div>
                  <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- FORM -->
                   
    
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                          <th>ID</th>
                          <th>Tiêu đề</th>
                          <th>Ngày tạo</th>
                          <th>Ngày cập nhật</th>
                          <th style="width: 8%;">Ảnh</th>
                          <th>Sửa</th>
                          <th>Xóa</th>
                        </tr>
                      </thead>


                      <tbody>
          
                       <?php 
                      while($row = mysqli_fetch_array($result)){
                        
                      ?>
                        <tr>
                          <td> <?= $row['id_tt'] ?> </td>
                          <td><?= $row['tieu_de'] ?></td>
                          <?php date_default_timezone_set('Asia/Ho_Chi_Minh');?>
                          <td><?= date('d/m/Y H:i:s', strtotime($row['ngay_tao'])) ?></td>
                          <?php date_default_timezone_set('Asia/Ho_Chi_Minh');?>
                          <td><?= date('d/m/Y H:i:s') ?></td>
                          <td style="width:100px;">
                            <img src="../images/<?= $row['image']; ?>" />
                          </td>
                          <td>
                            <a href="edit_tintuc.php?id_tt=<?php echo $row['id_tt'];?>">Sửa</a></td>
                          <td>
                          <a onclick = "return Del('<?php echo $row['title'];?>')"href="delete_tt.php?id_tt=<?php echo $row['id_tt'];?>">Xóa</a></td>
                    
                        </tr><?php }?>
                        </tbody>       
                    </table>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 
    
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="js/fastclick.js"></script>
    <!-- NProgress -->
    <script src="js/nprogress.js"></script>
    <!-- iCheck -->
    <script src="js/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="js/jquery.dataTables.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="js/custom.min.js"></script>



    
  </body>
</html>
