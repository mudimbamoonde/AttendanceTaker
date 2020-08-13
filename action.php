<?php
include "includes/config.php";
$output = "";
if(isset($_POST["userAll"])){
  $sql = "SELECT*FROM sysuser";
  $query = $connect->prepare($sql);
  $query->execute();
  if ($query->rowCount() > 0){
      while($row = $query->fetch(PDO::FETCH_OBJ)){
        $sysID = $row->sysID;
        $fname = $row->firstName;
        $sname = $row->surname;
        $uname = $row->username;
        $email = $row->email;
        $cellPhone = $row->cellphone;
        $position = $row->position;
        $output .="
            <tr>
              <td><a href='securityCode.php?UID=$sysID' class='btn btn-info'><span class='fa fa-barcode'>Security Code</span></a> </td>
              <td>$uname</td>
              <td>$email</td>
              <td>$cellPhone</td>
              <td>$position</td>
              <td><a href='rm.php?uidel=$sysID' class='btn btn-danger'><span class='fa fa-trash-o'>Delete</span></a> | 
              <a href='edit.php?uided=$sysID' class='btn btn-secondary'><span class='fa fa-pencil-square-o'>Edit</span></a></td>
            </tr>
            ";
      }
}else{
    $output .= "
            <tr>
              <td>0</td>
              <td>No Record</td>
              <td>N/A</td>
              <td>N/A</td>
              <td>N/A</td>
              <td>N/A</td>
              <td>N/A</td>
              <td>N/A</td>
            </tr>
            ";
}
  }

//Create USer
if(isset($_POST["Create"])){
  //data:{Create:1,fname:fname,sname:sname,uname:uname,email:email,phone:phone,position:position,status:status},
   if(empty($_POST["fname"]) || empty($_POST["sname"]) || empty($_POST["uname"]) || empty($_POST["email"]) 
     || empty($_POST["phone"]) || empty($_POST["position"])){
      $output .="<div class='alert alert-danger'>Fill All the Entries!!</div>";
     }else{
       //Variables
       $fname = $_POST["fname"];
    $sname = $_POST["sname"];
    $uname = $_POST["uname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $position = $_POST["position"];
    // $status = $_POST["status"];
    $cpword = $_POST["cpword"];
    $conP  = $_POST["pword"];
    if($cpword != $conP){
      $output .="Password Mismatch";
    }
    // cpword:confirm, pword:password

       $checkExist = "SELECT*FROM sysuser WHERE email =:email";
       $ch = $connect->prepare($checkExist);
       $ch->bindParam(":email",$email);
       $ch->execute();
       if($ch->rowCount()> 0){
           $output .="<div class='alert alert-danger'>$email  is already in use.</div>";
       }else {
           if ($cpword == $conP) {
               try {
                   $insertSQL = "INSERT INTO sysuser VALUES(?,?,?,?,?,?,?,?)";
                   //F
                   $insert = $connect->prepare($insertSQL);

                   // Password Encrpting to (MD5)
                   $hashed_p = md5($cpword);
                   //value bind
                   $insert->bindValue(1, NULL);
                   $insert->bindValue(2, $fname);
                   $insert->bindValue(3, $sname);
                   $insert->bindValue(4, $uname);
                   $insert->bindValue(5, $email);
                   $insert->bindValue(6, $phone);
                   $insert->bindValue(7, $hashed_p);
                   $insert->bindValue(8, $position);
//        $insert->bindValue(9, "nactive");

                   $insert->execute();
                   $output .= "<div class='alert alert-success'>Recorded Successfully</div>";
               } catch (Exception $e) {
                   $output .= $e->getMessage();
               }
           }else{
               $output .= "<div class='alert alert-danger'>Password Mis-Match</div>";

           }

           }

     }
}

//Edit USer
if(isset($_POST["EditUser"])){
  //data:{Create:1,fname:fname,sname:sname,uname:uname,email:email,phone:phone,position:position,status:status},

       //Variables
    $sysID = $_POST["sysID"];
    $fname = $_POST["fname"];
    $sname = $_POST["sname"];
    $uname = $_POST["uname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $position = $_POST["position"];
    $new_pword = $_POST["Newword"];
    $Old_p  = md5($_POST["Oldword"]);


       $hashed_p = md5($new_pword);


       $checkExist = "SELECT*FROM sysuser WHERE sysID =:sysID";
       $ch = $connect->prepare($checkExist);
       $ch->bindParam(":sysID",$sysID);
       $ch->execute();

       $row = $ch->fetch(PDO::FETCH_OBJ);
         $p = $row->password;

        if ($p != $Old_p){
           $output .="<div class='alert alert-danger'>Wrong Password!</div>";
       }else{
         try{
             /* sysID firstName | surname | username | email | cellphone | password | position */
           $insertSQL = "UPDATE sysuser SET firstName=?, surname =?,username=?,
                                email=?,cellphone=?,password=?,position=? WHERE sysID=?";
           $insert = $connect->prepare($insertSQL);

           //value bind
            $insert->bindValue(1, $fname);
            $insert->bindValue(2, $sname);
            $insert->bindValue(3, $uname);
            $insert->bindValue(4, $email);
            $insert->bindValue(5, $phone);
            $insert->bindValue(6, $hashed_p);
            $insert->bindValue(7, $position);
            $insert->bindValue(8, $sysID);
            $insert->execute();
                 $output .="<div class='alert alert-success'>Edited Successfully</div>";
            }catch(Exception $e){
              $output .= $e->error();
            }

      }


}

//Categories Creation
if (isset($_POST['CreateCategory'])){
    $catName = $_POST["catName"];
    $sql = "INSERT INTO category VALUES(?,?)";
    $mysql = $connect->prepare($sql);
    $mysql->bindValue(1,Null);
    $mysql->bindValue(2,$catName, PDO::PARAM_STR);
    if ($mysql->execute()){
        $output .="<div class='alert alert-success'>Recorded Successfully</div>";
    }else{
        $output .="<div class='alert alert-danger'>Failed to Record</div>";
    }

}

//Fetch Cat
if (isset($_POST['viewCategory'])){
   $sql = "SELECT*FROM category";
   $mysql = $connect->prepare($sql);
   $mysql->execute();
   $n = 0;
   if ($mysql->rowCount() >0 ) {
       while ($row = $mysql->fetch(PDO::FETCH_OBJ)) {
           $id = $row->catID;
           $Name = $row->catName;
           $output .= " <tr>
                        <th>$id</th>
                        <th>$Name</th>
                        <th><a href='javascript:;' id='cateDele' cateDel='$id'  class='btn btn-sm btn-danger'><span class='fa fa-trash-o'></span></a>
                       
                    </tr>";
       }

   }else{
       $output .= " <tr>
                        <th>0</th>
                        <th>No Data</th>
                        <th><a href='' class='btn btn-sm btn-danger disabled'><span class='fa fa-trash-o'></span></a> </th>
                    </tr>";
   }

}

//deleteCate:1,cateDel:cateDel
if (isset($_POST["deleteCate"])){
    $id = $_POST["cateDel"];
    $sql = "DELETE FROM category WHERE catID=?";
    $binder = $connect->prepare($sql);
    $binder->bindValue(1,$id);

    if ($binder->execute()) {
        $output .= "<div class='alert alert-success'>Successfully Deleted</div>";
    } else {
        $output .= "<div class='alert alert-danger'>Failed to Record " . $connect->errorInfo() . "</div>";
    }
}

//Question Creation
if (isset($_POST['CreateQuestion'])){
    $qu = $_POST["qu"];
    $catID = $_POST["catID"];
    $mark = $_POST["mark"];
    $sql = "INSERT INTO questionsheet VALUES(?,?,?,?)";
    $mysql = $connect->prepare($sql);
    $mysql->bindValue(1,Null);
    $mysql->bindValue(2,$catID, PDO::PARAM_STR);
    $mysql->bindValue(3,$qu, PDO::PARAM_STR);
    $mysql->bindValue(4,$mark, PDO::PARAM_INT);
    if ($mysql->execute()){
        $output .="<div class='alert alert-success'>Recorded Successfully</div>";
    }else{
        $output .="<div class='alert alert-danger'>Failed to Record ".$connect->errorInfo()."</div>";
    }

}

//Learners Question Creation

if (isset($_POST['CreateLearnerQuestion'])){
    $qu = $_POST["qu"];
    $mark = $_POST["mark"];
    $sql = "INSERT INTO learnersSheet VALUES(?,?,?)";
    $mysql = $connect->prepare($sql);
    $mysql->bindValue(1,Null);
    $mysql->bindValue(2,$qu, PDO::PARAM_STR);
    $mysql->bindValue(3,$mark, PDO::PARAM_INT);
    if ($mysql->execute()){
        $output .="<div class='alert alert-success'>Recorded Successfully</div>";
    }else{
        $output .="<div class='alert alert-danger'>Failed to Record ".$connect->errorInfo()."</div>";
    }

}


//Fetch  Question
if (isset($_POST['viewQuestion'])){
   $sql = "SELECT*FROM questionsheet AS q inner join category as c ON c.catID = q.catID ORDER BY c.catID";
   $mysql = $connect->prepare($sql);
   $mysql->execute();
   /*
    * CREATE TABLE questionsheet(
    evaID int(10) PRIMARY KEY AUTO_INCREMENT,
    catID int(10) not null,
    VariableName VARCHAR(200),
    Mark int(20)
)ENGINE =innodb;
    * */
   $n = 0;
   if ($mysql->rowCount() >0 ) {
       while ($row = $mysql->fetch(PDO::FETCH_OBJ)) {
           $questionID = $row->evaID;
           $catid = $row->catID;
           $catName = $row->catName;
           $Name = $row->VariableName;
           $mark = $row->Mark;
           $output .= " <tr>
                        <th>$questionID</th>
                        <th>$catName</th>
                        <th>$Name</th>
                        <th>$mark</th>
                        <th><a href='' deleteQID='$questionID' id='trashQuestion' class='btn btn-sm btn-danger'><span class='fa fa-trash-o'></span></a>
                        <a href='edit_do.php?evalID=$questionID' class='btn btn-sm btn-secondary'><span class='fa fa-pencil'></span></a> </th>
                    </tr>";
       }

   }else{
       $output .=" <tr>
                        <th>0</th>
                        <th>No Data</th>
                        <th>No Data</th>
                        <th>No Data</th>
                        <th><a href='' class='btn btn-sm btn-danger disabled'><span class='fa fa-trash-o'></span></a> </th>
                    </tr>";
   }

}
//Edit QuestionSheet
if (isset($_POST["EditKi"])){
    //EditKi:1,qu:qu,mark:mark,catID:catID
    $qu = $_POST["qu"];
    $mark = $_POST["mark"];
    $catID = $_POST["catID"];
    $evalID = $_POST["evalID"];
//evaID | catID | VariableName | Mark
    $sql = "UPDATE questionsheet SET catID=?, VariableName=?, Mark=? WHERE evaID=?";
    $binder = $connect->prepare($sql);
    $binder->bindValue(1,$catID);
    $binder->bindValue(2,$qu);
    $binder->bindValue(3,$mark);
    $binder->bindValue(4,$evalID);
    if ($binder->execute()) {
        $output .= "<div class='alert alert-success'>Successfully Updated</div>";
    } else {
        $output .= "<div class='alert alert-danger'>Failed to Update " . $connect->errorInfo() . "</div>";
    }
}





//Delete Departmental Question
if (isset($_POST["deleteQ"])) {
//deleteQ:1,deleteQID:deleteQID
    $deleteQID = $_POST["deleteQID"];
$sql = "DELETE FROM questionsheet WHERE evaID=?";
$binder = $connect->prepare($sql);
$binder->bindValue(1,$deleteQID);
    if ($binder->execute()) {
        $output .= "<div class='alert alert-success'>Successfully Deleted</div>";
    } else {
        $output .= "<div class='alert alert-danger'>Failed to Record " . $connect->errorInfo() . "</div>";
    }

}

//Fetch Learner Question
if (isset($_POST['viewLearnersQuestion'])){
   $sql = "SELECT*FROM learnersSheet";
   $mysql = $connect->prepare($sql);
   $mysql->execute();
   $n = 0;
   /*
    *   sheetID int(10) PRIMARY KEY AUTO_INCREMENT,
    VariableName VARCHAR(200),
    Mark int(20)
   */
   if ($mysql->rowCount() >0 ) {
       while ($row = $mysql->fetch(PDO::FETCH_OBJ)) {
           $questionID = $row->sheetID;
           $VariableName = $row->VariableName;
           $mark = $row->Mark;
           $output .= " <tr>
                        <th>$questionID</th>
                        <th>$VariableName</th>
                        <th>$mark</th>
                        <th><a href='' id='delteLearner' deleteLearner='$questionID' class='btn btn-sm btn-danger'><span class='fa fa-trash-o'></span></a>
                        <a href='editLsh.php?id=$questionID' class='btn btn-sm btn-secondary'><span class='fa fa-pencil'></span></a> </th>
                    </tr>";
       }

   }else{
       $output .= " <tr>
                        <th>0</th>
                        <th>No Data</th>
                        <th>No Data</th>
                  
                        <th><a href='' class='btn btn-sm btn-danger disabled'><span class='fa fa-trash-o'></span></a> </th>
                    </tr>";
   }

}

if (isset($_POST["deleteQu"])) {
    $id = $_POST["delID"];
    $sql = "DELETE FROM learnersSheet WHERE sheetID=?";
    $binder = $connect->prepare($sql);
    $binder->bindValue(1, $id);
    if ($binder->execute()) {
        $output .= "<div class='alert alert-success'>Successfully Deleted</div>";
    } else {
        $output .= "<div class='alert alert-danger'>Failed to Record " . $connect->errorInfo() . "</div>";
    }
}

if (isset($_POST["editVariable"])){
    //editVariable:1,qu:qu,mark:mark,sheetID:sheetID
    $question = $_POST["qu"];
    $mark = $_POST["mark"];
    $sheetID = $_POST["sheetID"];
    // sheetID | VariableName                                   | Mark
    $sql = "UPDATE learnerssheet SET VariableName=?, Mark=? WHERE sheetID=?";
    $binder = $connect->prepare($sql);
    $binder->bindValue(1,$question);
    $binder->bindValue(2,$mark);
    $binder->bindValue(3,$sheetID);
    if ($binder->execute()) {
        $output .= "<div class='alert alert-success'>Successfully Edit</div>";
    } else {
        $output .= "<div class='alert alert-danger'>Failed to Record " . $connect->errorInfo() . "</div>";
    } $binder->execute();
}
//barCode

if (isset($_POST["barCode"])){
    if (!empty($_POST["learnerID"])) {
        $learnerID = $_POST["learnerID"];
        $sql = "SELECT*FROM sysuser WHERE sysID=?";
        $binder = $connect->prepare($sql);
        $binder->bindValue(1,$learnerID);
        $binder->execute();
        $rx = $binder->fetch(PDO::FETCH_OBJ);

        if ($rx->acc)

        if ($binder->rowCount() ==1){
            $row = $binder->fetch(PDO::FETCH_OBJ);
            //        INSERT INTO DB->attendance
            $take  = "INSERT INTO attendance(attID,learnerID) VALUES(?,?)";
            $bind = $connect->prepare($take);
            $bind->bindValue(1,null);
            $bind->bindValue(2,$row->sysID);
            if ($bind->execute()){
                $output .= "<p class='text-success'>$row->firstName $row->surname is Present</p>";
            }else{
                $output .= "<p class='text-warning'>Failed to Log</p>";
            }
        }else{
            $output .= "<p class='text-danger'>Invalid ID</p>";
        }


    }else{
        $output .= "<p class='text-warning'>Dont Scan Blank</p>";
    }

}

echo $output;