
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HÓA ĐƠN </title>
    <link rel="shortcut icon" href="images/ava.png">
    <script src="https://kit.fontawesome.com/ed720e4b54.js" crossorigin="anonymous"></script> <!--THEM ICON!!!--> 
    <script src="https://use.fontawesome.com/9ea6af6279.js"></script>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
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
    width:100%;
    /* overflow: hidden; */
  }
  tr{
    text-align: center;
  }
</style>
  <body class="nav-sm">
  <?php 
session_start();
include_once("connection3.php"); 

$result_bill = mysqli_query($conn, "SELECT CONCAT(nhanvien.firstName ,' ', nhanvien.lastName) AS ho_ten_nv , khachhang.*, donhang.* FROM donhang  
INNER JOIN khachhang ON khachhang.id_kh = donhang.id_kh 
INNER JOIN nhanvien ON nhanvien.id_nv = donhang.id_nv 
 ");

 // var_dump($order);exit;
mysqli_close($conn);
?>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title">
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
                <h2> <?php 
                  if(isset($_SESSION['fname'])){
                      echo $_SESSION['fname'];
                  }
                  ?></h2>
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
                      <a class="user-profile"  href="dangnhap.php">
                        <i class="fa fa-sign-out"></i>Log Out
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
                <h3>Danh sách đơn hàng</h3>
              </div>

              <div class="title_right">
                <div class="col-md-7 col-sm-7   form-group pull-right top_search">
                  <div class="input-group">
                    <input name="search" id="search" type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Tìm kiếm</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>


            <div class="row" style="display: block;">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                   <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                  </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table  class="table table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nhân viên thực hiện</th>
                          <th>Khách hàng</th>
                          <th>Địa chỉ</th>
                          <th>Số điện thoại</th>
                          <th>Tổng tiền</th>
                          <th>Ngày tạo</th>
                          <th>In đơn</th>
                        </tr>
                      </thead>
                      <?php 
                      while($row = mysqli_fetch_array($result_bill)){
                      ?>
                      <tbody id="employee_table">
                        <tr>
                          <td><?= $row['id_dh'] ?></td>
                          <td > <?= $row['ho_ten_nv'] ?> </td>
                          <td><?= $row['hoten'] ?></td>
                          <td><?= $row['diachi'] ?></td>
                          <td><?= $row['sdt'] ?></td>
                          <td><?= number_format($row['tong_tien']) ?></td>
                          <?php date_default_timezone_set('Asia/Ho_Chi_Minh');?>
                          <td><?= date('d/m/Y H:i:s', strtotime($row['ngay_tao'])) ?></td>
                          <td><a href="printbill.php?id=<?php echo $row['id_dh']?>"><i class="fa-solid fa-print"></i></a></td>
                          
                        </tr>
                        </tbody>
                    <?php }?>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 
        <!-- /page content -->

       


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
    <!-- Custom Theme Scripts -->
    <script src="js/custom.min.js"></script>
  </body>
</html>
<script>  
      $(document).ready(function(){  
           $('#search').keyup(function(){  
                search_table($(this).val());  
           });  
           function search_table(value){  
                $('#employee_table tr').each(function(){  
                     var found = 'false';  
                     $(this).each(function(){  
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                          {  
                               found = 'true';  
                          }  
                     });  
                     if(found == 'true')  
                     {  
                          $(this).show();  
                     }  
                     else  
                     {  
                          $(this).hide();  
                     }  
                });  
           }  
      });  
 </script>  