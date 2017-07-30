<?php

/*********************************************
 *AUTHOR:   Kenneth Pollick
 *DATE:     2017-7-30
 *PURPOSE:  To send an email to Kenneth Pollick based on the information from the Contact page of Kenneth Pollick Software
**********************************************/

//definition of who to send the email to
define("SEND_TO", "kennethpollick@gmail.com");

//scrubbing of inputs
$name = trim( stripslashes( htmlspecialchars( $_POST["name"] ) ) );
$email = trim( stripslashes( htmlspecialchars( $_POST["email"] ) ) );
$message = wordwrap( trim( stripslashes( htmlspecialchars( $_POST["message"] ) ) ), 70);//wordwrap is needed at more than 70 characters for the message argument of the mail function
$subject = ("KennethPollickSoftwareForm[".$name.", ".$email."]");



//the actual mailing
mail(SEND_TO, $subject, $message);


//redirect to the index
header('Location: index.html');
?>

<!-- alert the user that their message was sent -->
<script type="text/javascript">
alert("Message Sent.\nThank you for your Feedback.");
</script>

<?php
//exit
exit();
?>
