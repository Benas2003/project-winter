<?php
    session_start();
    $ID=$_SESSION['vartotojo_duomenys_5_user'];

    require '/home/u848932438/domains/bkworks.lt/public_html/projektas/connections.php';
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } echo "Connected successfully";

    $expensions= array("png", "jpg", "jpeg");

    if(isset($_FILES['file2'])){
        $errors1= array();
        $file_name1 = $_FILES['file2']['name'];
        $file_size1 =$_FILES['file2']['size'];
        $file_tmp1 =$_FILES['file2']['tmp_name'];
        $file_type1=$_FILES['file2']['type'];
        $file_ext1=strtolower(end(explode('.',$_FILES['file2']['name'])));
        
        if(in_array($file_ext1,$expensions)=== false){
        $errors1[]="Nuotraukos tipas neleistinas";
        }
        
        if($file_size1 > 7864320){
        $errors1[]='Nuotrauka viršyja 7.5MB limitą';
        }

        print_r($errors1);
        
        if(empty($errors1)==true){
            move_uploaded_file($file_tmp1,"UsersPhotos/".$ID."_object_4_".$file_name1);
            $adresas1="UsersPhotos/".$ID."_object_4_".$file_name1;
            $sql = "INSERT INTO Object_4 (UserID, Photo, Mode) VALUES ('$ID', '$adresas1', 'Aktyvus');";
            if ($conn->multi_query($sql) === TRUE) {
                echo "New records created successfully";
                header("Location: completed");
                $sql = "UPDATE Users SET Current_location='4' WHERE ID='$ID'";
                if ($conn->query($sql) === TRUE) {
                    echo "Record updated successfully";
                    header("Location: object-4?completed");
                    $pavyko=true;
                } else {
                    echo "Error updating record: " . $conn->error;
                }

            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            echo "Success";
        }else{
            print_r($errors1);
            header("Location: object-4?failed");
        }
    }
?>