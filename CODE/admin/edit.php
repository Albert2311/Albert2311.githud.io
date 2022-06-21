<?php 
include_once("connection3.php"); 


if(isset($_GET['idsanpham'])){
  $id = $_GET["idsanpham"];
}

  $sql_up = "SELECT * FROM sanpham WHERE id_sp= $id ";
  $query_up = mysqli_query($conn, $sql_up);
  $row_up = mysqli_fetch_array($query_up);
// 
?>
<?php 
  if(isset($_POST["edit"])){
    $name = $_POST['name'];

    if($_FILES['image']['name'] == '' ){
    $image = $row_up['image'];
    }else{
    $image = $_FILES["image"]["name"];
    $image_tmp = $FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp, 'images/' . $image);
    }

    $type = $_POST['type'];
    $price = $_POST['price'];
    $sale = $_POST['sale'];
// $price = number_format($price, 0, "." , ",");
    $amount = $_POST['amount'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $mota = $_POST['mota'];
    $update_at = $_POST['update_at'];
    $create_at = $_POST['create_at'];

 
        $sql_up = "UPDATE sanpham SET image ='$image' ,  ten_sp ='$name' ,  type ='$type' ,  gia ='$price' , sale ='$sale' , sl ='$amount' ,  color ='$color' ,  size ='$size' ,  mota ='$mota' , ngay_tao ='$create_at' ,  ngay_capnhat ='$update_at' WHERE id_sp = $id  ";
        $query_up = mysqli_query($conn ,  $sql_up);
        header("location: product.php ");
    }
  
?>
<?php 
 

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
          <!-- FORM -->
          <!-- FORM -->
          <!-- FORM -->

<?php 
    $result = mysqli_query($conn, "SELECT * FROM sanpham WHERE id_sp = $id");
    $product = $result->fetch_assoc();
    // var_dump ($product);exit;
    
?>

				<form name="form1" id="form1" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
					<div class="form-group row">
						<label class="control-label col-md-3 col-sm-3 ">Tên sản phẩm</label>
							<div class="col-md-9 col-sm-9 ">
								<input type="text" class="form-control"  name="name" id="name" value="<?php echo $product['ten_sp']; ?>">
							</div>
					</div>

					<div class="form-group row" style="padding-bottom:20px;">
						<label class="control-label col-md-3 col-sm-3 ">Ảnh </label>
						<div class="col-md-9 col-sm-9 ">
              <input type="file" class="form-control" name="image" id="image" value="<?php echo $product['image'];?>">

                  <img src="../images/<?= $product['image'] ?> " style="width:20%"/><br>
                  <!-- <input type="hidden" class="form-control" name="image" id="image" value="<?php echo $product['image'];?>" /> -->
						</div>
					</div>
          
          <div class="form-group row" style="padding-bottom:20px;">
						<label class="control-label col-md-3 col-sm-3 ">Thư viện ảnh </label>
						<div class="col-md-9 col-sm-9 ">
              <input multiple="" type="file" class="form-control" name="gallery[]" value="<?php echo $product['ten_anh'];?>">
                  <img src="../images/<?= $product['ten_anh'] ?> " style="width:20%"/><br>
						</div>
					</div>

					<div class="form-group row">
						<label class="control-label col-md-3 col-sm-3 ">Loại</label>
							<div class="col-md-9 col-sm-9 ">
								<select name="type" id="type" class="form-control" value="<?php echo $product['type']; ?>">
								
                    <?php 
                    if("Quần" == $product['type']){
                      echo "<option selected='selected' value='Quần'>Quần</option>";
                    }else {
                      echo "<option value='Quần'>Quần</option>";
                    }
                    ?>

                    <?php 
                    if("Áo" == $product['type']){
                      echo "<option selected='selected' value='Áo'>Áo</option>";
                    }else {
                      echo "<option value='Áo'>Áo</option>";
                    }
                    ?>
				
							</select>
						</div>
					</div>

			<div class="form-group row">
				<label class="control-label col-md-3 col-sm-3 ">Giá</label>
					<div class="col-md-9 col-sm-9 ">
						<input type="number" class="form-control" name="price" id="price" value="<?php echo $product['gia']; ?>">
					</div>
				</div>
        
			<div class="form-group row">
				<label class="control-label col-md-3 col-sm-3 ">Giảm giá</label>
					<div class="col-md-9 col-sm-9 ">
						<input type="number" class="form-control" name="sale" id="sale" value="<?php echo $product['sale']; ?>">
					</div>
				</div>

			<div class="form-group row">
				<label class="control-label col-md-3 col-sm-3 ">Số lượng</label>
					<div class="col-md-9 col-sm-9 ">
						<input type="number" class="form-control" name="amount" id="amount" value="<?php echo $product['sl']; ?>">
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
					 <?php 
            if("S" == $product['size']){
              echo "<input checked='checked' type='radio' id='size' name='size' value='S'> S";
            }else {
              echo "<input type='radio' id='size' name='size' value='S'> S" ;
            }
            ?>
					</label>
				</div>

        <div class="radio">
					<label>
					 <?php 
            if("M" == $product['size']){
              echo "<input checked='checked' type='radio' id='size' name='size' value='M'> M";
            }else {
              echo "<input type='radio' id='size' name='size' value='M'> M" ;
            }
            ?>
					</label>
				</div>

        <div class="radio">
					<label>
					 <?php 
            if("L" == $product['size']){
              echo "<input checked='checked' type='radio' id='size' name='size' value='L'> L";
            }else {
              echo "<input type='radio' id='size' name='size' value='L'> L" ;
            }
            ?>
					</label>
				</div>
        
			</div>
		</div>

			<div class="form-group row">
				<label class="control-label col-md-3 col-sm-3 ">Mô tả</label>
					<div class="col-md-9 col-sm-9 ">
						<textarea type="text" class="form-control" name="mota" id="mota"><?php echo $product['mota']; ?></textarea>
					</div>
			</div>	
			<div class="form-group row">
						<label class="control-label col-md-3 col-sm-3 ">Ngày tạo</label>
							<div class="col-md-3 col-sm-3">
								<input type="date" class="form-control"  name="create_at" id="create_at" value="<?php echo $product['ngay_tao']; ?>">
							</div>
			</div>
			<div class="form-group row">
						<label class="control-label col-md-3 col-sm-3 ">Ngày cập nhật</label>
							<div class="col-md-3 col-sm-3">
								<input type="text" class="form-control"  name="update_at" id="update_at" value="<?php echo date('m/d/Y'); ?>">
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

<!-- <?php
//     if(isset($_POST['submit'])){
//         $name = $_POST['name'];
//  $image = $_FILES['image']['name'];
//         $image_tmp = $_FILES["image"]["tmp_name"];
//       //  if($_FILES['image']['name'] == '') {
//       //     $image = $product['name'];
//       //  }else{
//       //   $image = $row_up['name'];
//       //  }

//         $type = $_POST['type'];
//         $price = $_POST['price'];

// 		// $price = number_format($price, 0, "." , ",");

//         $amount = $_POST['amount'];
//         $color = $_POST['color'];
//         $size = $_POST['size'];
//         $mota = $_POST['mota'];
//         $update_at = $_POST['update_at'];
//         $create_at = $_POST['create_at'];
 

//         // move_uploaded_file($image_tmp, 'images/'.$image);
        
//         $sql = "UPDATE product SET image ='.$image.' ,  name ='.$name.' ,  type ='.$type.' ,  price ='.$price.' ,  amount ='.$amount.' ,  color ='.$color.' ,  size ='.$size.' ,  mota ='.$mota.' ,  create_at ='.$create_at.' ,  update_at ='.$update_at.' WHERE id = '$id'  ";
//         mysqli_query($conn ,  $sql_up);
//         // header('Location:../../index.php?action=quanlysanpham');  
        
//     }  
    
       

?> -->
<script>
	function Del(name){
		alert("Admin có chắc muốn xóa sản phẩm: " + name + "?");
	}

	</script>


















