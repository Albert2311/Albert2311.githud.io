<?php include_once ("controller.php"); ?>
<?php
	if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = md5($_POST['password']);

		$select = " SELECT * FROM nhanvien WHERE email = '$email' && password = '$password'";

		$result = mysqli_query($conn, $select);

		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_array($result);

			// if($row['user_type'] == 'admin'){
			// 	$_SESSION['admin_name'] = $row['fname'];
			// 	header('location:../Krixi_Code/admin/product.php');

			// }elseif($row['user_type'] == 'user'){
			// 	$_SESSION['admin_name'] = $row['fname'];
				header('location: ../QUẢN LÝ BÁN QUẦN ÁO/admin/nhanvien.php');
			
		}else{
			$error[] = 'Sai mật khẩu hoặc địa chỉ email';
		}
	};
?>
<!DOCTYPE html>
<body lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--FILE-->
    <link rel="stylesheet" href="css/dang-nhap.css">
	<link rel="shortcut icon" href="images/ava.png">

  <!-- ICON -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--icon-->
  <script src="https://kit.fontawesome.com/ed720e4b54.js" crossorigin="anonymous"></script> <!--THEM ICON!!!--> 
 

  <title>ĐĂNG NHẬP</title>
</head>
<body>

	<div class="container">
	
		<div class="login-content">
			<form action="dangnhap.php" method="POST" autocomplete="off">
        	<?php
            if($errors > 0){
                foreach($errors AS $displayErrors){
                ?>
                <div id="alert">
					<?php echo $displayErrors ?>
				</div>
                <?php
                }
            }
            ?>
				<img src="images/login-icon.png">
				<h2 class="title">ĐĂNG NHẬP</h2>
           		<div class="input-div one">
           		   <div class="i">
					  <i class="fa-solid fa-envelope"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email</h5>
           		   		<input type="email" name="email" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="password" class="input">
            	   </div>
            	</div>
				<div class="form-btns">
            	<a href="forgot.php" id="forgot">Quên mật khẩu?</a>
				</div>
            	<input type="submit" id="submit" name="login" class="btn" value="Đăng nhập">
            </form>
        </div>
    </div>







	
<script>
    const inputs = document.querySelectorAll(".input");
function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});
</script>
</body>
</html>