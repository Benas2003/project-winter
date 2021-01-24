<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
 
    require '/home/u848932438/domains/bkworks.lt/public_html/projektas/PHPMailer/src/Exception.php';
    require '/home/u848932438/domains/bkworks.lt/public_html/projektas/PHPMailer/src/PHPMailer.php';
    require '/home/u848932438/domains/bkworks.lt/public_html/projektas/PHPMailer/src/SMTP.php';

    session_start();
    $ID=$_SESSION['vartotojo_duomenys_5_user'];

    require '/home/u848932438/domains/bkworks.lt/public_html/projektas/connections.php';
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } echo "Connected successfully";

    $expensions= array("png", "jpg", "jpeg");

    if(isset($_FILES['file4'])){
        $errors1= array();
        $file_name1 = $_FILES['file4']['name'];
        $file_size1 =$_FILES['file4']['size'];
        $file_tmp1 =$_FILES['file4']['tmp_name'];
        $file_type1=$_FILES['file4']['type'];
        $file_ext1=strtolower(end(explode('.',$_FILES['file4']['name'])));
        
        if(in_array($file_ext1,$expensions)=== false){
        $errors1[]="Nuotraukos tipas neleistinas";
        }
        
        if($file_size1 > 7864320){
        $errors1[]='Nuotrauka viršyja 7.5MB limitą';
        }

        print_r($errors1);
        
        if(empty($errors1)==true){
            move_uploaded_file($file_tmp1,"UsersPhotos/".$ID."_object_7_".$file_name1);
            $adresas1="UsersPhotos/".$ID."_object_7_".$file_name1;
            $sql = "INSERT INTO Object_7 (UserID, Photo, Mode) VALUES ('$ID', '$adresas1', 'Aktyvus');";
            if ($conn->multi_query($sql) === TRUE) {
                echo "New records created successfully";
                $sql = "UPDATE Users SET Current_location='7' WHERE ID='$ID'";
                if ($conn->query($sql) === TRUE) {
                    echo "Record updated successfully";
                    $pavyko=true;
                } else {
                    echo "Error updating record: " . $conn->error;
                }

            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            echo "Success";

            $sql = "SELECT Path_ID, Email FROM Users WHERE ID='$ID'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $Email=$row['Email'];
                $Path=$row['Path_ID'];
            }
            }

            $sql = "SELECT Photo FROM Object_2 WHERE UserID='$ID'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $Photo1=$row['Photo'];
            }
            }

            $sql = "SELECT Photo FROM Object_4 WHERE UserID='$ID'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $Photo2=$row['Photo'];
            }
            }

            $sql = "SELECT Photo FROM Object_6 WHERE UserID='$ID'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $Photo3=$row['Photo'];
            }
            }

            $sql = "SELECT Photo FROM Object_7 WHERE UserID='$ID'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $Photo4=$row['Photo'];
            }
            }

            if($Path==1){
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

                /* Add a recipient. */
                $email->addAddress($Email);
            
                /* Set the subject. */
                $email->Subject = '#Kalėdoskartu žygio apžvalga';
            
                /* Set the mail message body. */
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
                <img src='http://projektas.bkworks.lt/images/tree.png' alt='El. pašto aktyvacija' width='512' height='512' style='display: block;' />
                </td>
                </tr>
                <tr>
                <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;'>
                <tr>
                <td style='color: #153643; font-family: 'Roboto', sans-serif;'>
                <h1 style= margin: 0;'>Sveikiname sėkmingai įvykdžius Šiaurinį #Kalėdoskartu žygį!</h1>
                </td>
                </tr>
                <tr>
                <td style='color: #153643; font-family: 'Roboto', sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 30px 0;'>
                <br>
                <h2 style='margin: 0;'>Jūsų padaryti self'iai žygio metu</h2>
                <br>
                <h3>Asmenukė Gimanzijos lauko klasėje</h3>
                <img src='https://projektas.bkworks.lt/$Photo1' alt='1 nuotrauka' width='50%' style='display: block; margin: 0 auto; text-align:center' />
                <br>
                <h3>Asmenukė Marvos (XII) forte</h3>
                <img src='https://projektas.bkworks.lt/$Photo2' alt='2 nuotrauka' width='50%' style='display: block; margin: 0 auto; text-align:center' />
                <br>
                <h3>Asmenukė Kamšos pažintiniame take</h3>
                <img src='https://projektas.bkworks.lt/$Photo3' alt='3 nuotrauka' width='50%' style='display: block; margin: 0 auto; text-align:center' />
                <br>
                <h3>Asmenukė prie Akademijos miestelio Kalėdinės eglutės ir nykštukų </h3>
                <img src='https://projektas.bkworks.lt/$Photo4' alt='4 nuotrauka' width='50%' style='display: block; margin: 0 auto; text-align:center' />
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
                <p style='margin: 0; color: white;'>© #Kalėdos kartu, Lietuva 2020</p>
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
            }
            if (!$email->send()){
                echo $email->ErrorInfo;
            }
            else{
                header("Location: completed");
            }
        

        }else{
            print_r($errors1);
            header("Location: object-7?failed");
        }
    }
?>