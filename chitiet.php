<?php
include 'connect.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
    }
    $sql = "SELECT * from donhang where idDH = ".$id;
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result,1)){
        $tenSP=$row['tenSP'];
        $giaSP=$row['giaSP'];
        $soLuong=$row['soLuong'];
        $paymentMethod=$row['paymentMethod'];
        $clientName=$row['clientName'];
        $phoneNum=$row['phoneNum'];
        $shippingAdd=$row['shippingAdd'];
        $intendTime=$row['intendTime'];
        $shippingFee=$row['shippingFee'];
        $tstatus=$row['tstatus'];
        $clientCharge=$row['clientCharge'];
        $totalPrice=$row['totalPrice'];
    }


// $user = [];
 $user = (isset($_SESSION['user'])) ? $_SESSION['user']: [];
//  $user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chi Tiết Đơn Hàng</title>
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
                    <li><a href="#"><strong><?php echo $user['fullname'] ?>
                        <i class="fa fa-user mx-2" aria-hidden="true"></i></strong></a>
                    </li>
                    <li><a href="dangxuat.php"><strong>ĐĂNG XUẤT</strong></a></li>

                </ul>
            </div>
        </div>
    </nav>

    <div id="chitiet" class="container-fluid bg-grey">
        <br><br><br>
        <button style="background-color: #f4511e;" type="submit" class="btn btn-success" >
            <a href="danhsach.php">
            <span style="color: #fff;" class="glyphicon glyphicon-chevron-left"></span></span></a>
        </button>
        <h2>CHI TIẾT ĐƠN HÀNG</h2>
        <div class="row">
            <div class="col-sm-8">
                <div class="panel panel-default">

                    <div  class="panel-heading">
       
                        <h4>Đơn hàng: <?php echo $id?></h4>
                        <button type="submit" class="print-hoadon "><span  class="glyphicon glyphicon-print"></span>  In đơn hàng</button>
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-6">
                            <h4>THÔNG TIN KHÁCH HÀNG</h4>
                            <p><span class="glyphicon glyphicon-user"></span><?php echo $clientName?></p>
                            <p><span class="glyphicon glyphicon-earphone"></span><?php echo $phoneNum?></p>
                            
                        </div>
                        <div class="col-sm-6">
                            <h4>ĐỊA CHỈ GIAO HÀNG</h4>
                            <p><span class="glyphicon glyphicon-map-marker"></span><?php echo $shippingAdd?></p>
                            <!-- <p style="color: #f4511e;">Thay đổi địa chỉ giao hàng</p> -->
                        </div>
                        </div>
                    <div class="panel-footer">
                        <h4>THÔNG TIN ĐƠN HÀNG</h4>
                        <br>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Mã ĐH</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Thành tiền</th>
                                    <th>Phí giao hàng</th>
                                    <th>Tổng tiền tiền</th>
                                    <th>Phương thức thanh toán</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $id?></td>
                                    <td><?php echo $tenSP?></td>
                                    <td><?php echo $soLuong?></td>
                                    <td><?php echo $giaSP?></td>
                                    <td><?php echo $clientCharge?></td>
                                    <td><?php echo $shippingFee?></td>
                                    <td><?php echo $totalPrice?></td>
                                    <td><?php echo $paymentMethod?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>  
            </div>
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div style="background-color: #fff;" class="panel-heading">
                        <h4><span style="color: #f4511e;" class="glyphicon glyphicon-list-alt"></span> THÔNG TIN ĐƠN HÀNG 
                            <span style="font-size: 16px; background-color: #f4511e; color: #fff; border-radius: 15px;padding: 8px;">
                            <?php echo $tstatus?></span></h4>
                        
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-4">
                            <p>Ngày hẹn giao</p>
                            <p>Phí vận chuyển</p>
                            <p>Trạng thái</p>

                        </div>
                        <div class="col-sm-4">
                            <p>: <?php echo $intendTime?></p>
                            <p>: <?php echo $shippingFee?></p>
                            <p>: <?php echo $tstatus?></p>
                            
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div style="background-color: #fff;" class="panel-heading">
                        <h4><span style="color: #f4511e;" class="glyphicon glyphicon-credit-card"></span> THÔNG TIN THANH TOÁN</h4>
                    </div>
                    <div class="panel-footer">
                        <p>Hình thức thanh toán dự kiến: <?php echo $paymentMethod?></p>
                    </div>

                </div>
            </div> 
        </div>
        
    </div>
</body>
<footer>
<nav class="navbar navbar-default navbar-fixed-bottom text-center">
    <a href="#myPage" title="To Top">
        
        <span class="glyphicon glyphicon-chevron-up" ></span>
        
    </a>
    <p style="color: #fff;"><strong>Made By Lò Văn Dự</strong><span class="glyphicon glyphicon-heart"></span></p>
</nav>
</footer>
</html>