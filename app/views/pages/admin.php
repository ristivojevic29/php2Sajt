<div class="container">
    <div class="row">
        <h2>Users</h2>
        <table id="tabela">
            <tr>
                <th>ID</td>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
                <th>More</th>
            </tr>
            <tbody id="kor">
                <?php
                foreach ($korisnici as $item) :
                ?>
                <tr><td><?= $item->idKorisnik;?></td>
                    <td><?= $item->ime_korisnika;?></td>
                    <td><?= $item->prezime_korisnika;?></td>
                    <td><?= $item->email;?></td>
                    <td><?= $item->lozinka;?></td>
                    <td><?= $item->uloge_id;?></td>
                    <td><a href="#" class="btnObrisi" data-id="<?= $item->idKorisnik?>">Delete</a>
                        <a href="#" class="btnUpdate" data-id="<?= $item->idKorisnik ?>">Update</a></td></tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div class="cleaner"></div>

    <div class="formaZaIzmenu">
        <h2>Update</h2>
        <form action="#" method="POST">
            <div class="podaci">
                <input type="text" placeholder="First name" name="tbFirstName" id="tbFirstName" class="form-control">
            </div>
            <div class="podaci">
                <input type="text" placeholder="Last name" name="tbLastName" id="tbLastName" class="form-control">
            </div>
            <div class="podaci">
                <input type="text" placeholder="Email" name="tbEmail" id="tbEmail" class="form-control">
            </div>
            <div class="podaci">
                <input type="text" placeholder="Password" name="tbPassword" id="tbPassword" class="form-control">
            </div>
            <div class="podaci">
                <select id="ddlUloga" name="ddlUloga" class="form-control">
                    <option value="0">Choose role</option>
                    <?php

                    foreach($uloge as $item):

                    ?>
                    <option value="<?= $item->idUloge?>"><?= $item->naziv_uloge;?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="podaci">
                <input type="hidden"  name="hiddenKorisnikID" id="hiddenKorisnikID" class="form-control"/>
            </div>
            <input type="submit" name="btnIzmena" id="btnIzmena" value="Update" class="form-control"/>
        </form>
    </div>
</div>
<div class="products">
    <h2 id="pr">Products</h2>

    <div class="productsTable">
        <table class="pTable">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Price</th>
                <th>Img</th>
                <th>More</th>
            </tr>
            <tbody id="prodT">
                <?php
                    foreach($proizvodi as $item):
                ?>
                <tr>
                    <td><?= $item->idProizvoda?></td>
                    <td><?= $item->ime_proizvoda?></td>
                    <td>$<?= $item->cena_proizvoda?></td>
                    <td><img class="img-responsive" src="<?= $item->slika_proizvoda?>" alt="<?= $item->ime_proizvoda?>"/> </td>
                    <td><a href="#" class="btnObrisiProizvod" data-id="<?= $item->idProizvoda?>">Delete</a>
                        <a href="#" class="btnUpdateProizvod" data-id="<?= $item->idProizvoda?>">Update</a>
                    </td>
                </tr>
                <?php
                    endforeach;
                ?>
            </tbody>
        </table>
        <div id="prodPaginacija">


        </div>
    </div>
</div>
<div class="formaZaIzmenuProizvoda">
    <h2>Update Movie</h2>
    <form action="#" method="POST">
        <div class="podaciF">
            <input type="text" placeholder="Title" name="tbTitle" id="tbTitle" class="form-product">
        </div>
        <div class="podaciF">
            <input type="text" placeholder="etc 34.60" name="tbPrice" id="tbPrice" class="form-product">
        </div>
        <div class="podaciF">
            <select id="ddlKategorijaNaocara" name="ddlKategorijaNaocara" class="form-movie">
                <option value="0">Choose category</option>
                <?php
                    foreach($kategorijeNaocara as $item):
                ?>
                        <option value="<?= $item->idKategorije?>"><?= $item->naziv_kategorije;?></option>
                    <?php endforeach;?>
            </select>
        </div>
        <div class="podaciF">
            <input type="hidden"  name="hiddenProdId" id="hiddenProdId" class="form-product"/>
        </div>
        <input type="submit" name="btnIzmenaNaocara" id="btnIzmenaNaocara" value="Update" class="form-product"/>
    </form>
</div>
<div id="greske"></div>
<div id="dugme">
    <button id="dodaj"><a href="#">Add Product</a></button>
</div>
<div class="unosProizvoda">
    <h2>Add Product</h2>
    <form role="form" method="POST" enctype="multipart/form-data" action="index.php?page=insertProduct">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="nazivNaocara" id="nazivNaocara" placeholder="Enter title.."/>
        </div>
        <div class="form-group">
            <label>Image(500x500)</label>
            <input type="file" id="slikaNaocara" name="slikaNaocara" />
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text" name="cenaNaocara" id="cenaNaocara" placeholder="Enter price..." />
        </div>

        <div class="form-group">
            <label>Category</label>
            <select name="kategorija" id="ddlKategorija" class="form-group">

                    <option value="0">Choose..</option>
                <?php
                foreach($kategorijeNaocara as $item):
                    ?>
                    <option value="<?= $item->idKategorije?>"><?= $item->naziv_kategorije;?></option>
                <?php endforeach;?>

            </select>
        </div>
        <button type="submit" name="btnDodajNaocare" id="btnDodajNaocare" class="btnDodaj">Add</button>
    </form>
</div>
<div id="greskeNaocare">

</div>
</div>
<div id="onlajnKorisnici">
    <div id="brojUlogovanih">


    </div>
    <table id="tabelaOnlajnKorisnika">
        <tr>
            <th>ID</td>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
        </tr>

    </table>
</div>
<div class="cleaner">
    <div id="posenost">
        <h2>Activity in last 24 hours:</h2>
        <table id="tabelaPosenostiStranica">
            <tr>
                <th>Home</th>
                <th>Contact</th>
                <th>Register</th>
                <th>Login</th>
                <th>About</th>
                <th>Admin Panel</th>
            </tr>
            </td>
        </table>
    </div>

    <script src="app/assets/js/admin.js"></script>