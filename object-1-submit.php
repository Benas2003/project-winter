<?php
    require '/home/u848932438/domains/bkworks.lt/public_html/projektas/connections.php';
    session_start();
    $ID=$_SESSION['vartotojo_duomenys_2_user'];

    $pirmas_kl=$_POST['1_klausimas'];
    $antras_kl=$_POST['2_klausimas'];
    $trecias_kl=$_POST['3_klausimas'];
    
    $score=0;
    $score++;

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } echo "Connected successfully";

    if($pirmas_kl=="1949")
    {
        $score++;
    }

    if($trecias_kl=="2020")
    {
        $score++;
    }
     
    $sql = "INSERT INTO Object_1 (UserID, Question_1, Question_2, Question_3, Score, Mode) VALUES ('$ID', '$pirmas_kl', '$antras_kl', '$trecias_kl', '$score', 'Aktyvus');";
    if ($conn->multi_query($sql) === TRUE) {
        echo "New records created successfully";
        $created=true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    if($created=true)
    {
        $sql = "UPDATE Users SET Current_location='1' WHERE ID='$ID'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header("Location: object-1?completed");
            $pavyko=true;
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    session_start();
    $_SESSION['pirmo_klausimyno_rezultatas']=$score;
?>