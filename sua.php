<?php
include 'connect.php';
?>
<?php
 $user = (isset($_SESSION['user'])) ? $_SESSION['user']: [];
 if(isset($_GET['id'])){
    $id = $_GET['id'];
    
}
$sqll = "SELECT * from donhang where idDH = ".$id;
    $result = mysqli_query($conn, $sqll);
    while($row = mysqli_fetch_array($result,1)){
        $tenSP1=$row['tenSP'];
        $giaSP1=$row['giaSP'];
        $soLuong1=$row['soLuong'];
        $paymentMethod1=$row['paymentMethod'];
        $clientName1=$row['clientName'];
        $phoneNum1=$row['phoneNum'];
        $shippingAdd1=$row['shippingAdd'];
        $intendTime1=$row['intendTime'];
        $shippingFee1=$row['shippingFee'];
        $tstatus1=$row['tstatus'];
    }
//  $user = $_SESSION['user'];
$sanpham=mysqli_query($conn,"select * from sanpham");
if(isset($_POST['them'])){
    $tenSP=$_POST['tenSP'];
    $giaSP=$_POST['giaSP'];
    $soLuong=$_POST['soLuong'];
    $paymentMethod=$_POST['paymentMethod'];
    $clientName=$_POST['clientName'];
    $phoneNum=$_POST['phoneNum'];
    $shippingAdd=$_POST['shippingAdd'];
    $intendTime=$_POST['intendTime'];
    $shippingFee=$_POST['shippingFee'];
    $tstatus=$_POST['tstatus'];
    $clientCharge=$giaSP*$soLuong;
    $totalPrice=$clientCharge+$shippingFee;


    $sql="UPDATE donhang SET clientName ='$clientName',phoneNum='$phoneNum',shippingAdd='$shippingAdd',paymentMethod='$paymentMethod',shippingFee=$shippingFee,
    clientCharge=$clientCharge,totalPrice=$totalPrice,intendTime='$intendTime',tstatus='$tstatus',tenSP='$tenSP',giaSP=$giaSP,soLuong=$soLuong
    WHERE idDH = ".$id;
    $query=mysqli_query($conn,$sql);
    if($query){
        header('location:danhsach.php');
    }
    else{
        // header('location:taodon.php');
        echo "loi";

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa Đơn Hàng</title>
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
                <a href="index.php" class="navbar-brand"><strong>LoDu STORE</strong></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="taodon.php"><strong>TẠO ĐƠN HÀNG</strong></a></li>
                    <li><a href="danhsach.php"><strong>DANH SÁCH ĐƠN HÀNG</strong></a></li>
                    <li><a href="donhuy.php"><strong>ĐƠN TRẢ HÀNG</strong></a></li>
                    <li><a href="donhuy.php"><strong><?php echo $user['fullname'] ?>
                            <i class="fa fa-user mx-2" aria-hidden="true"></i></strong></a>
                    </li>
                    <li><a href="dangxuat.php"><strong>ĐĂNG XUẤT</strong></a></li>

                </ul>
            </div>
        </div>
    </nav>
    <div id="taodon" class="container-fluid bg-grey">
        <br><br><br>
        <button style="background-color: #f4511e;" type="submit" class="btn btn-success" >
                            <a href="danhsach.php">
                            <span style="color: #fff;" class="glyphicon glyphicon-chevron-left"></span></span></a>
                        </button>
        <h2>TẠO ĐƠN HÀNG</h2>
        <br>
        <div class="row">
            <form action="" method="POST" role="form">
                <div class="col-sm-8">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            <h4>THÔNG TIN SẢN PHẨM</h4>
                            
                            
                                <div class="form-group">
                                    <label for="">Tên sp</label>
                                    <select name="tenSP" class="form-control">
                                    <option value="<?= $tenSP1 ?>"><?php echo $tenSP1; ?></option>

                                        <?php
                                            
                                            $sql = "SELECT * FROM sanpham";
                                            $query = mysqli_query($conn,$sql);
                                            
                                            while ($row = mysqli_fetch_array($query)) { 
                                        ?>
                                            <option value="<?= $row['name_sp'] ?>"><?php echo $row['name_sp']; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                    
                                    <label for="">Giá</label>
                                    <input type="text" class="form-control" id="" placeholder="<?= $giaSP1 ?>" name="giaSP">
                                    <label for="">Số lượng</label>
                                    <input type="text" class="form-control" id="" placeholder="<?= $soLuong1 ?>" name="soLuong">
                                    
                                </div>
                                
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><span style="color: #f4511e;" class="glyphicon glyphicon-credit-card"></span> HÌNH THỨC THANH TOÁN</h4>
                            <!-- <form action="" method="POST" role="form">
                                <legend></legend> -->
                            
                                <div class="form-group">
                                <!-- <label for="">Hình thức thanh toán</label> -->
                                <!-- <input type="text" class="form-control" id="" placeholder="" name="paymentMethod"> -->

                                    <!-- <label for="">Hình thức thanh toán</label> -->
                                    <select name="paymentMethod" class="form-control" placeholder="<?= $paymentMethod1 ?>">

                                        <?php
                                            $sql = "SELECT * FROM sanpham";
                                            $query = mysqli_query($conn,$sql);
                                            
                                            while ($row = mysqli_fetch_array($query)) { 
                                        ?>
                                            <option value="<?= $row['thanhtoan'] ?>"><?php echo $row['thanhtoan']; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                    
                                </div>
                            <!-- </form> -->
                            <br>
                            <button type="submit" class="btn btn-primary text-center" name="them">Cập nhật</button>
                            <br><br><br>
                        </div>
                        

                    </div>
                    <br>

                </div>

                <!-- thông tin đơn hàng -->
                <div class="col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                        <h4>THÔNG TIN KHÁCH HÀNG</h4>
                        </div>
                        <div class="panel-body ">
                            <!-- <form action="" method="POST" role="form"> -->
                                <!-- <legend>Thông tin khách hàng</legend> -->
                            
                                <div class="form-group">
                                    <label for="">Tên khách hàng</label>
                                    <input type="text" class="form-control" id="" placeholder="<?= $clientName1 ?>" name="clientName">
                            
                                    <label for="">Số điện thoại</label>
                                    <input type="text" class="form-control" id="" placeholder="<?= $phoneNum1 ?>" name="phoneNum">
                                
                                    <label for="">Địa chỉ giao hàng</label>
                                    <input type="text" class="form-control" id="" placeholder="<?= $shippingAdd1?>" name="shippingAdd">
                                </div>
                            
                                
                            
                                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                            <!-- </form> -->
                            
                        </div>
                    
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            <h4>THÔNG TIN ĐƠN HÀNG</h4>
                            
                        </div>
                        <div class="panel-body">
                            <!-- <form action="" method="POST" role="form"> -->
                                    <!-- <legend>Thông tin khách hàng</legend> -->
                                <div class="form-group">
                                    <!-- <label for="">Hình thức thanh toán</label> -->
                                    <label for="">Thời gian giao hàng dự kiến</label>
                                    <input type="date" class="form-control" id="" placeholder="<?=$intendTime1?>" name="intendTime">
                                    
                                
                                    <!-- <label for="">Hình thức thanh toán</label> -->
                                    <label for="">Phí vận chuyển</label>
                                    <input type="text" class="form-control" id="" placeholder="<?= $shippingFee1 ?>" name="shippingFee">
                                
                                    <label for="">Trạng thái</label>
                                    <select name="tstatus" class="form-control" placeholder="<?= $tstatus1 ?>">

                                        <?php
                                            $sql = "SELECT * FROM sanpham";
                                            $query = mysqli_query($conn,$sql);
                                            
                                            while ($row = mysqli_fetch_array($query)) { 
                                        ?>
                                            <option value="<?= $row['trangthai'] ?>"><?php echo $row['trangthai']; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                    

                                </div>
                                
                                    
                                
                                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                            <!-- </form> -->
                        </div>
                    </div>
                        
                        
                    </div>
                </div>
            </form>
        </div>
        <!-- <button type="submit" class="taodon text-center">
            <a href="danhsach.php"></a>
        TẠO ĐƠN</button> -->
        
    </div>
</body>
<footer>
<!-- <nav class="navbar navbar-default navbar-fixed-bottom text-center">
    <a href="#myPage" title="To Top">
        
        <span class="glyphicon glyphicon-chevron-up" ></span>
        
    </a>
    <p style="color: #fff;"><strong>Made By Lò Văn Dự</strong><span class="glyphicon glyphicon-heart"></span></p>
</nav> -->
</footer>
</html>