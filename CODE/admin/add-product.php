<?php 
include_once("connection3.php"); 

$sql = "SELECT * FROM sanpham";
$query = mysqli_query($conn, $sql);


    if(isset($_POST['submit'])){
        $name = $_POST['name'];

        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES["image"]["tmp_name"];

        // $image2 = $_FILES['image2']['name'];
        // $image2_tmp = $_FILES["image2"]["tmp_name"];

        $type = $_POST['type'];
        $price = $_POST['price'];
        $sale = $_POST['sale'];
        $amount = $_POST['amount'];
        $color = $_POST['color'];
        $size = $_POST['size'];
        $mota = $_POST['mota'];
        $update_at = $_POST['update_at'];
        $create_at = $_POST['create_at'];

        // move_uploaded_file($image_tmp, 'images/'.$image);
        
        $sql = "INSERT INTO sanpham (ten_sp, image, gia, mota, type,  color, size, sale, sl, ngay_tao, ngay_capnhat) VALUES ('".$name."' ,'".$image."' , ".$price." ,'".$mota."','".$type."' ,'".$color."','".$size."',  ".$sale.", ".$amount.",CURRENT_DATE() ,'".$update_at."')";
        mysqli_query($conn, $sql);
        header("Location: product.php ");
        // echo $sql;
   }  
            
   $insert_id = "SELECT max(id_sp) FROM sanpham";
   $sql_gallery = mysqli_query($conn,$insert_id);
   $max_id = mysqli_fetch_array($sql_gallery);
   $insert = $max_id[0];
   if(isset($_POST['submit'])){
     foreach($_FILES['gallery']['name'] as $y => $name){
       $name = $_FILES['gallery']['name'][$y];
       $x = $_FILES['gallery']['tmp_name'][$y];
       $z = explode('.',$name);
       $exit = end($z);
       $u = 'images/';
       $u = $u.basename($z[0].time().'.'.$exit);
       $t = basename($z[0].time().'.'.$exit);

       if(move_uploaded_file($x, $u)){
         $upload = mysqli_query($conn,"INSERT INTO thuvienanh (id_sp, ten_anh) VALUES (".$insert.", '".$t."')");

       }
     }
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
    <script src="../ckeditor/ckeditor/ckeditor.js"></script>
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
            <h3>Thêm sản phẩm</h3>
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
					<a href="product.php"><h2><i class="fa-solid fa-angles-left"></i>Quay lại</a></h2>	
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
						<label class="control-label col-md-3 col-sm-3 ">Tên sản phẩm</label>
							<div class="col-md-9 col-sm-9 ">
								<input type="text" class="form-control"  name="name" id="name">
							</div>
					</div>
					<div class="form-group row">
						<label class="control-label col-md-3 col-sm-3 ">Ảnh </label>
						<div class="col-md-9 col-sm-9 ">
							<input type="file" class="form-control" name="image" id="image">
						</div>
					</div>

          <div class="form-group row">
						<label class="control-label col-md-3 col-sm-3 ">Thư viện ảnh </label>
						<div class="col-md-9 col-sm-9 ">
							<input multiple="" type="file" class="form-control" name="gallery[]">
						</div>
					</div>

					<div class="form-group row">
						<label class="control-label col-md-3 col-sm-3 ">Loại</label>
							<div class="col-md-9 col-sm-9 ">
                <select name="type" id="type" class="form-control">
                  <option>Quần</option>
									<option>Áo</option>
							</select>
						</div>
					</div>

			<div class="form-group row">
				<label class="control-label col-md-3 col-sm-3 ">Giá</label>
					<div class="col-md-9 col-sm-9 ">
						<input type="number" class="form-control" name="price" id="price">
					</div>
				</div>

        <div class="form-group row">
				<label class="control-label col-md-3 col-sm-3 ">Sale</label>
					<div class="col-md-9 col-sm-9 ">
						<input type="number" class="form-control" name="sale" id="sale">
					</div>
				</div>

			<div class="form-group row">
				<label class="control-label col-md-3 col-sm-3 ">Số lượng</label>
					<div class="col-md-9 col-sm-9 ">
						<input type="number" class="form-control" name="amount" id="amount">
					</div>
				</div>
				<div class="form-group row">
						<label class="control-label col-md-3 col-sm-3 ">Màu</label>
							<div class="col-md-9 col-sm-9 ">
								<select name="color" id="color" class="form-control">
									<option>Trắng</option>
									<option>Đen</option>
									<option>Vàng</option>
									<option>Hồng</option>
									<option>Xanh</option>
									<option>Be</option>
									<option>Xám</option>
									<option>Hồng nhạt</option>
							</select>
						</div>
					</div>

			<div class="form-group row">
				<label class="col-md-3 col-sm-3  control-label">Size</label>
			<div class="col-md-6 col-sm-6 " style="padding: 8px;display:flex;align-items: center;justify-content: space-between">
					<div class="radio">
					<label>
						<input checked="checked" type="radio" id="size" name="size" value="S"> S
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" id="size" name="size" value="M"> M
					</label>
				</div>
        <div class="radio">
					<label>
						<input type="radio" id="size" name="size" value="L"> L
					</label>
				</div>

			</div>
		</div>

			<div class="form-group row">
				<label class="control-label col-md-3 col-sm-3 ">Mô tả</label>
					<div class="col-md-9 col-sm-9 ">
						<textarea type="text" class="form-control" name="mota" id="mota"></textarea>
            <div class="clear-both"></div>
					</div>
			</div>	
			<div class="form-group row">
						<label class="control-label col-md-3 col-sm-3 ">Ngày tạo</label>
							<div class="col-md-3 col-sm-3">
								<input type="text" class="form-control"  name="create_at" id="create_at" value="<?php echo date('d/m/Y ' )?>">
							</div>
			</div>
			<div class="form-group row">
						<label class="control-label col-md-3 col-sm-3 ">Ngày cập nhật</label>
							<div class="col-md-3 col-sm-3">
								<input type="text" class="form-control"  name="update_at" id="update_at" value="<?php echo date('d/m/Y ' )?>" >
							</div>
			</div>
			<div class="ln_solid"></div>
				<div class="form-group">
					<div class="col-md-9 col-sm-9  offset-md-3">
						
						<button type="submit" name="submit" id="submit" class="btn btn-success">Save</button>
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
<script> CKEDITOR.replace('mota'); </script>
  </body>
</html>

               
<script>
	function Del(name){
		alert("Admin có chắc muốn xóa sản phẩm: " + name + "?");
	}

	</script>
