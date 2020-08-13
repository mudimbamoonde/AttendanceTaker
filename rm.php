<?php

include "includes/config.php";
$userID =  $_GET["uidel"];

$del = $connect->prepare("DELETE FROM sysuser WHERE sysID = :uid");
$del->bindParam(":uid",$userID);
if($del->execute()){
header("location:Vuser.php?success");
}else{
    header("location:Vuser.php?failed");
}