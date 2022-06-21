<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://kit.fontawesome.com/ed720e4b54.js" crossorigin="anonymous"></script> <!--THEM ICON!!!--> 
    <title>HÓA ĐƠN</title>
    <link rel="shortcut icon" href="images/ava.png">
    <!-- bill -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- slide bar -->
    <link href="css/bootstrap2.min.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sidebars/">
    <link href="css/sidebars.css" rel="stylesheet">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');body{background-color: #ffe8d2;font-family: 'Montserrat', sans-serif}.card{border:none}.logo{background-color: #eeeeeea8}.totals tr td{font-size: 13px}.footer{background-color: #eeeeeea8}.footer span{font-size: 12px}.product-qty span{font-size: 12px;color: #dedbdb}
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      .fa-cart-plus:before {
    content: "\f217";
    padding-right: 7px;
    }
      .nav-link:hover{
          background: #ababf6;
      }
      
    main {
  overflow-y: auto;
    }
    .mt-5 {
        margin-top: 0rem!important;
    }
    .col-md-8 {
        flex: 0 0 auto;
        width: 77.7777778%;
    }
</style>
<body>
<?php 
    session_start();
    include 'connection3.php';
    $order = mysqli_query($conn, "SELECT sanpham.color,donhang.id_dh,donhang.tong_tien, donhang.ngay_tao, sanpham.*, chitiet.*,CONCAT(nhanvien.lastName ,' ',nhanvien.firstName ) AS ho_ten_nv, khachhang.hoten,sanpham.ten_sp, sanpham.image,sanpham.size,khachhang.diachi, khachhang.sdt FROM  `donhang`
    INNER JOIN chitiet ON donhang.id_dh = chitiet.id_dh
    INNER JOIN sanpham ON sanpham.id_sp = chitiet.id_sp
    INNER JOIN nhanvien ON nhanvien.id_nv = donhang.id_nv
    INNER JOIN khachhang ON donhang.id_kh = khachhang.id_kh
    WHERE donhang.id_dh = " . $_GET['id']);
    $order = mysqli_fetch_all($order, MYSQLI_ASSOC);
    // var_dump($order);exit;

?>
<!-- Bill -->
<!-- Bill -->
<!-- Bill -->
<!-- Bill -->
<!-- Bill -->
<!-- Bill -->
<!-- Bill -->
<div class="container mt-5 mb-5">
<div class="row d-flex justify-content-center">
<div class="col-md-8">
<div class="card">
    <div class="text-left logo p-2 px-5">
        <img src="images/icon.png" width="50">                          
    </div>
    <div class="invoice p-5">
        <h5>Đơn hàng của bạn đã được xác nhận</h5>
        <span class="font-weight-bold d-block mt-4">Hello, <?php echo $order[0]['hoten']?></span>
        <span>Đơn đặt hàng của bạn đã được xác nhận và sẽ được chuyển trong hai ngày tới!</span>
        <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
            <table class="table table-borderless">   
                <tbody>
            <tr>
                <td>
                    <div class="py-2">
                    <span class="d-block text-muted">Ngày tạo</span>
                    <span><?php echo date('d/m/Y H:i:s',strtotime($order[0]['ngay_tao']))?></span>        
                    </div>
                </td>
                <td>
                    <div class="py-2">
                    <span class="d-block text-muted">ID đơn hàng</span>
                    <span><?php echo $order[0]['id_dh']?></span>                      
                    </div>
                </td>
                
                <td>
                    <div class="py-2">
                    <span class="d-block text-muted">Địa chỉ nhận hàng</span>
                    <span><?php echo $order[0]['diachi']?></span>                      
                    </div>
                </td>
                <td>
                    <div class="py-2">
                    <span class="d-block text-muted">SĐT</span>
                    <span><?php echo $order[0]['sdt']?></span>                      
                    </div>
                </td>
                </tr>
                </tbody>
            </table>      
        </div>
        <?php 
        $totalquantity = 0;
        $totalmoney = 0;
    foreach($order as $row){
        ?>
       <div class="product border-bottom table-responsive">
                <table class="table table-borderless">
                <tbody>
                        <tr>
                    <td width="20%">                 
                        <img src="../images/<?= $row['image']; ?>" width="90">
                    </td>         
                    <td width="60%">
                        <span class="font-weight-bold"><?= $row['ten_sp']; ?></span>
                        <div class="product-qty">
                            <span class="d-block">Số lượng: <?= $row['sl']; ?></span>
                            <span><?= $row['color']; ?></span>      
                        </div>
                    </td>
                    <td width="20%">
                        <div class="text-right">
                            <span class="font-weight-bold"><?= number_format($row['gia'] * $row['sl']) ; ?></span>
                        </div>
                    </td>
                </tbody> 
                </table>
            </div>
            <?php 
            $totalmoney += ($row['gia']) * ($row['sl']);
            $totalquantity += ($row['sl']);
            } ?>

    <div class="row d-flex justify-content-end">
        <div class="col-md-5">
            <table class="table table-borderless">
                <tbody class="totals">
                    <tr class="border-top border-bottom">
                        <td>
                            <div class="text-left">
                                <span class="font-weight-bold">Thành tiền</span>                               
                            </div>
                        </td>
                        <td>
                            <div class="text-right">
                                <span class="font-weight-bold"><?= number_format($order[0]['tong_tien']); ?></span>
                            </div>
                        </td>
                    </tr>    
                </tbody>  
            </table>                
        </div>             
    </div>
           
            <p class="font-weight-bold mb-0">Cảm ơn bạn đã mua hàng!</p>
            <span>BIuityphunshop</span>
        <div align="right">
            <p class="font-weight-bold mb-0" >Nhân viên thực hiện</p>
            <span><?php echo $row['ho_ten_nv']?></span>
        </div>
    </div>
    

</div>
</div>   
</div>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- slide bar -->
<script src="js/bootstrap2.bundle.min.js"></script>
<script src="js/sidebars.js"></script>
</body>
</html>