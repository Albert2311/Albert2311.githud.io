<?php
$posted_paylods = array();
if(isset($_POST['submit'])){
$email = $_POST['email'];
$message = "Email: " . $email . "\n".'Feedback từ khách hàng: '."\n" . $_POST['message'];

$mailheader = "From:".$email."<".$email.">\r\n";

$recipient = "shopbiutyphun@gmail.com";
$error = "";
$alert_msg ="";

if(mail($recipient, $email, $message, $mailheader)) {
  $error = false;
  $alert_msg = 'Thanks for contacting us! We will be in touch with you shortly.';
} else {
  $error = true;
  $alert_msg = "Opps! Error to send mail";
}
}
?>
<!-- <script>
  alert('Gủi mail thành công')
</script> -->
