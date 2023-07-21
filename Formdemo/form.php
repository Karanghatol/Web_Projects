
<center>
<?php
    
    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $Gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];

   /*DATABASE CONNECTION
    *Using variable = CONN
    */

    $conn = new mysqli('localhost','root','Mysqldatabase','test');

    //Checking the database connection

    if($conn->connect_error){
        die('connection faild : (Check XAMPP!) '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into registration(Fname, Lname, Gender, email, password, number)  values(?,?,?,?,?,?)");
        $stmt->bind_param("sssssi", $Fname, $Lname, $Gender, $email, $password, $number);
        $stmt->execute();
        echo "<h1>Registration successfully...</h1>";
        $stmt->Close();
        $conn->Close();
    }
?>
