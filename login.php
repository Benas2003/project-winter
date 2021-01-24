<?php
    require '/home/u848932438/domains/bkworks.lt/public_html/projektas/connections.php';
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } echo "Connected successfully";

    $pastas=$_POST['email'];
    $slaptazodis=$_POST['password'];
    $url=$_POST['url'];

    preg_match("/([0-9]+)/", $url, $matches);
    $url=$matches[1];

    $pastas = trim($pastas," '|', '+', '*', '/', ';', ','");
    $slaptazodis = trim($slaptazodis," '|', '+', '*', '/', '-', ';', ','");

    $sql = "SELECT ID, FirstName, Email, Parole, Mode FROM Users WHERE Email='$pastas' && Parole='$slaptazodis' && Mode='Neaktyvi'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
        header("Location: log?needsactivation");
     }
    } else {

        $sql = "SELECT ID, FirstName, Email, Parole, Mode FROM Users WHERE Email='$pastas' && Parole='$slaptazodis' && Mode='Aktyvi'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $ID=$row['ID'];
            $Name=$row['FirstName'];
            $Email=$row['Email'];
            $Parole=$row['Parole'];
         }
            if(empty($url)){
                header("Location: user");
                $radau=true;
            } 
            else if($url==1){
                header("Location: object-1");
                $radau=true;
            }
            else if($url==2){
                header("Location: object-2");
                $radau=true;
            }
            else if($url==3){
                header("Location: object-3");
                $radau=true;
            }
            else if($url==4){
                header("Location: object-4");
                $radau=true;
            } 
            else if($url==5){
                header("Location: object-5");
                $radau=true;
            } 
            else if($url==6){
                header("Location: object-6");
                $radau=true;
            } 
            else if($url==7){
                header("Location: object-7");
                $radau=true;
            } 
            else{
                header("Location: log?sign_in=fail");
            }
        } else {
        echo "0 results";
        header("Location: log?sign_in=fail");
        }
    }

    if($radau==true){
        session_start();
        $_SESSION['vartotojo_duomenys_1_user']=$ID;
        $_SESSION['vartotojo_duomenys_2']=$Name;
        $_SESSION['vartotojo_duomenys_3']=$Email;
        $_SESSION['vartotojo_duomenys_4']=$Parole;

        //Object-1
        $_SESSION['vartotojo_duomenys_2_user']=$ID;
        //Object-2
        $_SESSION['vartotojo_duomenys_3_user']=$ID;
        //Object-3
        $_SESSION['vartotojo_duomenys_4_user']=$ID;
        //Object-4
        $_SESSION['vartotojo_duomenys_5_user']=$ID;
    }
?>