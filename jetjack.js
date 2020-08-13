$(document).ready(function(){

  //Display All users
    Userall();
  function Userall(){
    $.ajax({
        url:"action.php",
        method:"POST",
        data:{userAll:1},
        success:function(data){
           $("#users_all").html(data);
        }
    });
  }

  //Create User Accounts
  $("#sbt_usr").click(function (event){
    event.preventDefault();
    var fname = $("#fname").val();
    var sname = $("#lname").val();
    var uname = $("#uname").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var position = $("#position").val();
    var password = $("#cpword").val();
    var confirm = $("#pword").val();
    $.ajax({
      url:"action.php",
      method:"POST",
      data:{Create:1,fname:fname,sname:sname,uname:uname,email:email,
            phone:phone,position:position,cpword:confirm, pword:password},
      success:function(data){
        $("#msg_usr").html(data);
        Userall();
      }
    });
  });

  //Edit User Accounts
  $("#sbt_edit").click(function (event){
    event.preventDefault();
    var fname = $("#fname").val();
    var sname = $("#lname").val();
    var uname = $("#uname").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var position = $("#position").val();
    var Oldpassword = $("#cpword").val();
    var Newconfirm = $("#pword").val();
    var sysID = $("#sysID").val();
    $.ajax({
      url:"action.php",
      method:"POST",
      data:{EditUser:1,fname:fname,sname:sname,uname:uname,email:email,
            phone:phone,position:position,Newword:Newconfirm, Oldword:Oldpassword,sysID:sysID},
      success:function(data){
        $("#msg_usr").html(data);
        Userall();
      }
    });
  });


    viewCat();
  //View Categories
    function viewCat() {
        $.ajax({
            url:"action.php",
            type:"POST",
            data:{viewCategory:1},
            success:function (data) {
                $("#viewCat").html(data);
            }
        });

    }

  //Create Categories
  $("#sbt_cat").click(function (event){
    event.preventDefault();
    var catName = $("#catName").val();
    // alert("the cateName is :" + catName);
    $.ajax({
      url:"action.php",
      method:"POST",
      data:{CreateCategory:1, catName:catName},
      success:function(data){
        $("#msg_cat").html(data);
        viewCat();
      }
    });
  });



    viewQuestion();
    //View viewQuestion
    function viewQuestion() {
        $.ajax({
            url:"action.php",
            type:"POST",
            data:{viewQuestion:1},
            success:function (data) {
                $("#viewQuestion").html(data);
            }
        });

    }


    //trashQuestion
    $("body").delegate("#trashQuestion","click",function(event){
        event.preventDefault();
        var deleteQID = $(this).attr("deleteQID");
        // alert(deleteQID)
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{deleteQ:1,deleteQID:deleteQID},
            success:function(data){
                $("#msg_question").html(data);
                viewQuestion();
            }
        });

    });


    //trashQuestion
    $("body").delegate("#cateDele","click",function(event){
        event.preventDefault();
        var cateDel = $(this).attr("cateDel");
        // alert(deleteQID)
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{deleteCate:1,cateDel:cateDel},
            success:function(data){
                $("#msg_cat").html(data);
                viewQuestion();
            }
        });

    });


    viewLearnersQuestion();
    //View viewLearnersQuestion
    function viewLearnersQuestion() {
        $.ajax({
            url:"action.php",
            type:"POST",
            data:{viewLearnersQuestion:1},
            success:function (data) {
                $("#viewLearnersQuestion").html(data);
            }
        });

    }

    //Create viewQuestion
  $("#sbt_que").click(function (event){
    event.preventDefault();
    var qu = $("#qu").val();
    var catID = $("#catID").val();
    var mark = $("#mark").val();
    // alert("the CATID is :" + catID);
    $.ajax({
      url:"action.php",
      method:"POST",
      data:{CreateQuestion:1, catID:catID,qu:qu,mark:mark},
      success:function(data){
        $("#msg_question").html(data);
        viewQuestion();
      }
    });
  });


  //Create viewLearnersQuestion
  $("#sbt_lque").click(function (event){
    event.preventDefault();
    var qu = $("#qu").val();
    var mark = $("#mark").val();
    // alert("the CATID is :" + catID);
    $.ajax({
      url:"action.php",
      method:"POST",
      data:{CreateLearnerQuestion:1,qu:qu,mark:mark},
      success:function(data){
        $("#msg_question").html(data);
        viewLearnersQuestion();
      }
    });
  });

  //Edit Questions
  $("#sbt_update").click(function (event){
    event.preventDefault();
    var evalID = $("#evalID").val();
    var qu = $("#qu").val();
    var mark = $("#mark").val();
    var catID = $("#catID").val();
    // alert("the CATID is :" + catID);
    $.ajax({
      url:"action.php",
      method:"POST",
      data:{EditKi:1,qu:qu,mark:mark,catID:catID,evalID:evalID},
      success:function(data){
        $("#msg_question").html(data);

      }
    });
  });

  //Edit viewLearnersQuestion
  $("#sbt_ledit").click(function (event){
    event.preventDefault();
    var qu = $("#qu").val();
    var mark = $("#mark").val();
    var sheetID = $("#sheetID").val();
    // alert("the CATID is :" + catID);
    $.ajax({
      url:"action.php",
      method:"POST",
      data:{editVariable:1,qu:qu,mark:mark,sheetID:sheetID},
      success:function(data){
        $("#msg_question").html(data);
        viewLearnersQuestion();
      }
    });
  });


  //Create Evalution
  $("#sbt_eval").click(function (event){
    event.preventDefault();
    var a5 = $("#a5").val();
    var a4 = $("#a4").val();
    var a3 = $("#a3").val();
    var a2 = $("#a2").val();
    var a1 = $("#a1").val();


    // var rc = new Array(sheetID);
for (var i=0; i<10; i++){
    var sheetID = $("#sheetID").val();
    $("#msg_question").html("SheetID of :"+sheetID+" Evaluation Score: " + a1 +" "+a2+" "+a3+" "+a4+" "+a5  );
}

    $.ajax({
      url:"action.php",
      method:"POST",
      data:{CreateLearnerQuestion:1,qu:qu,mark:mark},
      success:function(data){
        $("#msg_question").html(data);
        viewLearnersQuestion();
      }
    });
  });


//DELTE USER
  $("body").delegate("#delteLearner","click",function(event){
      event.preventDefault();
       var delID = $(this).attr("deleteLearner");
       // alert(delID)
      $.ajax({
          url:"action.php",
          method:"POST",
          data:{deleteQu:1,delID:delID},
          success:function(data){
              $("#msg_question").html(data);
              viewLearnersQuestion();
          }
      });

    });



//End of Document
});