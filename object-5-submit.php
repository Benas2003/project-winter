<?php
    session_start();
    $ID=$_SESSION['vartotojo_duomenys_4_user'];

    $pirmas_kl=$_POST['5_klausimas'];
    
    $score=2;

    require '/home/u848932438/domains/bkworks.lt/public_html/projektas/connections.php';
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } echo "Connected successfully";

     
    $sql = "INSERT INTO Object_5 (UserID, Question_1, Score, Mode) VALUES ('$ID', '$pirmas_kl', '$score', 'Aktyvus');";
    if ($conn->multi_query($sql) === TRUE) {
        echo "New records created successfully";
        $created=true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    if($created=true)
    {
        $sql = "UPDATE Users SET Current_location='5' WHERE ID='$ID'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header("Location: object-5?completed");
            $pavyko=true;
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    session_start();
    $_SESSION['trecio_klausimyno_rezultatas']=$score;
?>