$(document).ready(function(){
    $('.formaZaIzmenu').hide();
    $('.btnUpdate').click(function(e){
        e.preventDefault();
        $('.formaZaIzmenu').show();
        var vrednost=$(this).data("id");
        $.ajax({
            url:"index.php?page=getUser",
            method:"GET",
            dataType:"json",
            data:{
                sendUser:"sendUser",
                vrednost:vrednost
            },
            success:function(podaci){
                console.log(podaci);
                $('#tbFirstName').val(podaci.ime_korisnika);
                $('#tbLastName').val(podaci.prezime_korisnika);
                $('#tbEmail').val(podaci.email);
                $('#ddlUloga').val(podaci.uloge_id);
                $('#hiddenKorisnikID').val(podaci.idKorisnik);
            }
        })
    })
    $('.btnObrisi').click(function(e){
        e.preventDefault();
        var id=$(this).data('id');
       $.ajax({
           url:"index.php?page=deleteUser",
           method:"POST",
           dataType:"json",
           data:{
                delete:"delete",
               id:id
           },
           success:function (data) {
                ispisiKorisnike(data);
           },
           error:function (xhr,status,error) {

           }
       })
    })

    $('#btnIzmena').click(function(e) {
        e.preventDefault();
        var ime = $('#tbFirstName').val();
        var prezime = $('#tbLastName').val();
        var email = $('#tbEmail').val();
        var lozinka = $('#tbPassword').val();
        var uloge = $('#ddlUloga option:selected').val();
        var id = $('#hiddenKorisnikID').val();
        console.log(id);
        var reFirstName = /^[A-Z][a-z]{2,20}/;
        var reLastName = /^[A-Z][a-z]{2,20}/;
        var reEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
        var rePassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!$%@#£€*?&]{8,}$/;

        var greske = [];

        if (!reFirstName.test(ime)) {
            greske.push('Wrong First Name');

        }
        if (!reLastName.test(prezime)) {
            greske.push('Wrong Last Name');

        }
        if (!reEmail.test(email)) {
            greske.push('Wrong format of email');

        }
        if (lozinka != "") {
            if (!rePassword.test(lozinka)) {
                greske.push('Password must contain minimum eight characters, at least one letter and one number');
            }
        }

        var ispis = "";
        ispis += "<ul>";
        if (greske != 0) {

            for (var i = 0; i < greske.length; i++) {
                ispis += "<li>" + greske[i] + "</li>";
            }
            ispis += "</ul>";
            // $('#greske').html(ispis);
            //  document.getElementById('greske').style.color='red';
            //document.getElementById('greske').text.align='center';
        } else {
            $.ajax({
                url: "index.php?page=updateUser",
                method: "POST",
                datType:"json",
                data: {
                    send: "send",
                    ime: ime,
                    prezime: prezime,
                    email: email,
                    lozinka: lozinka,
                    uloge: uloge,
                    id: id
                },
                success: function (data) {

                    alertify.alert("Successfully update", function () {

                        ispisiKorisnike(data)
                    });
                },
                error: function (xhr, status, error) {
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
                    //document.getElementById('greske').style.color='red';


                }
            })
        }
    })

            function ispisiKorisnike(data){

                var ispis="";
                    for(let d of data) {

                        ispis += `<tr><td>${d.idKorisnik}</td>
                    <td>${d.ime_korisnika}</td>
                    <td>${d.prezime_korisnika}</td>
                    <td>${d.email}</td>
                    <td>${d.lozinka}</td>
                    <td>${d.uloge_id}</td>
                    <td><a href="#" class="btnObrisi" data-id="${d.uloge_id}">Delete</a>
                        <a href="#" class="btnUpdate" data-id="${d.uloge_id}">Update</a></td></tr>`
                    }
                $('#kor').html(ispis);
            }
    $('.formaZaIzmenuProizvoda').hide();
    $(document).on('click','.btnUpdateProizvod',function(e){
        e.preventDefault();

        $('.formaZaIzmenuProizvoda').show();
        var vrednost=$(this).data("id");
        $.ajax({
            url:"index.php?page=getProduct",
            method:"GET",
            dataType:"json",
            data:{
                sendProd:"sendProd",
                vrednost:vrednost
            },
            success:function(podaci){
               // console.log(podaci);
                $('#tbTitle').val(podaci.ime_proizvoda);
                $('#tbPrice').val(podaci.cena_proizvoda);
                $('#ddlKategorijaNaocara').val(podaci.idKategorije);
                $('#hiddenProdId').val(podaci.idProizvoda);
            }
        })
    })
    $(document).on('click','.btnObrisiProizvod',function(e){
        e.preventDefault();
        var vrednost=$(this).data("id");
        $.ajax({
            url:"index.php?page=deleteProduct",
            method:"POST",
            dataType:"json",
            data:{
                obrisi:"obrisi",
                vrednost:vrednost
            },
            success:function(data){
                ispisiProizvode(data);
            }
        })
    })
    $('#btnIzmenaNaocara').click(function(e) {
        e.preventDefault();

         var nazivProizvoda=$('#tbTitle').val();
         var cenaProizvoda=$('#tbPrice').val();
         var kategorija=$('#ddlKategorijaNaocara option:selected').val();
            var id=$('#hiddenProdId').val();


            $.ajax({
                url: "index.php?page=updateProduct",
                method: "POST",
                datType:"json",
                data: {
                    updateProd: "updateProd",
                    nazivProizvoda: nazivProizvoda,
                    cenaProizvoda: cenaProizvoda,
                    kategorija: kategorija,
                    id: id,

                },
                success: function (data) {

                    alertify.alert("Successfully update", function () {

                        ispisiProizvode(data);
                       // console.log(data);
                        //ispisiPaginacijuProizvoda(data)
                       // $('.formaZaIzmenuProizvoda').hide();
                    });
                },
                error: function (xhr, status, error) {
                    switch (xhr.status) {
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

    })
    function ispisiProizvode(data){

        var ispis="";
        for(let d of data){

            ispis+=`<tr>
                    <td>${d.idProizvoda}</td>
                    <td>${d.ime_proizvoda}</td>
                    <td>$${d.cena_proizvoda}</td>
                    <td><img class="img-responsive" src="${d.slika_proizvoda}" alt="${d.ime_proizvoda}"/> </td>
                    <td><a href="#" class="btnObrisiProizvod" data-id="${d.idProizvoda}">Delete</a>
                        <a href="#" class="btnUpdateProizvod" data-id="${d.idProizvoda}">Update</a>
                    </td>
                </tr>`
        }
        $('#prodT').html(ispis);

    }
     function ispisiPaginacijuProizvoda(paginacija){
        console.log(paginacija);
         var ispis='';
         for(let i=0;i<paginacija;i++){
             ispis+=`<div id="adminPag">
             <span class="pagination_link" id="${i}">${i+1}</span>
             </div>`
         }
         $('#prodPaginacija').html(ispis);
     }
    $(document).on('click','.pagination_link',function(e){
        e.preventDefault();
        page=$(this).attr('id');
        load_data(page);

    })
   load_data();
    function load_data(page){
        if(!page){
            page=0;
        }
        $.ajax({
            url:"index.php?page=adminPagination",
            method:"POST",
            dataType:"json",
            data:{
                page:page
            },
            success:function(data){
              //  console.log(data.proizvodi);
                ispisiProizvode(data.proizvodi);
                ispisiPaginacijuProizvoda(data.numOfProducts);
              //  console.log(data.numOfProducts);
            },error:function(xhr,status,error){
                console.log(xhr.status);
                console.log(error);
            }
        })
    }
    $('.unosProizvoda').hide();
    $('#dodaj').click(function(e){
        e.preventDefault();
        $('.unosProizvoda').show();})
    $.ajax({
        url:"index.php?page=loggedIn",
        method:"POST",
        dataType:"json",
        success:function(data){
            ispisiOnlajnKorsnike(data);
            // console.log(data);
        },
        error:function(error,xhr,status){
            console.log(xhr.status);
        }
    })
    function ispisiOnlajnKorsnike(korisnici){
        var ispis="";
        var br=0;
        for(let k of korisnici){
            ispis+=`<tr>
                <td>${k.idKorisnik}</td>
                <td>${k.ime_korisnika}</td>
                <td>${k.prezime_korisnika}</td>
                <td>${k.email}</td></tr> `
            br++;
        }
        $('#tabelaOnlajnKorisnika').append(ispis);
        $('#brojUlogovanih').html("Online:"+br);
    }
    $.ajax({
        url:"index.php?page=activity",
        method:"POST",
        dataType:"json",
        success:function(data){
            ispisiPosecenost(data);
            // console.log(data.login);
        },
        error:function(xhr,status,error){
            console.log(xhr.status);
            console.log(error);
        }
    })
    function ispisiPosecenost(poseta){
        //console.log(poseta.login);
        var ispis="<tr>";
        ispis+=`<td><progress value="${poseta.home}" max=100></progress>${poseta.home}%</td>
       <td><progress value="${poseta.contact}" max=100></progress>${poseta.contact}%</td>
       <td><progress value="${poseta.register}" max=100></progress>${poseta.register}%</td>
       <td><progress value="${poseta.login}" max=100></progress>${poseta.login}%</td>
       <td><progress value="${poseta.about}" max=100></progress>${poseta.about}%</td>
       <td><progress value="${poseta.admin}" max=100></progress>${poseta.admin}%</td>`

        ispis+="</tr>";
        $('#tabelaPosenostiStranica').append(ispis);
    }

        })

