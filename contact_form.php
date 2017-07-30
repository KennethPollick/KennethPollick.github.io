<?php

/*********************************************
 *AUTHOR:   Kenneth Pollick
 *DATE:     24-4-2017
 *PURPOSE:  To send an email to Giering Media based on the information from the Contact page
**********************************************/

//definition of who to send the email to
define("SEND_TO", "colin.giering@gmail.com");

//scrubbing of inputs
$name = trim( stripslashes( htmlspecialchars( $_POST["name"] ) ) );
$phonenumber = trim( stripslashes( htmlspecialchars( $_POST["phonenumber"] ) ) );
$email = trim( stripslashes( htmlspecialchars( $_POST["email"] ) ) );
$message = wordwrap( trim( stripslashes( htmlspecialchars( $_POST["message"] ) ) ), 70);//wordwrap is needed at more than 70 characters for the message argument of the mail function
$subject = "";

if (strlen($phonenumber) > 0) {
    $subject = ("GieringMediaForm[".$name.", ".$email.", ".$phonenumber."]");
}
else {
    $subject = ("GieringMediaForm[".$name.", ".$email."]");
}


//the actual mailing
mail(SEND_TO, $subject, $message);


//redirect to the services page
header('Location: thanks.html');
?>

<!-- alert the user that their message was sent -->
<script type="text/javascript">
alert("Message Sent");
</script>

<?php
//exit
exit();
?>
