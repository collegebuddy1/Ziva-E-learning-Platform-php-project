$(document).ready(function () {
    // Ajax Call form Already Exists Email Verification
    $("#stuemail").on("keypress blur", function () { 
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var stuemail = $("#stuemail").val();
        $.ajax({
            url: "Student/addstudent.php",
            method: "POST",
            data: {
                checkemail: "checkmail",
                stuemail: stuemail,
            },
            success: function (data) {
                //console.log(data);
                if (data != 0) {
                    $("#statusMsg2").html('<small style="color: red;">Email ID Already Used !</ small>');
                    $("#signup").attr("disabled", true);
                } else if (data == 0 && reg.test(stuemail)) {
                    $("#statusMsg2").html('<small style="color:green;">There You Go !</small>');
                    $("#signup").attr("disabled", false);
                } else if (!reg.test(stuemail)) {
                    $("#statusMsg2").html('<small style="color:red;">Please Enter valid Email e. g. example@mail.com !</small>');
                    $("#signup").attr("disabled", false);
                }
                if(stuemail == ""){
                    $("#statusMsg2").html('<small style="color:red;">Please Enter Email!</small>');
                } else if(stuname == ""){
                    $("#statusMsg1").html('<small style="color:red;">Please Enter Name!</small>');
                }
            },
        });
    });
});

function addstu(){
 var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
 var stuname = $("#stuname").val();
 var stuemail = $("#stuemail").val();
 var stupass = $("#stupass").val();
 //console.log(stuname);
 //console.log(stuemail);
 //console.log(stupass);
 
 // Checking Form Fields on Form Submission
 if (stuname.trim() == "") {
    $("#statusMsg1").html('<small style="color: red;">Please Enter Name !</small>');
    $("#stuname").focus();
    return false;
 }  else if (stuemail.trim() == ""){
    $("#statusMsg2").html('<small style="color: red;">Please Enter Email !</small>');
    $("#stuemail").focus();
    return false;
 }  else if (stuemail.trim()!="" && !reg.test(stuemail)){
    $("#statusMsg2").html('<small style="color: red;">Please Enter Valid Email e.g abc@mail.com !</small>');
    $("#stuemail").focus();
    return false;
 }  else if (stupass.trim() == ""){
    $("#statusMsg3").html('<small style="color: red;">Please Enter Password !</small>');
    $("#stupass").focus();
    return false;
 } else if (!/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/.test(stupass)) {
    $("#statusMsg3").html('<small style="color: red;">Password must be at least 8 characters long and include at least one special character and digit !</small>');
    $("#stupass").focus();
    
    return false;
 /*}  else if (stupass.length < 8) {
    $("#statusMsg3").html('<small style="color: red;">Password must be at least 8 characters long!</small>');
    $("#stupass").focus();
    return false;
 } else if (!/[^a-zA-Z0-9]/.test(stupass)) {
    $("#statusMsg3").html('<small style="color: red;">Password must contain at least one special character !</small>');
    $("#stupass").focus();
    return false;
 } else if (!/^[^-\s\[\]\*#%\^\+-]+$/.test(stupass)) {
    $("#statusMsg3").html('<small style="color: red;">Invalid Input!</small>');
    $("#stupass").focus();
    return false;*/
 }  else{
    $.ajax({
        url:'Student/addstudent.php',
        method: 'POST',
        dataType: "json",
        data:{
            stusignup:"stusignup",
            stuname : stuname,
            stuemail : stuemail,
            stupass : stupass,
        },
        success:function(data){
            console.log(data);
            if(data=="OK"){
                $('#successMsg').html("<span class='alert alert-success'>Registration Successful !</span>");
                clearStuRegField();
            } else if(data == "Failed"){
                $('#successMsg').html("<span class='alert alert-danger'>Unable to register</span>");
                clearStuRegField();
            }
        },
    });
 }
}

//Empty all Fields and status Mesg
function clearStuRegField() {
    $("#stuRegForm").trigger("reset");
    $("#statusMsg1").html(" ");
    $("#statusMsg2").html(" ");
    $("#statusMsg3").html(" ");
}

// Ajax Call for Student Login verification 
function checkStuLogin(){
    var stuLogEmail = $("#stuLogemail").val(); 
    var stuLogPass = $("#stuLogpass").val(); 
    $.ajax({
        url: "Student/addstudent.php", method: "POST",
        data: {
            checkLogemail: "checklogmail",
            stuLogEmail: stuLogEmail,
            stuLogPass: stuLogPass,
        },
        success: function (data) {
            if (data == 0) {
                $("#statusLogMsg").html('<small class="alert alert-danger">Invalid Email ID or Password !</small>');
                
                
            } else if (data == 1) {
                $("#statusLogMsg").html('<div class="spinner-border text-success" role="status"></div>');
                setTimeout(()=>{
                    window.location.href="index.php";
                },  setInterval('location.reload()', 100)); 
            }
        },
    });
 }
