<?php

include('dbConfig.php');
if(isset($_GET['id'])){


$id = $_GET['id'];

$fetch = $conn->query("SELECT * FROM `users` WHERE `user_id`='$id'");

$row = mysqli_fetch_array($fetch);

$user_id = $row['user_id'];
$user_name = $row['user_name'];
$user_email = $row['user_email'];
$user_password = $row['user_pwd'];
$user_gender = $row['user_gender'];

}
?>










    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>Php Crude | Insert</title>
    </head>

    <body>
        <div class="container">
            <h1 style="text-align: center;">Php Crude - Update</h1>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" value="<?php echo $user_name ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">

                    <input type="hidden" name="user_id" value="<?php echo $user_id ?>">

                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" value="<?php echo $user_email ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" value="<?php echo $user_password ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Gender</label><br />
                    <input type="radio" name="gender" value="Male" <?php if ($user_gender = 'Male') echo "Checked" ?>> Male<br />
                    <input type="radio" name="gender" value="Female" <?php if ($user_gender = 'Female') echo "Checked" ?>> Female<br />
                </div>

                <button type="submit" name="update" class="btn btn-primary mb-3">Update Record</button>
            </form>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>

    </html>
    <?php
   

    if(isset($_POST['update'])){
        $user_id = $_POST['user_id'];
        $user_name = $_POST['username'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];
        $user_gender = $_POST['gender'];

        $update = "UPDATE `users` SET `user_id`='$user_id',`user_name`='$user_name',`user_email`='$user_email',`user_pwd`='$user_password',`user_gender`='$user_gender' WHERE `user_id`='$user_id' ";
        $result = $conn->query($update);

        if($result == TRUE){
            // echo "Record Updated Successfully";
            ?>
            <script>
                window.location = "index.php"
            </script>
            <?php
        }
        else{
            echo "Unable to update record " . $conn->error;
        }

    }