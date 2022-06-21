<?php 
include_once("connection3.php"); 

$sql_add = "SELECT * FROM nhanvien";
$query_add = mysqli_query($conn, $sql_add);


    if(isset($_POST['submit2'])){
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];

        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES["image"]["tmp_name"];

        $gender = $_POST['gender']; 
        $sql_add = "INSERT INTO nhanvien (firstName, lastName, email,image, gender, user_type) VALUES ('".$firstName."' ,'".$lastName."' , '".$email."','".$image."', '".$gender."','Nhân viên')";
        mysqli_query($conn, $sql_add);
        header("Location: nhanvien.php ");
        // echo $sql_add;
    }  
    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ADMIN - PRODUCT </title>
    <link rel="shortcut icon" href="images/ava.png">
    <script src="https://kit.fontawesome.com/ed720e4b54.js" crossorigin="anonymous"></script> <!--THEM ICON!!!--> 
    <script src="https://use.fontawesome.com/9ea6af6279.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script type="text/javascript" src="jquery-validate.js"></script> -->
    <script language="javascript">
        $(document).ready(function () {
           $("#form1").validate({
                rules: {
                  firstName: {required: true},
                  lastName: {required: true},
                  email: {required: true},
                  image: {required: true},
                  gender: {required: true},   
                },
                messages: {
                  firstName: {required: "Admin chưa đăng nhập tên sản phẩm"},
                  lastName: {required:  "Admin chưa tải ảnh sản phẩm"},
                  email: {required:  "Admin chưa nhập loại sản phẩm"},
                  image: {required:  "Admin chưa nhập loại sản phẩm"},
                  gender: {required:  "Admin chưa nhập giá sản phẩm"},
                }
           }); 
        });
    </script>

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
    }
    img{
        width:100%;
        height:100%;
    }
    label{
        align-items: center;
    }
    .nav-md .container.body .col-md-3.left_col {
        z-index: -2;
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
                <img src="images/giay2.2.webp" alt="..." class="img-circle profile_img">
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
                
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="images/ava.jpg" alt="">Admin
                    </a>
                      <a class="user-profile"  href="dangnhap.php">
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
<div class="right_col" role="main" >
         
    <div class="page-title">
        <div class="title_left">
            <h3>Thêm nhân viên</h3>
        </div>

    <div class="title_right">
        <div class="col-md-7 col-sm-7   form-group pull-right top_search">
            <div class="input-group">
		        <input type="text" class="form-control" placeholder="Search for...">
		        <span class="input-group-btn">
		          <button class="btn btn-default" type="button">Tìm kiếm</button>
		        </span>
		      </div>
		    </div>
		  </div>
		</div>

		<div class="clearfix"></div>
        <div class="row">
			<div class="col-md-12 ">
				<div class="x_panel">
					<div class="x_title">
					<a href="nhanvien.php"><h2><i class="fa-solid fa-angles-left"></i>Quay lại</a></h2>	
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>				  
				<div class="x_content">
					<br />

<!-- FORM -->
<!-- FORM -->
<!-- FORM -->       
<!-- FORM -->
				<form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left" id="form1" name ="form1">
					<div class="form-group row">
						<label class="control-label col-md-3 col-sm-3 ">Họ</label>
							<div class="col-md-3 col-sm-3 ">
								<input type="text" class="form-control"  name="lastName" id="lastName">
							</div>
					</div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 ">Tên</label>
                        <div class="col-md-3 col-sm-3">
                            <input type="text" class="form-control"  name="firstName" id="firstName">
                        </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 ">Email</label>
                        <div class="col-md-3 col-sm-3">
                            <input type="text" class="form-control"  name="email" id="email" >
                        </div>
                </div>
                
                <div class="form-group row">
						<label class="control-label col-md-3 col-sm-3 ">Ảnh </label>
						<div class="col-md-9 col-sm-9 ">
							<input type="file" class="form-control" name="image" id="image">
						</div>
					</div>
                
                <div class="form-group row">
				<label class="col-md-3 col-sm-3  control-label">Giới tính</label>
			    <div class="col-md-3 col-sm-3 " style="padding: 8px;display:flex;align-items: center;justify-content: space-evenly">
					<div class="radio">
                        <label>
                            <input checked="checked" type="radio" id="gender" name="gender" value="Nữ"> Nữ
                        </label>
				    </div>
				    <div class="radio">
                        <label>
                            <input type="radio" id="gender" name="gender" value="Nam"> Nam
                        </label>
				    </div>
                </div>
		        </div>

                    <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9  offset-md-3">
                                
                                <button type="submit" name="submit2" id="submit2" class="btn btn-success">Save</button>
                            </div>
                        </div>

			</form>		
            </div>
          </div>
        </div>
      </div>
    </div>



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


