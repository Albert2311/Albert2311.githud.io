<?php 
include_once("connection3.php"); 

$result = mysqli_query($conn, "SELECT * FROM nhanvien" );
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

    <title>ADMIN - NHANVIEN </title>
    <link rel="shortcut icon" href="images/ava.png">
    <script src="https://kit.fontawesome.com/ed720e4b54.js" crossorigin="anonymous"></script> <!--THEM ICON!!!--> 
    <script src="https://use.fontawesome.com/9ea6af6279.js"></script>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script language="javascript">
        $(document).ready(function () {
           $("#form1").validate({
                rules: {
                  name: {required: true},
                  image: {required: true},
                  
                  type: {required: true},
                  price: {required: true},
                 sale: {required: true},
                  amount: {required: true},
                  color: {required: true},
                  mota: {required: true},
                  create_at: {required: true},
                  update_at: {required: true},
                },
                messages: {
                  name: {required: "Admin chưa đăng nhập tên sản phẩm"},
                  image: {required:  "Admin chưa tải ảnh sản phẩm"},
                 
                  type: {required:  "Admin chưa nhập loại sản phẩm"},
                  price: {required:  "Admin chưa nhập giá sản phẩm"},
                  sale: {required:  "Admin chưa nhập giá sale sản phẩm"},
                  amount: {required:  "Admin chưa nhập số lượng sản phẩm"},
                  color: {required:  "Admin chưa nhập màu sản phẩm"},
                  mota: {required:  "Admin chưa nhập mô tả sản phẩm"},
                  create_at: {required:  "Admin chưa nhập ngày tạo sản phẩm"},
                  update_at: {required:  "Admin chưa nhập ngày cập nhật sản phẩm"},

                }
           }); 
        });
    </script>
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
  img {
    width: 100%;
    padding: 0;
}
</style>
  <body class="nav-sm">
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
                  if(isset($_SESSION['name'])){
                      echo $_SESSION['name'];
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
                      <a class="user-profile"  href="../dangnhap.php">
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
                <h3>Danh sách nhân viên</h3>
              </div>

              <div class="title_right">
                <div class="col-md-7 col-sm-7   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search for..."> 
                  </div>
                </div>
              </div>
            </div>


            <div class="row" style="display: block;">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                  <div class="buttons">
                      <h2><a href ="add_nhanvien.php" ><i class="fa-solid fa-plus"></i>Thêm nhân viên</a></h2>
                  </div>
                   <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                  </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <table class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Họ</th>
                          <th>Tên</th>
                          <th>Email</th>
                          <th>Ảnh</th>
                          <th>Giới tính</th>
                          <th>Phân quyền</th>
                          <th>Sửa</th>
                          <th>Xóa</th>
                        </tr>
                      </thead>
                      <?php 
                      while($row = mysqli_fetch_array($result)){
                        
                      ?>
                      <tbody id="employee_table">
                        <tr>
                          <td> <?= $row['id_nv'] ?> </td>
                          <td><?= $row['lastName'] ?></td>
                          <td><?= $row['firstName'] ?></td>
                          <td><?= $row['email'] ?></td>
                           <td style="width:10%;">
                            <img src="../images/<?= $row['image']; ?>" />
                          </td>
                          <td><?= $row['gender'] ?></td>
                          <td><?= $row['user_type'] ?></td>
                          <td>
                          <a href="edit_nv.php?id_nv=<?php echo $row['id_nv'];?>">Sửa</a></td>
                          <td>
                          <a href="delete_nv.php?id_nv=<?php echo $row['id_nv'];?>">Xóa</a></td>
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

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          
        </footer>
        <!-- /footer content -->


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