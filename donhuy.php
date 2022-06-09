<?php
include 'connect.php';
?>
<?php

 $user = (isset($_SESSION['user'])) ? $_SESSION['user']: [];
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = "DELETE FROM donhang WHERE idDH = ".$_GET["delete"];
    mysqli_query($conn,$sql);
    header('location:danhsach.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đơn Hàng Trả</title>
    <link rel="stylesheet" href="csss.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
    <div id="danhsach" class="container-fluid bg-grey">
        <br><br><br>
        <button style="background-color: #f4511e;" type="submit" class="btn btn-success" >
                            <a href="index.php">
                            <span style="color: #fff;" class="glyphicon glyphicon-chevron-left"></span></span></a>
                        </button>
        <h2> ĐƠN HÀNG TRẢ HÀNG</h2>
        <br><br>
        <div class="panel panel-default">
            <div class="panel-heading">
            <h4><strong>Tìm kiếm đơn hàng</strong></h4>
               
               
               <form action="" method="GET" role="form">
                   <div class="form-group">
                        </button>
                       <input type="text" class="form-control" id="" placeholder="Nhập tên khách hàng để tìm kiếm" name="timkiem">
                   </div>
               </form>

            </div>
            <div class="panel-body">

            
                <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <!-- <label class="checkbox-inline"><input type="checkbox" ></label> -->
                        <!-- <th><label class="checkbox-inline text-center"><input type="checkbox" ></label></th> -->
                        
                        <th class="text-center" style="width: 80px;">STT</th>
                        <th class="text-center" style="width: 100px;" >Mã DH</th>
                        <th class="text-center" >Tên khách hàng</th>
                        <th class="text-center">SDT</th>
                        <th class="text-center">Tên SP</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center">Tổng tiền</th>
                        <th class="text-center">Thời gian nhận hàng</th>
                        <th class="text-center">Thao tác</th>
                        
                    </tr>
                </thead>
                
                <tbody>
                <?php
//ket noi CSDL (mysql-phpadmin)

$con = mysqli_connect('localhost', 'root','','ltw3_db');
if(isset($_GET['timkiem']) && $_GET['timkiem']!=''){
    $search=$_GET['timkiem'];
    $sql = "SELECT * FROM donhang where clientName like '%$search%'";
}else{
$sql = 'select * from donhang ';
}
$t="Đã trả hàng";
$stt=0;
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result,1)){
    if($row['tstatus']==$t){
        $stt++;
        echo '<tr>
            <td>'.$stt.'</td>        
            <td>'.$row['idDH'].'</td>
            <td>'.$row['clientName'].'</td>
            <td>'.$row['phoneNum'].'</td>
            <td>'.$row['tenSP'].'</td>
            <td>'.$row['giaSP'].'</td>
            <td>'.$row['totalPrice'].'</td>
            <td>'.$row['intendTime'].'</td>
            

            
            <td>
                
                <button id="xem-them" type="submit" class="btn btn-success " >
                <a style="text-decoration:none;" href="chitiet.php?id='.$row['idDH'].'">
                <span style="color: #fff;" >Chi tiết</span></a>
                </button>
                <button id="xem-them"  type="submit" class="btn btn-warning" >
                    <a style="text-decoration:none;" href="sua.php?id='.$row['idDH'].'">
                    <span style="color: #fff; " >Sửa</span></a>
                </button>
                <button id="xem-them"  type="submit" class="btn btn-danger " >
                    <a style="text-decoration:none;" href="danhsach.php?delete='.$row['idDH'].'">
                    <span style="color: #fff; " >Xóa</span></a>
                </button>
            </td>


            
        </tr>';
    }

}

    //dong ket noi
    mysqli_close($con);
?>
                    </table>
                </tbody>

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