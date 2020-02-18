<label class="top-log mx-auto"></label>
<nav class="navbar navbar-expand-lg navbar-light bg-light top-header mb-2">

    <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">

					</span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav nav-mega mx-auto">
            <?php
               global $meniController;
            $ispisMeni=$meniController->menu();



                //var_dump($ispisMeni);
                foreach($ispisMeni as $i):
            ?>
            <li class="nav-item active">
                <a class="nav-link ml-lg-0" href="index.php?page=<?= $i->meni?>">
                <span class="sr-only">(current)</span>
                     <?= $i->imeMenija ?>
                </a>
            </li>
            <?php endforeach;?>
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="about.html">About</a>-->
<!--            </li>-->
<!---->
<!--            <li class="nav-item dropdown">-->
<!--                <a  href="#"  class="nav-link  id="navbarDropdown1" role="button">-->
<!--                    Shop-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="contact.html">Contact</a>-->
<!--            </li>-->
        </ul>

    </div>
</nav>
</header>
