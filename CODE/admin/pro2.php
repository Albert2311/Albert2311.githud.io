<?php 
include_once("connection3.php"); 

// $result = mysqli_query($conn, "SELECT * FROM product ORDER BY id DESC" );
// mysqli_close($conn);
if(isset($_GET['page']))
{
  $page = $_GET['page'];
}
else{
  $page = 1;
}

$limit = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page -1) * $limit ;

$result = $conn->query("SELECT * FROM product ORDER BY id DESC LIMIT $start, $limit ");
$product = $result->fetch_all(MYSQLI_ASSOC);

$result1 = $conn->query("SELECT count(id) AS id FROM product");
$custCount = $result1->fetch_all(MYSQLI_ASSOC);
$total = $custCount[0]['id'];
$pages = ceil( $total / $limit);

$Previous= $page - 1 ;
$Next = $page + 1;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--THEM ICON!!!-->
    <script src="https://kit.fontawesome.com/ed720e4b54.js" crossorigin="anonymous"></script>  
    <script src="https://use.fontawesome.com/9ea6af6279.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
    <title>ADMIN - PRODUCT </title>
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
  }
  body{
    width:100%;
  }
  img{
    width:100%;
    height:100%;
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
    .page-link:not(:disabled):not(.disabled) {
    cursor: pointer;
    border: 0;
    border-radius: 50%;
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
                      <li><a href="pro2.php">Sản phẩm</a></li>
                      <li><a href="donhang.php">Đơn hàng</a></li>
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
                <h3>Danh sách sản phẩm</h3>
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

                  <!-- <form id="search" action="pro2.php" class="form" method="post"> -->
                  <input type="text" name="search" id="search"class="form-control" placeholder="Search for...">
                    
                  <!-- <span class="input-group-btn">
                      <inputt type="submit" class="btn btn-default" >Tìm kiếm</inputt>
                    </span>
                   </form> -->


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
                      <h2><a href ="add-pro2.php" ><i class="fa-solid fa-plus"></i>Thêm sản phẩm</a></h2>
                  </div>


<nav aria-label="Page navigation example ">
  <ul class="pagination pagination-circle pg-blue justify-content-end">
    <!-- FIRST PAGE -->
    <li class="page-item "><a href="pro2.php?page=1"class="page-link">First</a></li>
<!-- PREVIOUS -->
    <?php if($page > 1){ echo "
      <li class='page-item '>
      <a href='pro2.php?page= $Previous' class='page-link' aria-label='Previous'>
        <span aria-hidden='true'>&laquo;</span>
        <span class='sr-only'>Previous</span>
      </a>
    </li>
    ";} for($i = 1; $i <= $pages; $i++) : 
      if($i == $page){?>            
      <li class="page-item active"><a href="pro2.php?page=<?= $i;?>" class="page-link"><?php echo $i;?></a></li>
     <?php }else{?>
      
      <li class="page-item"><a href="pro2.php?page=<?= $i;?>" class="page-link"><?php echo $i;?></a></li>
      <?php } ?>
   <?php endfor;?>
<!-- NEXT -->
   <?php if($page < $pages){ echo "
    <li class='page-item'>
      <a href='pro2.php?page= $Next' class='page-link' aria-label='Next'>
        <span aria-hidden='true'>&raquo;</span>
        <span class='sr-only'>Next</span>
      </a>
    </li>
   ";}?>
   <!-- LAST PAGE -->
    <li class="page-item"><a href="pro2.php?page=<?= $pages;?>" class="page-link">Last</a></li>
  </ul>
</nav>
 <!--/ page content -->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- FORM -->
                    <table id="employee_table" class="table table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Tên sản phẩm</th>
                          <th>Loại sản phẩm</th>
                          <th>Ngày tạo</th>
                          <th>Cập nhật</th>
                          <th>Giá bán</th>
                          <th>Số lượng</th>
                          <th>Màu</th>
                          <th>Size</th>
                          <th>Mô tả</th>
                          <th>Ảnh</th>
                          <th>Sửa</th>
                          <th>Xóa</th>
                        </tr>
                      </thead>
                      <?php 
                      // while($row = mysqli_fetch_array($result)){
                        
                      ?>
                      <tbody>
                        <?php foreach($product as $product) :?>
                        <tr>
                          <td> <?= $product['id'] ?> </td>
                          <td><?= $product['name'] ?></td>
                          <td><?= $product['type'] ?></td>
                          <td><?= date('d/m/Y ', strtotime($product['create_at'])) ?></td>
                          <td><?= date('d/m/Y ') ?></td>
                          <td><?= number_format($product['price']) ?></td>
                          <td><?= $product['amount'] ?></td>
                          <td><?= $product['color'] ?></td>
                          <td><?= $product['size'] ?></td>
                          <td><?= $product['mota'] ?></td>
                          <td style="width:100px;">
                            <img src="../images/<?= $product['image']; ?>" />
                          </td>
                          <td>
                            <a href="edit.php?idsanpham=<?php echo $product['id'];?>">Sửa</a></td>
                          <td>
                          <a onclick = "return Del('<?php echo $product['name'];?>')"href="delete.php?idsanpham=<?php echo $row['id'];?>">Xóa</a></td>
                    
                        </tr>
                        </tbody>
                    <?php endforeach;?>
                     
                          
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
       
        <!-- /footer content -->


    <!-- jQuery -->
    <!-- <script src="js/jquery.min.js"></script> -->
     <!-- jquery -->
     <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
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
	function Del(name){
		return confirm("Admin có chắc muốn xóa sản phẩm: " + name + "?");
	}

	</script>

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