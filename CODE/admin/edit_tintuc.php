<?php 
include_once("connection3.php"); 

if(isset($_GET['id_tt'])){
  $id = $_GET["id_tt"];
}

  $sql_up = "SELECT * FROM tintuc WHERE id_tt= $id ";
  $query_up = mysqli_query($conn, $sql_up);
  $row_up = mysqli_fetch_array($query_up); 
// 
?>
<?php 
  if(isset($_POST["edit"])){
    $title = $_POST['title'];
    $status = $_POST['status'];
    $ngaytao = $_POST['ngaytao'];
    $ngaycapnhat = $_POST['ngaycapnhat'];

    if($_FILES['image']['name'] == '' ){
      $image = $row_up['image'];
      }else{
      $image = $_FILES["image"]["name"];
      $image_tmp = $FILES['image']['tmp_name'];
      move_uploaded_file($image_tmp, 'images/' . $image);
      }

        $sql_up = "UPDATE tintuc SET tieu_de ='$title' ,mota ='$status' ,  ngay_tao ='$ngaytao' ,  ngay_capnhat ='$ngaycapnhat' , image = '$image' WHERE id_tt = $id  ";
        $query_up = mysqli_query($conn ,  $sql_up);
        header("location: admin_tintuc.php ");
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
	z-index: 0;
  }
  .profile_pic {
    width: 34%;
    height: 6%;
    float: left;
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
                      <img src="images/user.png" alt="">Admin
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
            <h3>Sửa sản phẩm</h3>
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
					<a href="admin_tintuc.php"><h2><i class="fa-solid fa-angles-left"></i>Quay lại</a></h2>	
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
          <!-- FORM -->
          <!-- FORM -->
          <!-- FORM -->

<?php 
    $result = mysqli_query($conn, "SELECT * FROM tintuc WHERE id_tt = $id");
    $news = $result->fetch_assoc();

    
?>

				<form name="form1" id="form1" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
					<div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 ">Tiêu đề</label>
							<div class="col-md-9 col-sm-9 ">
								<input type="text" class="form-control" name="title" id="title" value="<?php echo $news['tieu_de']; ?>">
							</div>
					</div>

                    <div class="form-group row">
						<label class="control-label col-md-3 col-sm-3 ">Ngày tạo</label>
							<div class="col-md-3 col-sm-3">
								<input type="text" class="form-control"  name="ngaytao" id="ngaytao"  value="<?php echo $news['ngay_tao']; ?>">
							</div>
			</div>
			<div class="form-group row">
						<label class="control-label col-md-3 col-sm-3 ">Ngày cập nhật</label>
							<div class="col-md-3 col-sm-3">
								<input type="text" class="form-control"   name="ngaycapnhat" id="ngaycapnhat" value="<?php echo date('d/m/Y H:i:s'); ?>">
							</div>
			</div>
                    <!-- CHi tiết -->
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Thông tin</label>
                            <div class="col-md-9 col-sm-9 ">
                                <textarea type="text" class="form-control" name="status" id="status"><?php echo $news['mota']; ?></textarea>
                            </div>
                    </div>	
                    <!-- Ảnh -->
					<div class="form-group row" style="padding-bottom:20px;">
						<label class="control-label col-md-3 col-sm-3 ">Ảnh </label>
						<div class="col-md-9 col-sm-9 ">
                <input type="file" class="form-control"  name="image" id="image" value="<?php echo $news['image'];?>">
                  <img src="../images/<?= $news['image'] ?> " style="width:20%"/><br>
						</div>
					</div>

			
			<div class="ln_solid"></div>
				<div class="form-group">
					<div class="col-md-9 col-sm-9  offset-md-3">
						
						<button type="submit" name="edit" id="edit" value=""class="btn btn-success">Save</button>
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





















