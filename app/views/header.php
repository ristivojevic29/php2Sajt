<body>
<div class="banner-top container-fluid" id="home">
    <!-- header -->
    <header>
        <div class="row">
            <div class="col-md-3 top-info text-left mt-lg-4">
                <h6>Need Help</h6>
                <ul>
                    <li>
                        <i class="fas fa-phone"></i> Call</li>
                    <li class="number-phone mt-3">12345678099</li>
                </ul>
            </div>
            <div class="col-md-6 logo-w3layouts text-center">
                <h1 class="logo-w3layouts">
                    <a class="navbar-brand" href="index.html">
                        Goggles </a>
                </h1>
            </div>

            <div class="col-md-3 top-info-cart text-right mt-lg-4">
                <ul class="cart-inner-info">
                    <li class="button-log">
                        <a class="btn-open" href="index.php?page=login">
                                <?php
                                    if(isset($_SESSION['user'])):?>
                                        <a class="korisnik" href="index.php?page=logout">Logout <?php echo $_SESSION['user']->ime_korisnika ;?></a>
                                    <?php endif;?>

                            <span class="fa fa-user" aria-hidden="true"></span>
                        </a>
                    </li>
                    <li class="galssescart galssescart2 cart cart box_1">
                        <form action="#" method="post" class="last">
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="display" value="1">
                            <button class="top_googles_cart" type="submit" name="submit" value="">
                                My Cart
                                <i class="fas fa-cart-arrow-down"></i>
                            </button>
                        </form>
                    </li>
                </ul>

            </div>
        </div>

            <div class="overlay overlay-door">
                <button type="button" class="overlay-close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
                <form action="#" method="post" class="d-flex">
                    <input class="form-control" type="search" placeholder="Search here..." required="">
                    <button type="submit" class="btn btn-primary submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>

            </div>
            <!-- open/close -->
        </div>
