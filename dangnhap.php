<?php
include 'connect.php';

if(isset($_POST['name'])){
    $name = $_POST['name'];
    $password = $_POST['password'];

    $sql = "select * from nguoidung where username='$name'";
    $query = mysqli_query($conn,$sql);
    $data=mysqli_fetch_assoc($query);
    $checkUser = mysqli_num_rows($query);
    if($checkUser == 1){
        $checkPass = password_verify($password,$data['password']);
        if($checkPass){
            $_SESSION['user'] = $data;
            header('location: index.php');
        }else{
            echo "Sai mật khẩu";
        }
    }
    else{
        echo "Người dùng không đúng";
    }
    
    


} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="csss.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">s -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="dangnhap.php" class="navbar-brand"><strong>LoDu STORE</strong></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="dangky.php"><strong>ĐĂNG KÝ</strong></a></li>
                    <li><a href="dangnhap.php"><strong>ĐĂNG NHẬP</strong></a></li>
                    <!-- <li><a href="donhuy.php"><strong>ĐƠN TRẢ HÀNG</strong></a></li> -->
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron text-center">
        <h1>QUẢN LÝ ĐƠN HÀNG</h1>
        <!-- <p>We specialize in blablabla</p> -->
    </div>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            
            <form action="" method="POST" role="form">
                <legend>Đăng nhập</legend>
            
                <div class="form-group">
                    <label for="">Tên đăng nhập </label>
                    <input type="text" class="form-control" id="" placeholder="" name="name">
                    
                </div>
                
                <div class="form-group">
                    <label for="">Mật khẩu </label>
                    <input type="password" class="form-control" id="" placeholder="" name="password">
                    
                </div>

                <button type="submit" class="btn btn-primary">Đăng nhập</button>
            </form>
            
        </div>
        <div class="col-md-3"></div>
    </div>
</div><br><br><br>
</body>
<footer>
<nav class="navbar navbar-default navbar-fixed-bottom text-center" >
    <a href="#myPage" title="To Top">
        
        <span class="glyphicon glyphicon-chevron-up" ></span>
        
    </a>
    <p style="color: #fff;"><strong>Made By Lò Văn Dự</strong><span class="glyphicon glyphicon-heart"></span></p>
</nav>
</footer>
</html>