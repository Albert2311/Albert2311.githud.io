<?php 
include_once("connection3.php"); 

// $result = mysqli_query($conn, "SELECT order_detail.created,SUM(order_detail.quantity) AS SUM, product.sold FROM product
// INNER JOIN order_detail ON product.id = order_detail.pro_id 
// INNER JOIN `order` ON order.id = order_detail.order_id WHERE created BETWEEN '2022-03-07 21:58:44' AND '2022-05-24 21:58:44' ORDER BY created ASC" );
// mysqli_close($conn);
$result = mysqli_query($conn, "SELECT MONTHNAME(ngay_tao) AS CREATED, sum(sl) AS SUM FROM `chitiet` GROUP BY MONTH(ngay_tao)");
$chart_data = '';

while($row = mysqli_fetch_array($result))
{     
   $chart_data .= "{ CREATED:'".$row['CREATED']."', SUM:".$row["SUM"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);

foreach($result as $data)
{
  $month[] = $data['CREATED'];
  $quantity[] = $data['SUM'];
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
<!-- thongke -->
<script src="https://code.jquery.com/jquery-3.4.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <!--  -->
    <title>ADMIN - PRODUCT </title>
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
  .page-title .title_left {
    width: 100%;
}
.button2{
    display:flex;
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

        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">

<!-- thong ke -->

<div class="row" style="display: block;">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
   <h3 align="center">Thống kê doanh số bán hàng</h3>   


   <div id="chart"></div>

  </div>
 </body>
</html>

<script>
new Morris.Bar({
 element : 'chart',
 gridTextColor: '#9e2a2b',
 data:[<?php echo $chart_data; ?>],
 xkey:'CREATED',
 ykeys:['SUM'],
 labels:['Đã bán'],
 hideHover:'auto',
 stacked:true,
//  barColors:['#c8b6ff'],
 barColors: function(row, series, type) {
  if(series.key == 'SUM')
  {
    if(row.y < 3)
      return "#ef476f";
    else
      return "#c8b6ff";  
  }
  else
  {
    return "green";
  }
}
});

</script>
<!-- end thongke -->










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


</div>
            </div>
        </div>
    </div>
    
  </body>
</html>