$(document).ready(function(){
    $('.chbKategorije').change(function(){
            var nizIzabranih = [];
            var vrednostPolja = $("input:checkbox[class=chbKategorije]:checked").each(function(){
                nizIzabranih.push($(this).val());
            });
                if(nizIzabranih==0){
                    nizIzabranih.push(1,2,3,4,5);
                }

                $.ajax({
                    url: "index.php?page=filter",
                    method: "POST",
                    dataType: "json",
                    data: {
                        send: "sendFilter",
                        nizIzabranih: nizIzabranih
                    },
                    success: function (data) {

                        ispisiFiltriraneProizvode(data);
                        //console.log(data);

                    },
                    error: function (xhr,status,error) {
                        console.log(xhr.status);
                    }
                })

    })
    $('#myRange').change(function(){
        var vrednost=$(this).val();
        //console.log(vrednost);
        $('#minValue').html(vrednost);
        $.ajax({
            url: "index.php?page=filterRange",
            method: "POST",
            dataType: "json",
            data: {
                sendRange:"sendRange",
                vrednost:vrednost

            },
            success: function (data) {

                ispisiFiltriraneProizvode(data);
                console.log(data);

            },
            error: function (xhr,status,error) {
                console.log(xhr.status);
            }
        })
    })
    $('#tbSearch').keyup(function(){
        let uneto=$(this).val();
        $.ajax({
            url: "index.php?page=filterSearch",
            method: "POST",
            dataType: "json",
            data: {
                sendSearch:"sendSearch",
                uneto:uneto

            },
            success: function (data) {

                ispisiFiltriraneProizvode(data);
                console.log(data);

            },
            error: function (xhr,status,error) {
                console.log(xhr.status);
            }
        })
    })
    $('.mojaKlasa2').click(function(e){
        e.preventDefault();
        var vrednost=$(this).data('id');
        $.ajax({
            url: "index.php?page=sort",
            method: "POST",
            dataType: "json",
            data: {
                sendSort:"sendSort",
                vrednost:vrednost

            },
            success: function (data) {

                ispisiFiltriraneProizvode(data);


            },
            error: function (xhr,status,error) {
                console.log(xhr.status);
            }
        })
    })
    function ispisiFiltriraneProizvode(data){
        let ispis="";
        for(let d of data){
            ispis+=` <div class="col-md-3 product-men women_two shop-gd">
                                <div class="product-googles-info googles">
                                    <div class="men-pro-item">
                                        <div class="men-thumb-item">
                                            <img src="${d.slika_proizvoda}" class="img-fluid" alt="${d.ime_proizvoda}">
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <a href="single.html" class="link-product-add-cart">Quick View</a>
                                                </div>
                                            </div>
                                            ${novo(d.novo)}
                                               
                                        </div>
                                        <div class="item-info-product">
                                            <div class="info-product-price">
                                                <div class="grid_meta">
                                                    <div class="product_price">
                                                        <h4>
                                                            <a href="single.html">${d.ime_proizvoda}</a>
                                                        </h4>
                                                        <div class="grid-price mt-2">
                                                            <span class="money ">${d.cena_proizvoda}</span>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                                <div class="googles single-item hvr-outline-out">
                                                    <form action="" method="post">
                                                        <input type="hidden" name="cmd" value="_cart">
                                                        <input type="hidden" name="add" value="1">
                                                        <input type="hidden" name="googles_item" value="Farenheit">
                                                        <input type="hidden" name="amount" value="575.00">
                                                        <button type="submit" class="googles-cart pgoogles-cart">
                                                            <i class="fas fa-cart-plus"></i>
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>`;
        }

        $('.row .pro').html(ispis);
    }
    $(document).on('click','.googles-cart.pgoogles-cart',function(e){
        e.preventDefault();
        alertify.alert("Cart temporary disabled",function(){

        });

    })
    function novo(novo){
        //console.log(novo);
        let ispis="";
        if(novo==1){
            ispis+="<span class='product-new-top'>New</span>";
        }
        return ispis;
    }
})