<div class="banner_inner">
    <div class="services-breadcrumb">
        <div class="inner_breadcrumb">

            <ul class="short">
                <li>
                    <a href="index.html">Home</a>
                    <i>|</i>
                </li>
                <li>Shop</li>
            </ul>
        </div>
    </div>

</div>
<!--//banner -->
<!--/shop-->
<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
    <div class="container-fluid">
        <div class="inner-sec-shop px-lg-4 px-3">
            <h3 class="tittle-w3layouts my-lg-4 mt-3">New Arrivals for you </h3>
            <div class="row">
                <!-- product left -->
                <div class="side-bar col-lg-3">
                    <div class="search-hotel">
                        <h3 class="agileits-sear-head">Search Here..</h3>
                        <form action="#" method="post">
                            <input class="form-control" type="search" id="tbSearch" name="search" placeholder="Search here..." required="">
                            <button class="btn1">
                                <i class="fas fa-search"></i>
                            </button>
                            <div class="clearfix"> </div>
                        </form>
                    </div>
                    <!-- price range -->
                    <div class="range">
                        <h3 class="agileits-sear-head">Price range</h3>
                        <ul class="dropdown-menu6">

                            <li>

                                <div id="slider-range">

                                    <input type="range" class="slider" id="myRange" value="100" min="0" max="1000"  />
                                    <label>Value:<span id="minValue">100</span>-1000</label>
                                </div>

                            </li>
                        </ul>
                    </div>
                    <!-- //price range -->
                    <!--preference -->
                    <div class="left-side">
                        <h3 class="agileits-sear-head">Sort</h3>
                        <ul>
                            <li>

                                <a href="#" data-id="1" class="mojaKlasa2">Price(ASC)</a>
                            </li>
                            <li>
                                <a href="#" data-id="2" class="mojaKlasa2">Price(DESC)</a>
                            </li>

                        </ul>
                    </div>
                    <!-- // preference -->
                    <!-- discounts -->
                    <div class="left-side">
                        <h3 class="agileits-sear-head">Category</h3>
                        <ul>
                            <?php
                                foreach($kategorije as $k):
                            ?>
                            <li>
                                <input type="checkbox" class="chbKategorije" name="chbKategorije[]" value="<?= $k->idKategorije;?>" class="checked">
                                <span class="span"><?= $k->naziv_kategorije ;?></span>
                            </li>
                            <?php endforeach;?>

                        </ul>
                    </div>
                    <!-- //discounts -->
                    <!-- reviews -->
<!--                    <div class="customer-rev left-side">-->
<!--                        -->
<!--                    </div>-->
                    <!-- //reviews -->
                    <!-- deals -->
                    <div class="deal-leftmk left-side">
                        <h3 class="agileits-sear-head">Special Deals</h3>
                        <?php

                            foreach($randomProizvodi as $r):?>
                        <div class="special-sec1">
                            <div class="col-xs-4 img-deals">
                                <img src="<?= $r->slika_proizvoda;?>" alt="<?= $r->ime_proizvoda;?>">
                            </div>
                            <div class="col-xs-8 img-deal1">
                                <h3><?= $r->ime_proizvoda;?></h3>
                                <a href="single.html">$<?= $r->cena_proizvoda;?></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
<!--                        <div class="special-sec1">-->
<!--                            <div class="col-xs-4 img-deals">-->
<!--                                <img src="app/assets/images/m2.jpg" alt="">-->
<!--                            </div>-->
<!--                            <div class="col-xs-8 img-deal1">-->
<!--                                <h3>Azmani Round</h3>-->
<!--                                <a href="single.html">$725.00</a>-->
<!--                            </div>-->
<!--                            <div class="clearfix"></div>-->
<!--                        </div>-->
<!--                        <div class="special-sec1">-->
<!--                            <div class="col-xs-4 img-deals">-->
<!--                                <img src="app/assets/images/m4.jpg" alt="">-->
<!--                            </div>-->
<!--                            <div class="col-xs-8 img-deal1">-->
<!--                                <h3>Farenheit Oval</h3>-->
<!--                                <a href="single.html">$325.00</a>-->
<!--                            </div>-->
<!--                            <div class="clearfix"></div>-->
<!--                        </div>-->
                            <?php endforeach;?>
                    </div>

                    <!-- //deals -->
                </div>
                <!-- //product left -->
                <!--/product right-->
                <div class="left-ads-display col-lg-9">
                    <div class="wrapper_top_shop">
                        <div class="row" id="pro">
                            <div class="col-md-6 shop_left">
                                <img src="app/assets/images/banner3.jpg" alt="">
                                <h6>40% off</h6>
                            </div>
                            <div class="col-md-6 shop_right">
                                <img src="app/assets/images/banner4.jpg" alt="">
                                <h6>50% off</h6>
                            </div>

                        </div>
                        <div class="row pro">
                            <?php
                                foreach($proizvodi as $p):
                            ?>
                            <!-- /womens -->
                            <div class="col-md-3 product-men women_two shop-gd">
                                <div class="product-googles-info googles">
                                    <div class="men-pro-item">
                                        <div class="men-thumb-item">
                                            <img src="<?= $p->slika_proizvoda?>" class="img-fluid" alt="<?= $p->ime_proizvoda?>">
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <script>
                                                        lightbox.option({
                                                            'resizeDuration': 200,
                                                            'wrapAround': true,
                                                            'alwaysShowNavOnTouchDevices':true
                                                        })
                                                    </script>
                                                    <a href="<?=$p->slika_proizvoda?>" data-lightbox="<?= $p->ime_proizvoda ;?>" class="link-product-add-cart">Quick View</a>

                                                </div>
                                            </div>
                                            <?php
                                            if($p->novo==1):
                                                ?>
                                                <span class='product-new-top'>New</span>
                                            <?php endif;?>
                                        </div>
                                        <div class="item-info-product">
                                            <div class="info-product-price">
                                                <div class="grid_meta">
                                                    <div class="product_price">
                                                        <h4>
                                                            <a href="#"><?= $p->ime_proizvoda;?></a>
                                                        </h4>
                                                        <div class="grid-price mt-2">
                                                            <span class="money ">$<?= $p->cena_proizvoda;?></span>
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

                            </div>
                                <?php endforeach;?>
                <!--//product right-->
            </div>
            <!--/slide-->
<!--            <div class="slider-img mid-sec mt-lg-5 mt-2">-->
<!--                //banner-sec-->
<!--                <h3 class="tittle-w3layouts text-left my-lg-4 my-3">Featured Products</h3>-->
<!--                <div class="mid-slider">-->
<!--                    <div class="owl-carousel owl-theme row">-->
<!--                        <div class="item">-->
<!--                            <div class="gd-box-info text-center">-->
<!--                                <div class="product-men women_two bot-gd">-->
<!--                                    <div class="product-googles-info slide-img googles">-->
<!--                                        <div class="men-pro-item">-->
<!--                                            <div class="men-thumb-item">-->
<!--                                                <img src="app/assets/images/s5.jpg" class="img-fluid" alt="">-->
<!--                                                <div class="men-cart-pro">-->
<!--                                                    <div class="inner-men-cart-pro">-->
<!--                                                        <a href="single.html" class="link-product-add-cart">Quick View</a>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                                <span class="product-new-top">New</span>-->
<!--                                            </div>-->
<!--                                            <div class="item-info-product">-->
<!---->
<!--                                                <div class="info-product-price">-->
<!--                                                    <div class="grid_meta">-->
<!--                                                        <div class="product_price">-->
<!--                                                            <h4>-->
<!--                                                                <a href="single.html">Fastrack Aviator </a>-->
<!--                                                            </h4>-->
<!--                                                            <div class="grid-price mt-2">-->
<!--                                                                <span class="money ">$325.00</span>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                        <ul class="stars">-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star-o" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                        </ul>-->
<!--                                                    </div>-->
<!--                                                    <div class="googles single-item hvr-outline-out">-->
<!--                                                        <form action="#" method="post">-->
<!--                                                            <input type="hidden" name="cmd" value="_cart">-->
<!--                                                            <input type="hidden" name="add" value="1">-->
<!--                                                            <input type="hidden" name="googles_item" value="Fastrack Aviator">-->
<!--                                                            <input type="hidden" name="amount" value="325.00">-->
<!--                                                            <button type="submit" class="googles-cart pgoogles-cart">-->
<!--                                                                <i class="fas fa-cart-plus"></i>-->
<!--                                                            </button>-->
<!---->
<!--                                                        </form>-->
<!---->
<!--                                                    </div>-->
<!--                                                </div>-->
<!---->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="item">-->
<!--                            <div class="gd-box-info text-center">-->
<!--                                <div class="product-men women_two bot-gd">-->
<!--                                    <div class="product-googles-info slide-img googles">-->
<!--                                        <div class="men-pro-item">-->
<!--                                            <div class="men-thumb-item">-->
<!--                                                <img src="app/assets/images/s6.jpg" class="img-fluid" alt="">-->
<!--                                                <div class="men-cart-pro">-->
<!--                                                    <div class="inner-men-cart-pro">-->
<!--                                                        <a href="single.html" class="link-product-add-cart">Quick View</a>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                                <span class="product-new-top">New</span>-->
<!--                                            </div>-->
<!--                                            <div class="item-info-product">-->
<!---->
<!--                                                <div class="info-product-price">-->
<!--                                                    <div class="grid_meta">-->
<!--                                                        <div class="product_price">-->
<!--                                                            <h4>-->
<!--                                                                <a href="single.html">MARTIN Aviator </a>-->
<!--                                                            </h4>-->
<!--                                                            <div class="grid-price mt-2">-->
<!--                                                                <span class="money ">$425.00</span>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                        <ul class="stars">-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star-o" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                        </ul>-->
<!--                                                    </div>-->
<!--                                                    <div class="googles single-item hvr-outline-out">-->
<!--                                                        <form action="#" method="post">-->
<!--                                                            <input type="hidden" name="cmd" value="_cart">-->
<!--                                                            <input type="hidden" name="add" value="1">-->
<!--                                                            <input type="hidden" name="googles_item" value="MARTIN Aviator">-->
<!--                                                            <input type="hidden" name="amount" value="425.00">-->
<!--                                                            <button type="submit" class="googles-cart pgoogles-cart">-->
<!--                                                                <i class="fas fa-cart-plus"></i>-->
<!--                                                            </button>-->
<!--                                                        </form>-->
<!---->
<!--                                                    </div>-->
<!--                                                </div>-->
<!---->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="item">-->
<!--                            <div class="gd-box-info text-center">-->
<!--                                <div class="product-men women_two bot-gd">-->
<!--                                    <div class="product-googles-info slide-img googles">-->
<!--                                        <div class="men-pro-item">-->
<!--                                            <div class="men-thumb-item">-->
<!--                                                <img src="app/assets/images/s7.jpg" class="img-fluid" alt="">-->
<!--                                                <div class="men-cart-pro">-->
<!--                                                    <div class="inner-men-cart-pro">-->
<!--                                                        <a href="single.html" class="link-product-add-cart">Quick View</a>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                                <span class="product-new-top">New</span>-->
<!--                                            </div>-->
<!--                                            <div class="item-info-product">-->
<!---->
<!--                                                <div class="info-product-price">-->
<!--                                                    <div class="grid_meta">-->
<!--                                                        <div class="product_price">-->
<!--                                                            <h4>-->
<!--                                                                <a href="single.html">Royal Son Aviator </a>-->
<!--                                                            </h4>-->
<!--                                                            <div class="grid-price mt-2">-->
<!--                                                                <span class="money ">$425.00</span>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                        <ul class="stars">-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star-o" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                        </ul>-->
<!--                                                    </div>-->
<!--                                                    <div class="googles single-item hvr-outline-out">-->
<!--                                                        <form action="#" method="post">-->
<!--                                                            <input type="hidden" name="cmd" value="_cart">-->
<!--                                                            <input type="hidden" name="add" value="1">-->
<!--                                                            <input type="hidden" name="googles_item" value="Royal Son Aviator">-->
<!--                                                            <input type="hidden" name="amount" value="425.00">-->
<!--                                                            <button type="submit" class="googles-cart pgoogles-cart">-->
<!--                                                                <i class="fas fa-cart-plus"></i>-->
<!--                                                            </button>-->
<!--                                                        </form>-->
<!---->
<!--                                                    </div>-->
<!--                                                </div>-->
<!---->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="item">-->
<!--                            <div class="gd-box-info text-center">-->
<!--                                <div class="product-men women_two bot-gd">-->
<!--                                    <div class="product-googles-info slide-img googles">-->
<!--                                        <div class="men-pro-item">-->
<!--                                            <div class="men-thumb-item">-->
<!--                                                <img src="app/assets/images/s8.jpg" class="img-fluid" alt="">-->
<!--                                                <div class="men-cart-pro">-->
<!--                                                    <div class="inner-men-cart-pro">-->
<!--                                                        <a href="single.html" class="link-product-add-cart">Quick View</a>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                                <span class="product-new-top">New</span>-->
<!--                                            </div>-->
<!--                                            <div class="item-info-product">-->
<!---->
<!--                                                <div class="info-product-price">-->
<!--                                                    <div class="grid_meta">-->
<!--                                                        <div class="product_price">-->
<!--                                                            <h4>-->
<!--                                                                <a href="single.html">Irayz Butterfly </a>-->
<!--                                                            </h4>-->
<!--                                                            <div class="grid-price mt-2">-->
<!--                                                                <span class="money ">$281.00</span>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                        <ul class="stars">-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star-o" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                        </ul>-->
<!--                                                    </div>-->
<!--                                                    <div class="googles single-item hvr-outline-out">-->
<!--                                                        <form action="#" method="post">-->
<!--                                                            <input type="hidden" name="cmd" value="_cart">-->
<!--                                                            <input type="hidden" name="add" value="1">-->
<!--                                                            <input type="hidden" name="googles_item" value="Irayz Butterfly">-->
<!--                                                            <input type="hidden" name="amount" value="281.00">-->
<!--                                                            <button type="submit" class="googles-cart pgoogles-cart">-->
<!--                                                                <i class="fas fa-cart-plus"></i>-->
<!--                                                            </button>-->
<!--                                                        </form>-->
<!---->
<!--                                                    </div>-->
<!--                                                </div>-->
<!---->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="item">-->
<!--                            <div class="gd-box-info text-center">-->
<!--                                <div class="product-men women_two bot-gd">-->
<!--                                    <div class="product-googles-info slide-img googles">-->
<!--                                        <div class="men-pro-item">-->
<!--                                            <div class="men-thumb-item">-->
<!--                                                <img src="app/assets/images/s9.jpg" class="img-fluid" alt="">-->
<!--                                                <div class="men-cart-pro">-->
<!--                                                    <div class="inner-men-cart-pro">-->
<!--                                                        <a href="single.html" class="link-product-add-cart">Quick View</a>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                                <span class="product-new-top">New</span>-->
<!--                                            </div>-->
<!--                                            <div class="item-info-product">-->
<!---->
<!--                                                <div class="info-product-price">-->
<!--                                                    <div class="grid_meta">-->
<!--                                                        <div class="product_price">-->
<!--                                                            <h4>-->
<!--                                                                <a href="single.html">Jerry Rectangular </a>-->
<!--                                                            </h4>-->
<!--                                                            <div class="grid-price mt-2">-->
<!--                                                                <span class="money ">$525.00</span>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                        <ul class="stars">-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star-o" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                        </ul>-->
<!--                                                    </div>-->
<!--                                                    <div class="googles single-item hvr-outline-out">-->
<!--                                                        <form action="#" method="post">-->
<!--                                                            <input type="hidden" name="cmd" value="_cart">-->
<!--                                                            <input type="hidden" name="add" value="1">-->
<!--                                                            <input type="hidden" name="googles_item" value="Jerry Rectangular ">-->
<!--                                                            <input type="hidden" name="amount" value="525.00">-->
<!--                                                            <button type="submit" class="googles-cart pgoogles-cart">-->
<!--                                                                <i class="fas fa-cart-plus"></i>-->
<!--                                                            </button>-->
<!--                                                        </form>-->
<!---->
<!--                                                    </div>-->
<!--                                                </div>-->
<!---->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="item">-->
<!--                            <div class="gd-box-info text-center">-->
<!--                                <div class="product-men women_two bot-gd">-->
<!--                                    <div class="product-googles-info slide-img googles">-->
<!--                                        <div class="men-pro-item">-->
<!--                                            <div class="men-thumb-item">-->
<!--                                                <img src="app/assets/images/s10.jpg" class="img-fluid" alt="">-->
<!--                                                <div class="men-cart-pro">-->
<!--                                                    <div class="inner-men-cart-pro">-->
<!--                                                        <a href="single.html" class="link-product-add-cart">Quick View</a>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                                <span class="product-new-top">New</span>-->
<!--                                            </div>-->
<!--                                            <div class="item-info-product">-->
<!---->
<!--                                                <div class="info-product-price">-->
<!--                                                    <div class="grid_meta">-->
<!--                                                        <div class="product_price">-->
<!--                                                            <h4>-->
<!--                                                                <a href="single.html">Herdy Wayfarer </a>-->
<!--                                                            </h4>-->
<!--                                                            <div class="grid-price mt-2">-->
<!--                                                                <span class="money ">$325.00</span>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                        <ul class="stars">-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="fa fa-star-o" aria-hidden="true"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                        </ul>-->
<!--                                                    </div>-->
<!--                                                    <div class="googles single-item hvr-outline-out">-->
<!--                                                        <form action="#" method="post">-->
<!--                                                            <input type="hidden" name="cmd" value="_cart">-->
<!--                                                            <input type="hidden" name="add" value="1">-->
<!--                                                            <input type="hidden" name="googles_item" value="Herdy Wayfarer">-->
<!--                                                            <input type="hidden" name="amount" value="325.00">-->
<!--                                                            <button type="submit" class="googles-cart pgoogles-cart">-->
<!--                                                                <i class="fas fa-cart-plus"></i>-->
<!--                                                            </button>-->
<!--                                                        </form>-->
<!---->
<!--                                                    </div>-->
<!--                                                </div>-->
<!---->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            //slider-->
       </div>
  </div>
</section>
<script src="app/assets/js/filterShop.js"></script>