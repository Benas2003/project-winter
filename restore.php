<?php
    $naujas=$_POST['password1'];
    $url=$_POST['password2'];

    $url_components = parse_url($url); 
    parse_str($url_components['query'], $params); 
    $iURL=$params['url'];

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '/home/u848932438/domains/bkworks.lt/public_html/projektas/connections.php';
    require '/home/u848932438/domains/bkworks.lt/public_html/projektas/PHPMailer/src/Exception.php';
    require '/home/u848932438/domains/bkworks.lt/public_html/projektas/PHPMailer/src/PHPMailer.php';
    require '/home/u848932438/domains/bkworks.lt/public_html/projektas/PHPMailer/src/SMTP.php';


    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } echo "Connected successfully";

    $sql = "SELECT iURL FROM RestoreURL WHERE iURL='$iURL' && Mode='Neaktyvi'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
        header("Location: log?password=false");
     }
    } else {

        $sql = "SELECT iURL FROM RestoreURL WHERE iURL='$iURL' && Mode='Panaudota'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            header("Location: log?password=false");
        }
        } else{

            $sql = "SELECT UserID FROM RestoreURL WHERE iURL='$iURL' && Mode='Aktyvi'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $ID=$row['UserID'];
            }
            }else{
            echo "Error selecting record: " . $conn->error;
            }

            echo "<br>";
            echo $ID;
            echo "<br>"; 

            $sql = "UPDATE Users SET Parole='$naujas' WHERE ID='$ID'";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
                $pavyko=true;
            } else {
                echo "Error updating record: " . $conn->error;
            }

            $sql = "UPDATE RestoreURL SET Mode='Panaudota' WHERE iURL='$iURL' && Mode='Aktyvi'";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }

        }
    }
    

    if($pavyko==true)
    {
        $sql = "SELECT FirstName, Email, Parole FROM Users WHERE ID='$ID' && Mode='Aktyvi'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $name=$row['FirstName'];
            $pastas=$row['Email'];
            $slaptazodis=$row['Parole'];
        }
        }else{
        echo "Error selecting record: " . $conn->error;
        }

        $email = new PHPMailer;
        $email->CharSet = 'UTF-8';                              
        //Set PHPMailer to use SMTP.
        $email->IsSMTP();
        $email->IsHTML(true);
        $email->Host = $Host;
        $email->SMTPAuth = true;
        $email->SMTPSecure = $SMTPSecure;
        $email->Username = $EmailHostUsername;
        $email->Password = $EmailHostPassword;
        $email->Port = $EmailHostPort;    
        
        $email->setFrom('pagalba@bkworks.lt', '#Kalėdoskartu');

        $email->addAddress($pastas);

        $email->Subject = 'Jūsų paskyros #Kalėdoskartu slaptažodis pakeistas';

        $email->Body="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
        <html xmlns='http://www.w3.org/1999/xhtml' lang='en-GB'>
        <head>
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
        <title>Demystifying Email Design</title>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
        
        <style type='text/css'>
        a[x-apple-data-detectors] {color: inherit !important;}
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
       
        .social-media {
        display: flex;
        justify-content: center;
        }
        
        .social-icon {
        height: 46px;
        width: 46px;
        display: block;
        justify-content: center;
        align-items: center;
        margin: 0 0.45rem;
        color: #ffffff;
        border-radius: 50%;
        border: 1px solid #ffffff;
        border-color: #ffffff;
        text-decoration: none;
        font-size: 1.1rem;
        transition: 0.3s;
        }
        
        .social-icon:hover {
        color: #4481eb;
        border-color: #4481eb;
        }

        .center {
        display: block;
        margin: 0 auto;
        margin-top:12.5px;
        }

        </style>
        
        </head>
        <body style='margin: 0; padding: 0;'>
        <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
        <tr>
        <td style='padding: 20px 0 30px 0;'>
        
        <table align='center' border='0' cellpadding='0' cellspacing='0' width='600' style='border-collapse: collapse; border: 1px solid #cccccc;'>
        <tr>
        <td align='center' bgcolor='white' style='padding: 40px 0 30px 0;'>
        <img src='http://projektas.bkworks.lt/images/cookies.png' alt='El. paštas patvirtintas' width='512' height='512' style='display: block;' />
        </td>
        </tr>
        <tr>
        <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
        <table border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;'>
        <tr>
        <td style='color: #153643; font-family: 'Roboto', sans-serif;'>
        <h1 style='font-size: 24px; margin: 0;'>Jūsų slaptažodis sėkmingai pakeistas!</h1>
        <br>
        <br>
        </td>
        </tr>
        <tr>
        <td>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        <tr>
        <td bgcolor='#5995fd' style='padding: 30px 30px;'>
        <table border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;'>
        <tr>
        <td style='color: white; font-family: 'Roboto', sans-serif; font-size: 14px;'>
        <p style='margin: 0; color:white;'>© #Kalėdoskartu, Lietuva 2020</p>
        </td>
        <td align='right'>
        <table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse;'>
        <tr>
        <div class='social-media'>
        <a href='#' class='social-icon'>
        <img src='http://projektas.bkworks.lt/images/social-media/facebook.png' alt='' width='17' height='17' class='center'/>
        </a>
        <a href='#' class='social-icon'>
        <img src='http://projektas.bkworks.lt/images/social-media/twitter.png' alt='' width='17' height='17' class='center'/>
        </a>
        <a href='#' class='social-icon'>
        <img src='http://projektas.bkworks.lt/images/social-media/google-plus.png' alt='' width='17' height='17' class='center'/>
        </a>
        <a href='#' class='social-icon'>
        <img src='http://projektas.bkworks.lt/images/social-media/linkedin.png' alt='' width='17' height='17' class='center'/>
        </a>
        </div>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        
        </td>
        </tr>
        </table>
        </body>
        </html>";

        if (!$email->send()){
            echo $email->ErrorInfo;
        }
        else{
            header("Location: log?password=restored");
        }
    }else{
        header("Location: log?password=false");
    }

?>