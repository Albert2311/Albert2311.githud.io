<?php include_once ("controller.php"); ?>
<!DOCTYPE html>
<body lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--FILE-->
    <link rel="stylesheet" href="css/dang-nhap.css">
   
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--icon-->
  <script src="https://kit.fontawesome.com/ed720e4b54.js" crossorigin="anonymous"></script> <!--THEM ICON!!!--> 
  <script src="https://use.fontawesome.com/9ea6af6279.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <title>MÃ XÁC MINH</title>
</head>
<body>

	<div class="container">
	
		<div class="login-content">
        <form action="email-verify.php" method="POST" autocomplete="off">
            <?php
            if(isset($_SESSION['message'])){
                ?>
                <div id="alert">
                <script><?php echo $_SESSION['message']; ?>  
                </script>
                </div>
                <?php
            }
            ?>

            <?php
            if($errors > 0){
                foreach($errors AS $displayErrors){
                ?>
                <div id="alert">
                <script>
                  alert(' <?php echo $displayErrors; ?>')
                </script>
                </div>
                <?php
                }
            }
            ?>    
				<img src="images/login-icon.png">
				<h2 class="title">NHẬP MÃ XÁC MINH</h2>
           		<div class="input-div one">
           		   <div class="i">
                      <i class="fa-solid fa-hashtag"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Mã xác minh</h5>
           		   		<input type="number" name="OTPverify" class="input" required >
           		   </div>
           		</div>
	          	<input type="submit" name="verifyEmail" class="btn" value="GỬI">
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