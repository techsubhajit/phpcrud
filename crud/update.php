<?php 
    include('connect.php');

    $id=$_GET['updateid'];

    // $result = mysqli_query($con, "SELECT * FROM crud WHERE id=$id");
    // while($user_data = mysqli_fetch_array($result))
    // {
    //   $name = $user_data['name'];
    //   $email = $user_data['email'];
    //   $mobile = $user_data['mobile'];
    //   $password = $user_data['password'];
    // }

    $sql="select * from `crud` where id=$id";
    $result=mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $name=$row['name'];
    $email=$row['email'];
    $mobile=$row['mobile'];
    $password=$row['password'];


    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $password=$_POST['password'];

        $sql="update `crud` set id=$id,name='$name',email='$email',mobile='$mobile', password='$password' where id=$id";
        $result=mysqli_query($con, $sql);
        if($result){
            // echo "Data update sucessfully";
            header('location:display.php');
        }else{
            die(mysqli_error($con));
        }


    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD in PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <form method="post">
            <div class="form-group mb-3">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Edit your name" value="<?php echo $name ?>" name="name" autocomplete="off" required>
            </div>

            <div class="form-group mb-3">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Edit your email" value="<?php echo $email ?>" name="email" autocomplete="off" required>
            </div>

            <div class="form-group mb-3">
                <label>Mobile</label>
                <input type="text" class="form-control" placeholder="Edit your mobile" value="<?php echo $mobile ?>" name="mobile" autocomplete="off" required>
            </div>

            <div class="form-group mb-3">
                <label>Password</label>
                <input type="text" class="form-control" placeholder="Edit your password" value="<?php echo $password ?>" name="password" autocomplete="off" required>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>