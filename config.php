<?php
$insert=false;
if(isset($_POST['first'])){


    $server="localhost:3307";
    $username="root";
    $password="";
    $dbname='cms';

    $con=mysqli_connect($server,$username,$password);

    if(!$con){
        die("connection to database failed due to".
        mysqli_connect_error());
    }
    echo("success connecting to db ");
    $image = $_POST['image'];
    $first = $_POST['first'];
    $last = $_POST['last'];
    $pno = $_POST['pno'];
    $email = $_POST['email'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `cms`.`contact_details` (`img`,`first`, `last`, `pno`, `email`, `desc`, `data timwe`) 
    VALUES('$image','$first','$last','$pno','$email','$desc', current_timestamp());";
    if($con->query($sql)==true){
        $insert=true;
        
        echo "Successfully inserted";
        $get_info = "?status=success";
        header("Location: ".$_SERVER['PHP_SELF'].$get_info);
    }
    else{
        echo "error: $sql <br> $con->error";
        // $insert!=true;
        echo "nai ho rha kya";

        

    }
    $con->close();
    exit();}
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContactZ</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
   
    
    
</head>

<body>
    <div class="head1"> 
              
        
        <h1>ContactZ</h1>
        (A Contact Management System)
    </div>  <?php
                if($insert==true){
                echo "<div class='alert alert-success' role='alert'>
                        This is a success alert with. 
            </div>";}   
            // if($insert!==true){
            //     echo "<div class='alert alert-failed' role='alert'>
            //             This is a suc hbjncess alert with. 
            // </div>";}  ?>
            
    <div class="container">
        <form action="config.php" method="post">
             <div class="container px-5 my-5">
                    <div class="mb-3">
                        <label class="form-label" for="img">Image :</label>
                        <input name="image" id="img" type="file" placeholder="img" accept="image/*"/>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"  for="firstName">First Name :</label>
                        <input  class="form-control" name="first" required id="firstName" type="text" placeholder="Enter the person's first Name" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label"  for="lastName">Last Name :</label>
                        <input class="form-control" name="last" required  id="lastName" type="text" placeholder="Enter the person's last Name"/>
                    </div> 
                    <div class="mb-3">
                        <label class="form-label"  for="phoneNumber">Phone number :</label>
                        <input class="form-control" name="pno" required id="phoneNumber" type="text" placeholder="Enter the person's phone number" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label"  for="emailAddress">Email Addres :</label>
                        <input class="form-control" name="email" required id="emailAddress" type="email" placeholder="Enter the person's email Address" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label"  for="enterDescription">Enter Description :</label>
                        <textarea class="form-control" name="desc" id="enterDescription" type="text" placeholder="Enter the person's Description(not required)" style="height: 10rem;" data-sb-validations=""></textarea>
                    </div>
                   <input type="submit" class="btn btn-primary btn-lg"></input>

                    <input type="reset" class="btn btn-secondary btn-lg"></input>
            </div></form>
    </div>
  
</body>
</html>



