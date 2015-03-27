<?php
if (isset($_POST['submit']) AND $_POST['submit'] == 'Send Message') {
    $to = $siteInfo['site_email'];
    $from = $_POST['email'];

    $subject = "Email From: " . $_POST['email'];
    $subject2 = "Copy - Email To: " . $siteInfo['site_name'];

    $message = $_POST['message'];
    $message2 = "Thanks for contacting us. <br>" . $_POST['message'];

    $send = mail($to, $subject, $message);
    $send2 = mail($from, $subject2, $message2);

    if ($send == TRUE AND $send2 == TRUE) {
        echo 'OK';
    }
}
?>

<div id="send">
    <form action="" method="post">
        <input type="text" name="name" placeholder="Write your name here !" required="required" />
        <input type="email" name="email" placeholder="Write your email here !" required="required" />

        <textarea name="message" placeholder="Write your message here !" required="required"></textarea>

        <input type="submit" name="submit" value="Send Message" />
    </form>
</div>