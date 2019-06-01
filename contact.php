<?php 
if($_POST) {
    $visitor_name = "";
    $visitor_email = "";
    $email_title = "";
    $concerned_department = "";
    $visitor_message = "";
    
    if(isset($_POST['visitor_name'])) {
        $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['visitor_email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
    }
     
    if(isset($_POST['email_title'])) {
        $email_title = filter_var($_POST['email_title'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['visitor_message'])) {
        $visitor_message = htmlspecialchars($_POST['visitor_message']);
    }
     
	$recipient = "lmaree@ucsd.edu";
    
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
     
    if(mail($recipient, $email_title, $visitor_message, $headers)) {
        echo '<p><p 
            style= 'font-family:Source Sans Pro,sans-serif; 
                    font-size:18px;
                    color:gray;
                    letter-spacing:3px;
                    text-shadow: 0 0 0.5px rgba(41, 4, 4, 0.25);
                    text-align: center;
                    margin: 0;
                    padding: 10em 0 9em 0;
                    cursor: default;
                    background: rgba(0, 151, 19, 0.2);'
                >
                Thank you for contacting us, $visitor_name. We will get back to you as soon as possible!
            </p></p>';
    } 

    else {
        echo '<p 
            style= 'font-family:Source Sans Pro,sans-serif; 
                    font-size:18px;
                    color:gray;
                    letter-spacing:3px;
                    text-shadow: 0 0 0.5px rgba(41, 4, 4, 0.25);
                    text-align: center;
                    margin: 0;
                    padding: 10em 0 9em 0;
                    cursor: default;
                    background: rgba(0, 151, 19, 0.2);'
                >
                We are sorry but the email did not go through.
            </p>';
    }
     
    } else {
        echo '<p 
            style= 'font-family:Source Sans Pro,sans-serif; 
                    font-size:18px;
                    color:gray;
                    letter-spacing:3px;
                    text-shadow: 0 0 0.5px rgba(41, 4, 4, 0.25);
                    text-align: center;
                    margin: 0;
                    padding: 10em 0 9em 0;
                    cursor: default;
                    background: rgba(0, 151, 19, 0.2);'
                >
                Something went wrong :(
            </p>';
    }
?>