$(document).ready(function(){
    $('#btnLogin').click(function(e){
        e.preventDefault();
        let email=$('#tbEmail').val();
        let password=$('#tbPassword').val();
        let reEmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
        let rePassword=/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!$%@#£€*?&]{8,}$/;
        let greske=[];
        if(!reEmail.test(email)){
            greske.push("Wrong format of email");
        }else{

        }
        if(!rePassword.test(password)){
            greske.push("Password must contain minimum eight characters, at least one letter and one number");
        }else{

        }
        let ispis="";
        if(greske.length>0){
            ispis+="<ul>"
            for(let i=0;i<greske.length;i++){
                ispis+="<li>"+greske[i]+"</li>"
            }
            ispis+="</ul>";
            $('#greske').html(ispis);
            document.getElementById('greske').style.color='red';
        }else{
            $.ajax({
                url:"index.php?page=do-login",
                method:"POST",
               // dataType:"json",
                data:{
                    sendLog:"sendLog",
                    email:email,
                    password:password
                },
                success:function(){

                   window.location="index.php"

                },
                error:function(xhr,status,error){
                    switch(xhr.status){
                        case 409:
                            $('#greske').html("An account with these data does not exist");
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