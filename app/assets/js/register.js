$(document).ready(function(){
$('#btnRegister').click(function(e){
    e.preventDefault();
    var firstName=$('#tbFirstName').val();
    var lastName=$('#tbLastName').val();
    var email=$('#tbEmail').val();
    var password=$('#tbPassword').val();
    var repPassword=$('#tbRePassword').val();

    var reFirstName=/^[A-Z][a-z]{2,20}/;
    var reLastName=/^[A-Z][a-z]{2,20}/;
    var reEmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    var rePassword=/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!$%@#£€*?&]{8,}$/;

    var greske=[];

    if(!reFirstName.test(firstName)){
        greske.push('Wrong First Name');
        document.getElementById('tbFirstName').style.borderColor='red';
    }else{
        document.getElementById('tbFirstName').style.borderColor='green';
    }
    if(!reLastName.test(lastName)){
        greske.push('Wrong Last Name');
        document.getElementById('tbLastName').style.borderColor='red';
    }else{
        document.getElementById('tbLastName').style.borderColor='green';
    }
    if(!reEmail.test(email)){
        greske.push('Wrong format of email');
        document.getElementById('tbEmail').style.borderColor='red';
    }else{
        document.getElementById('tbEmail').style.borderColor='green';
    }
    if(!rePassword.test(password)){
        greske.push('Password must contain minimum eight characters, at least one letter and one number');
        document.getElementById('tbPassword').style.borderColor='red';
    }else{
        document.getElementById('tbPassword').style.borderColor='green';
    }
    if(repPassword==password && repPassword!=""){
        document.getElementById('tbRePassword').style.borderColor='green';
    }else{

        greske.push("Password and confirm password does not match");
        document.getElementById('tbRePassword').style.borderColor='red';
    }
    var ispis="";
     ispis+="<ul>";
    if(greske!=0){

        for(var i=0;i<greske.length;i++){
            ispis+="<li>"+greske[i]+"</li>";
        }
        ispis+="</ul>";
      $('#greske').html(ispis);
      document.getElementById('greske').style.color='red';
      //document.getElementById('greske').text.align='center';
    }else{
        $.ajax({
            url:"index.php?page=do-register",
            method:"POST",
            dataType:"json",
            data:{
                send:"send",
                ime:firstName,
                prezime:lastName,
                email:email,
                password:password,
                rePassword:repPassword,

            },
            success:function(){
                console.log("Successful registration");
                alertify.alert("Successfully registration",function(){
                    window.location='index.php?page=login';
                });
            },
            error:function (xhr,status,error) {
                switch (xhr.status) {
                    case 409:
                        $('#greske').html("Email is already taken");
                        break;
                    case 422:
                        $('#greske').html("Wrong format of data");
                        break;
                    case 500:
                        $('#greske').html("Problem with server");
                        break;
                    case 404:
                        $('#greske').html("Not found");
                        break;
                }
                document.getElementById('greske').style.color='red';


            }
        })
    }

})

})