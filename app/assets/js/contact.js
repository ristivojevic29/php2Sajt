$(document).ready(function(){

    var posalji = $("#btnPosalji");

    var email = $("#tbEmail");
    var subject=$("#tbSubject");
    var tekst=$(".clTekst");
    var reEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;


    email.blur(function(){
        if(!reEmail.test(email.val()))
            email.css('border', '1px solid red');
        else
            email.css('border', '1px solid green');

    });


    posalji.click(function(e){

        e.preventDefault();
        var nizGreske = [];
        if(email.val()==""){
            nizGreske.push("Enter your email");
        }
        else{
            if(!reEmail.test(email.val()))
            {
                nizGreske.push("Wrong format of email");
            }
            else{}
        }

        var ispis="";
        ispis+="<ul>"
        if(nizGreske!=0){
            for(var i=0;i<nizGreske.length;i++){
                ispis+="<li>"+nizGreske[i]+"</li>";
            }
            ispis+="</ul>"
            document.getElementById("greske").innerHTML=ispis;
            document.getElementById("greske").style.color="red";
        }else{
            document.getElementById("greske").innerHTML="";
            $.ajax({
                url: "index.php?page=submitContact",
                method: "post",

                data: {
                    posalji: true,
                    email: email.val(),

                    subject:subject.val(),
                    tekst:tekst.val()
                },
                success: function(data)
                {
                    alertify.alert("Successfully submited form",function(){
                        window.location='index.php?page=home';
                    });

                },
                error: function(xhr, status, error){
                    console.log(error);}
            })
        }
    })

})