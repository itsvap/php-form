<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("Connection to database failed due to" . mysqli_connect_error());
    }
    // echo "Success! connecting to the database";
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $ephone = $_POST['ephone'];
    $email = $_POST['email'];
    $year = $_POST['year'];
    $dept = $_POST['dept'];
    $dob = $_POST['dob'];
    $desc = $_POST['desc'];
    // var_dump($_POST); // This will print the content of the $_POST array

    $sql = "INSERT INTO `trip`.`triphp` (`name`, `age`, `gender`, `phone`, `ephone`, `email`, `year`, `dept`, `dob`, `addinfo`, `dt`) VALUES ('$name', '$age', '$gender', '$phone', '$ephone', '$email', '$year', '$dept\r\n', '$dob', '$desc', current_timestamp());";
    // echo $sql;

    if($con->query($sql) == true){
        // echo "Successfully inserted";
        $insert =true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip to Himachal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.png" alt="Himachal Pradesh">
    <div class="container">
        <h1>Welcome to DYPIEMR</h1>
        <p>Enter your details and submit this form to confirm your seat.</p>
        <?php
        if($insert == true){
        echo "<p class='sbmtmsg'>Thanks for submitting the form. We are happy to see you joining us for Himachal Trip.!!</p>";}
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="text" name="phone" id="mob-no" placeholder="Enter your Moblie Number">
            <input type="phone" name="ephone" id="mob-no2" placeholder="Enter a emergency Moblie Number">
            <input type="email" name="email" id="email" placeholder="Enter your email id">
            <input type="text" name="year" id="year" placeholder="Enter your year of study">
            <input type="text" name="dept" id="dept" placeholder="Enter your Department Name">
            <input type="date" name="dob" id="dob" placeholder="Enter your Date of Birth">
            <textarea name="desc" id="" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn" type="reset">Reset</button> -->
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>