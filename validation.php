<?php
    require '/home/u848932438/domains/bkworks.lt/public_html/projektas/connections.php';
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } echo "Connected successfully";

    $iURL;
    $tURL;
    $mURL;
    $count=0;

    $sql = "SELECT ID, Timer, Mode FROM ActivationURL WHERE Mode='Aktyvi'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
        $iURL[$count]=$row['ID'];
        $tURL[$count]=$row['Timer'];
        $mURL[$count]=$row['Mode'];
        $count++;
     }
    }else{
        echo "0 results";
    }

    for($i=0; $i<$count; $i++)
    {
        if($tURL[$i]==0)
        {
            $mURL[$i]='Neaktyvi';
        }
        else{
            $tURL[$i]--;
        }
        
    }

    for($i=0; $i<$count; $i++){
        $sql = "UPDATE ActivationURL SET Mode='$mURL[$i]', Timer='$tURL[$i]' WHERE ID=$iURL[$i]";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            $pavyko=true;
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    $iURL;
    $tURL;
    $mURL;
    $count=0;

    $sql = "SELECT ID, Timer, Mode FROM RestoreURL WHERE Mode='Aktyvi'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
        $iURL[$count]=$row['ID'];
        $tURL[$count]=$row['Timer'];
        $mURL[$count]=$row['Mode'];
        $count++;
     }
    }else{
        echo "0 results";
    }

    for($i=0; $i<$count; $i++)
    {
        if($tURL[$i]==0)
        {
            $mURL[$i]='Neaktyvi';
        }
        else{
            $tURL[$i]--;
        }
        
    }

    for($i=0; $i<$count; $i++){
        $sql = "UPDATE RestoreURL SET Mode='$mURL[$i]', Timer='$tURL[$i]' WHERE ID=$iURL[$i]";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            $pavyko=true;
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
?>