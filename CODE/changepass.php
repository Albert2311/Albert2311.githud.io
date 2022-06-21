<?php include_once ("controller.php"); ?>
<!DOCTYPE html>
<body lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--FILE-->
    <link rel="stylesheet" href="css/dang-nhap.css">
    <link rek="stylesheet" type="text/css" href="fontawesome-free-6.1.1-web/css/all.min.css">
  <!-- ICON -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--icon-->
  <script src="https://kit.fontawesome.com/ed720e4b54.js" crossorigin="anonymous"></script> <!--THEM ICON!!!--> 
  <script src="https://use.fontawesome.com/9ea6af6279.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- THƯ VIỆN jQuery-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <title>ĐỔI MẬT KHẨU</title>
</head>
<body>

	<div class="container">
	
		<div class="login-content">
			<form action="changepass.php" method="POST" autocomplete="off">
            <?php
            if ($errors > 0) {
                foreach ($errors as $displayErrors) {
            ?>
                    <div id="alert">
					<?php echo $displayErrors; ?>
				</div>
            <?php
                }
            }
            ?>
				<img src="images/login-icon.png">
				<h2 class="title">NHẬP MẬT KHẨU MỚI</h2>
           		
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="password" class="input" required>
            	   </div>
            	</div>
				<!-- NHẬP LẠI PASSWORD -->
				<div class="input-div pass">
					<div class="i"> 
						 <i class="fas fa-lock"></i>
					</div>
					<div class="div">
						 <h5>Nhập lại mật khẩu</h5>
						 <input type="password" name="confirmPassword" class="input" required>
				 	</div>
			    </div>
            	<input type="submit" name="changePassword" class="btn" value="Lưu lại">
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