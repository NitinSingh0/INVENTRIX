<?php
error_reporting(0);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



// Function to send OTP via email (replace with your email sending code)
function sendOTPByEmail($email,$name,$whatsapp,$event) {
    require ('PHPMailer.php');
    require ('Exception.php');
    require ('SMTP.php');
    $mail = new PHPMailer(true);
   

    try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;  
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'itinventrix@gmail.com';                     //SMTP username
        $mail->Password   = 'dgoy tkrn xyqa vjcy';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('itinventrix@gmail.com', 'INVENTRIX');
        $mail->addAddress($email);     //Add a recipient
    
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Registration Activated! Welcome to the INVENTRIX - Your Gateway to Innovation!';
        $mail->Body    = '<!DOCTYPE html>
<html>
<head>
</head>
<body style="font-family: `Arial`, sans-serif;
    background: #0a0f1c;
    color: #c0c0c0;
    line-height: 1.6;">
<div class="container style="max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background: #151d33;
    border: 1px solid #2e3a59;
    border-radius: 8px;">
  <h2 style="color: #4dd0e1;
    text-align: center;">Welcome to the Digital Frontier at the '.$event.'!</h2>

  <p style="margin-bottom: 10px;
    color: #a9b4c2;">Hi '.$name.',</p>
  
  <p style="margin-bottom: 10px;
    color: #a9b4c2;">Get ready to plug in and experience the synergy of technology and creativity at the '.$event.'! We`re excited to confirm your interest in this groundbreaking gathering of digital minds.</p>
  
  <p style="margin-bottom: 10px;
    color: #a9b4c2;"><span class="highlight">Action Required:</span> To lock in your participation, please initiate your payment offline. Our on-site tech ambassadors will be available to assist you at the following digital hubs:</p>
  
  <ul style="list-style-type: none;
    padding: 0;">
    <li style="margin-bottom: 10px;
    color: #d1d9e6;">Main Foyer - The Innovation Gateway</li>
    <li style="margin-bottom: 10px;
    color: #d1d9e6;">Canteen Foyer - The Social Network Station</li>
    
  </ul>

  <p style="margin-bottom: 10px;
    color: #a9b4c2;">Payment Hours: <span class="highlight" style="color: #ff4081;">Daily from 8 AM to 3 PM</span></p>

  <p style="margin-bottom: 10px;
    color: #a9b4c2;">Crucial Step: Join our official WhatsApp group for real-time updates and interactive discussions. This is your portal for all event-related information.</p>

  <a href="'.$whatsapp.'" class="link-button" style=" display: inline-block;
    padding: 10px 20px;
    background: #ff4081;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    text-align: center;
    margin: 10px 0;">Join the Conversation</a>

  <p style="margin-bottom: 10px;
    color: #a9b4c2;">For any queries or if you encounter any glitches, our support crew is on standby to assist. Reach out anytime!</p>

  <p style="margin-bottom: 10px;
    color: #a9b4c2;">We can`t wait to see you dive into the digital universe at the '.$event.'!</p>

  <p class="footer" style="text-align: center;
    font-size: 0.8em;
    color: #666;">
    Best regards,<br>
    Team Inventrix<br>
    Navigators of the Digital Odyssey
  </p>

  <p class="ps" style="font-style: italic;
    color: #999;">P.S. Time is ticking in our digital hourglass! Complete your payment today and ensure your spot in this exclusive tech conclave.</p>
</div>
</body>
</html>

';
        if($mail->send()){
        
    }
    else{

    return false;
    }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
  
}
 $name=$fname;
 $whatsapp;
 $event;
$sql = "select*from games where name='$event'";
$result = $conn->query($sql);
if ($result) {
  $row = $result->fetch_assoc();
  
  $whatsapp = $row['whatsapp'];
}

sendOTPByEmail($email,$name,$whatsapp,$event);
error_reporting(0);
?>
