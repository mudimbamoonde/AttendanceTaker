<html>
<head>
    <style>
        p.inline {display: inline-block;}
        span { font-size: 13px;}
    </style>
</head>
<body>
<div align="center">
    <?php
    include 'includes/php_barcode/barcode128.php';
    //		$product = $_POST['product'];
    //		$product_id = $_POST['product_id'];
    //		$rate = $_POST['rate'];
    $connect = new PDO("mysql:host=localhost;dbname=attendance","root","");
    $sql = "SELECT*FROM sysuser WHERE sysID =?";
    $bind = $connect->prepare($sql);
    $bind->bindValue(1,$_GET["UID"]);
    $bind->execute();
    $row = $bind->fetch(PDO::FETCH_OBJ);
    $security = $row->sysID.$row->firstName.$row->surname;
    echo "<p class='inline'><span ><b>Admin Name: $row->firstName $row->surname</b></span>".generateBarCode(stripcslashes($security))."<span ><b>Account Type: ".$row->position." </b><span></p>&nbsp&nbsp&nbsp&nbsp";
    ?>
    <br>
    <a href="Vuser.php">Back</a>
</div>
</body>
</html>