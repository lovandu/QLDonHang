<?php
include 'connect.php';

$user = (isset($_SESSION['user'])) ? $_SESSION['user']: [];
$sql = "SELECT SUM(totalPrice),COUNT(idDH), MAX(totalPrice) from donhang;"; 
$maxdh = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($maxdh,1)){
    $max=$row['MAX(totalPrice)'];
    $sum=$row['SUM(totalPrice)'];
    $count=$row['COUNT(idDH)'];
}

$sqll = "SELECT  idDH,clientName from donhang where totalPrice=".$max; 
$result = mysqli_query($conn, $sqll);
while($row = mysqli_fetch_array($result,1)){
    $idDH=$row['idDH'];
    $clientName=$row['clientName'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QL Don Hang</title>
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
                    <li><a href="taodon.php"><strong>T???O ????N H??NG</strong></a></li>
                    <li><a href="danhsach.php"><strong>DANH S??CH ????N H??NG</strong></a></li>
                    <li><a href="donhuy.php"><strong>????N TR??? H??NG</strong></a></li>
                    <li><a href="#"><strong><?php echo $user['fullname'] ?>
                        <i class="fa fa-user mx-2" aria-hidden="true"></i></strong></a>
                    </li>
                    <li><a href="dangxuat.php"><strong>????NG XU???T</strong></a></li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron text-center">
    
        <h1>QU???N L?? ????N H??NG</h1>
        
        <!-- <p>We specialize in blablabla</p> -->
    </div>
    <div id="home" class="container-fluid bg-grey">
        
        <div class="row">
            <div class="col-sm-4">
                <div style="border-color: #f37c58 !important;" class="panel panel-default">
                    <div class="panel-heading ">
                        <h4>????N H??NG L???N TRONG TH??NG</h4>
                        
                    </div>
                    <div  class="panel-body ">
                    <p><strong>M?? ????n h??ng:    </strong><?php echo "$idDH"?></p>
                    <p><strong>T??n kh??ch h??ng: </strong><?php echo "$clientName"?></p>
                    <p><strong>T???ng ti???n:      </strong><?php echo "$max"?> ??</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div style="border-color: #f37c58 !important;" class="panel panel-default">
                    <div  class="panel-heading ">
                        <h4 >DOANH THU TH??NG 12</h4>
                    </div>
                    <div  class="panel-body ">
                        <p><strong>T???ng doanh thu: </strong><?php echo "$sum"?> ??</p>
                        <br>
                       <p></p>
                       <br><p></p>
                       <p></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div style="border-color: #f37c58 !important;" class="panel panel-default">
                    <div  class="panel-heading ">
                        <h4>T???NG ????N H??NG TH??NG 12</h4>
                    </div>
                    <div  class="panel-body ">
                    <p><strong>T???ng ????n h??ng: </strong><?php echo "$count"?></p>
                    <br>
                       <p></p>
                       <br><p></p>
                       <p></p>
                    </div>
                </div>

            </div>
        </div>

                
        
    </div><br><br><br><br>

</body>
<footer>
<nav class="navbar navbar-default navbar-fixed-bottom text-center">
    <a href="#myPage" title="To Top">
        
        <span class="glyphicon glyphicon-chevron-up" ></span>
        
    </a>
    <p style="color: #fff;"><strong>Made By L?? V??n D???</strong><span style="color: #fff;" class="glyphicon glyphicon-heart"></span></p>
</nav>
</footer>
</html>