<div class="banner">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="carousel-caption text-center">
                    <h3>Men’s eyewear
                        <span>Cool summer sale 50% off</span>
                    </h3>
                    <a href="index.php?page=shop" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
                </div>
            </div>
            <div class="carousel-item item2">
                <div class="carousel-caption text-center">
                    <h3>Women’s eyewear
                        <span>Want to Look Your Best?</span>
                    </h3>
                    <a href="shop.html" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>

                </div>
            </div>
            <div class="carousel-item item3">
                <div class="carousel-caption text-center">
                    <h3>Men’s eyewear
                        <span>Cool summer sale 50% off</span>
                    </h3>
                    <a href="shop.html" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>

                </div>
            </div>
            <div class="carousel-item item4">
                <div class="carousel-caption text-center">
                    <h3>Women’s eyewear
                        <span>Want to Look Your Best?</span>
                    </h3>
                    <a href="shop.html" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--//banner -->
</div>
</div>

<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
    <div class="container-fluid">
        <div class="inner-sec-shop px-lg-4 px-3">
            <h3 class="tittle-w3layouts my-lg-4 my-4">New Arrivals for you </h3>
            <div class="row">
                <?php
                foreach($randomProizvodi as $p):
                ?>
                <div class="col-md-3 product-men women_two">
                    <div class="product-googles-info googles">
                        <div class="men-pro-item">
                            <div class="men-thumb-item">
                                <img src="<?= $p->slika_proizvoda ;?>"  class="img-fluid" alt="<?= $p->ime_proizvoda ;?>">

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

                                            </h4>
                                            <div class="grid-price mt-2">
                                                <span class="money ">$<?= $p->cena_proizvoda ;?></span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="googles single-item hvr-outline-out">
                                        <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart">
                                            <input type="hidden" name="add" value="1">
                                            <input type="hidden" name="googles_item" value="Farenheit">
                                            <input type="hidden" name="amount" value="575.00">


                                            <button type="submit"  class="googles-cart pgoogles-cart">
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
            </div>

            <!--//row-->
            <!--/meddle-->
            <div class="row">
                <div class="col-md-12 middle-slider my-4">
                    <div class="middle-text-info ">

                        <h3 class="tittle-w3layouts two text-center my-lg-4 mt-3">Summer Flash sale</h3>
                        <div class="simply-countdown-custom" id="simply-countdown-custom"></div>

                    </div>
                </div>
            </div>
            <!--//meddle-->
            <!--/slide-->
            <div class="bottom-sub-grid-content py-lg-5 py-3">
                <div class="row">
                    <div class="col-lg-4 bottom-sub-grid text-center">
                        <div class="bt-icon">

                            <span class="far fa-hand-paper"></span>
                        </div>

                        <h4 class="sub-tittle-w3layouts my-lg-4 my-3">Satisfaction Guaranteed</h4>

                        <p>
                            <a href="index.php?page=shop" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
                        </p>
                    </div>
                    <!-- /.col-lg-4 -->
                    <div class="col-lg-4 bottom-sub-grid text-center">
                        <div class="bt-icon">
                            <span class="fas fa-rocket"></span>
                        </div>

                        <h4 class="sub-tittle-w3layouts my-lg-4 my-3">Fast Shipping</h4>

                        <p>
                            <a href="index.php?page=shop" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
                        </p>
                    </div>
                    <!-- /.col-lg-4 -->
                    <div class="col-lg-4 bottom-sub-grid text-center">
                        <div class="bt-icon">
                            <span class="far fa-sun"></span>
                        </div>

                        <h4 class="sub-tittle-w3layouts my-lg-4 my-3">UV Protection</h4>

                        <p>
                            <a href="index.php?page=shop" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
                        </p>
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
            </div>
            <!-- //grids -->
            <!-- /clients-sec -->
            <div class="testimonials p-lg-5 p-3 mt-4">
                <div class="row last-section">
                    <div class="col-lg-3 footer-top-w3layouts-grid-sec">
                        <div class="mail-grid-icon text-center">
                            <i class="fas fa-gift"></i>
                        </div>
                        <div class="mail-grid-text-info">
                            <h3>Genuine Product</h3>

                        </div>
                    </div>
                    <div class="col-lg-3 footer-top-w3layouts-grid-sec">
                        <div class="mail-grid-icon text-center">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="mail-grid-text-info">
                            <h3>Secure Products</h3>

                        </div>
                    </div>
                    <div class="col-lg-3 footer-top-w3layouts-grid-sec">
                        <div class="mail-grid-icon text-center">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="mail-grid-text-info">
                            <h3>Cash on Delivery</h3>

                        </div>
                    </div>
                    <div class="col-lg-3 footer-top-w3layouts-grid-sec">
                        <div class="mail-grid-icon text-center">
                            <i class="fas fa-truck"></i>
                        </div>
                        <div class="mail-grid-text-info">
                            <h3>Easy Delivery</h3>

                        </div>
                    </div>
                </div>
            </div>
            <!-- //clients-sec -->
        </div>
    </div>
    <div class="row galsses-grids pt-lg-5 pt-3">
        <div class="col-lg-6 galsses-grid-left">
            <figure class="effect-lexi">
                <img src="app/assets/images/banner4.jpg" alt="" class="img-fluid">
                <figcaption>
                    <h3>Editor's
                        <span>Pick</span>
                    </h3>
                    <p> Express your style now.</p>
                </figcaption>
            </figure>
        </div>
        <div class="col-lg-6 galsses-grid-left">
            <figure class="effect-lexi">
                <img src="app/assets/images/banner1.jpg" alt="" class="img-fluid">
                <figcaption>
                    <h3>Editor's
                        <span>Pick</span>
                    </h3>
                    <p>Express your style now.</p>
                </figcaption>
            </figure>
        </div>
    </div>
</section>

            <script src="app/assets/js/main.js"></script>