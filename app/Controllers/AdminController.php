<?php
namespace app\Controllers;
use app\Models\Admin;
use app\Models\Proizvod;
use app\Models\Korisnik;
class AdminController extends Controller{
    private $db;

    public function __construct($db)
    {
        $this->db=$db;
    }

    public function getUser(){

        if(isset($_GET['sendUser'])){
            $id=$_GET['vrednost'];
            $admin=new Admin($this->db);
            $korisnik=$admin->getOneUser($id);
            if($korisnik){
                http_response_code(200);
            }else{
                http_response_code(422);
            }
            echo json_encode($korisnik);
        }else{
            header("Location:404.php");
        }
    }
    public function updateUser(){
        if(isset($_POST['send'])){
            header("Content-type:application/json");
            $ime=$_POST['ime'];
            $prezime=$_POST['prezime'];
            $email=$_POST['email'];
            $lozinka=$_POST['lozinka'];
            $uloge=$_POST['uloge'];
            $id=$_POST['id'];
            $admin=new Admin($this->db);
            $update=$admin->updateUser($ime,$prezime,$email,$lozinka,$uloge,$id);
            $korisnici=$admin->allUsers();
            echo json_encode($korisnici);
        }
    }
    public function deleteUser(){
        if(isset($_POST['delete'])){
            $id=$_POST['id'];
            $admin=new Admin($this->db);
            $delete=$admin->deleteUser($id);
            $korisnici=$admin->allUsers();
            echo json_encode($korisnici);
        }
    }
    public function getProduct(){
        if(isset($_GET['sendProd'])){
            $id=$_GET['vrednost'];
            $admin=new Admin($this->db);
            $proizvod=$admin->getOneProduct($id);
            if($proizvod){
                http_response_code(200);
            }else{
                http_response_code(422);
            }
            echo json_encode($proizvod);
        }else{
            header("Location:404.php");
        }
    }
    public function updateProduct(){
        if(isset($_POST['updateProd'])){
        header("Content-type:application/json");
        $nazivProizvoda=$_POST['nazivProizvoda'];
        $cenaProizvoda=$_POST['cenaProizvoda'];
        $kategorija=$_POST['kategorija'];
        $id=$_POST['id'];
        $admin=new Admin($this->db);
        $update=$admin->updateProduct($nazivProizvoda,$cenaProizvoda,$kategorija,$id);
        $pr=new Proizvod($this->db);
        $sviProizvodi=$pr->getAllProducts();
        echo json_encode($sviProizvodi);
    }

        }
        public function deleteProduct(){
            if(isset($_POST['obrisi'])){
                $id=$_POST['vrednost'];

                $admin=new Admin($this->db);
                $obrisi=$admin->deleteProduct($id);
                $pr=new Proizvod($this->db);
                $sviProizvodi=$pr->getAllProducts();
                echo json_encode($sviProizvodi);
            }
        }
    public function adminPagination(){
        if(isset($_POST['page'])){
            header("Content-type:application/json");
            $page=$_POST['page'];
            $proizvodi=new Proizvod($this->db);
            $pr=$proizvodi->getAllProductsForPag($page);
            $brojProizvoda=$proizvodi->numberOfPages();
            echo json_encode([
                "proizvodi"=>$pr,
                "numOfProducts"=>$brojProizvoda
            ]);
        }
    }
    public function loggedIn(){
        $korisnik=new Korisnik($this->db);
        $logovani=$korisnik->loggedIn();
        if($logovani){
            http_response_code(200);
        }else{
            http_response_code(422);
        }
        echo json_encode($logovani);
    }
    public function  insertProduct(){
        header("Content-type:application/json");
        define("FILE_SIZE",2000000);
        $allowedTypes=['image/png','image/jpeg'];
        if(isset($_POST['btnDodajNaocare'])){
            $code=NULL;

            $fileName=$_FILES['slikaNaocara']['name'];
            $fileSize=$_FILES['slikaNaocara']['size'];
            $fileType=$_FILES['slikaNaocara']['type'];
            $tmpName=$_FILES['slikaNaocara']['tmp_name'];
            $errors=[];

    if(!in_array($fileType,$allowedTypes)){
        array_push($errors,"Tip fajla nije odgovarajuci");
    }elseif($fileSize>FILE_SIZE){
        array_push($errors,"Preveliki fajl");
    }
    if(count($errors)==0){
        list($sirina,$visina)=getimagesize($tmpName);
        $postojecaSlika=null;

        $postojecaSlika = null;
        switch($fileType){
            case 'image/jpeg':
                $postojecaSlika = imagecreatefromjpeg($tmpName);
                break;
            case 'image/png':
                $postojecaSlika = imagecreatefrompng($tmpName);
                break;
        }
        $novaSirina = 500;
        $novaVisina = 500;
        $novaSlika=imagecreatetruecolor($novaSirina,$novaVisina);
        imagecopyresampled($novaSlika,$postojecaSlika,0,0,0,0,$novaSirina,$novaVisina,$sirina,$visina);

        $fajl=time()."_".$fileName;
        $putanjaNovaSlika="app/assets/images/nova_".$fajl;


        switch($fileType){
            case 'image/jpeg':
                imagejpeg($novaSlika, $putanjaNovaSlika, 75);
                break;
            case 'image/png':
                imagepng($novaSlika, $putanjaNovaSlika);
                break;
        }
        $putanjaOriginalnaSlika = 'app/assets/images/'.$fajl;
        if(move_uploaded_file($tmpName, $putanjaOriginalnaSlika)){
            echo "Slika je upload-ovana na server!";

            try {
                $naziv=$_POST['nazivNaocara'];
                $kategorije=$_POST['kategorija'];
                $cena=$_POST['cenaNaocara'];
                $novo=1;
                $admin=new Admin($this->db);
                $stmt=$admin->insertProduct($naziv,$putanjaNovaSlika,$cena,$novo,$kategorije);

                    $poruka="Uspesan upis.";
                    header("Location:index.php?page=admin");

                $code=201;


            } catch(PDOException $ex){
                echo $ex->getMessage();
                $code=422;
            }
        }

        // brisanje iz memorije
        imagedestroy($postojecaSlika);
        imagedestroy($novaSlika);

    } else {
        var_dump($errors);
        $code=404;
        $this->redirect("index.php?page=notFound");
    }

}



    }
    public function activity(){
        $log=file(LOG_FAJL);
        $vreme=strtotime("-1 day",time());
        $nizStranica=[];
        $login=[];
        $register=[];
        $admin=[];
        $contact=[];
        $about=[];
        $home=[];
        foreach($log as $key=>$value){
            $podaci=explode("\t",$value);
            $podaci[1]=strtotime($podaci[1],time());
            //echo $podaci[1]."\n";
            if($vreme<$podaci[1]){
                //echo $podaci[1];
                array_push($nizStranica,$podaci[0]);
                if($podaci[0]=="/phpSajt/index.php"){
                    array_push($home,$podaci[0]);
                }
            }
            foreach($nizStranica as $key=>$value){
                $stranica=explode("=",$value);
                if(isset($stranica[1])){
                    // echo $stranica[1];
                    switch($stranica[1]){
                        case "home":
                            array_push($home,$stranica[1]);
                            break;
                        case "admin":
                            array_push($admin,$stranica[1]);
                            break;
                        case "login":
                            array_push($login,$stranica[1]);
                            break;
                        case "register":
                            array_push($register,$stranica[1]);
                            break;
                        case "contact":
                            array_push($contact,$stranica[1]);
                            break;
                        case "about":
                            array_push($about,$stranica[1]);
                            break;
                    }
                }
            }
        }
        $brojLogin=count($login);
        $brojHome=count($home);
        $brojRegister=count($register);
        $brojContact=count($contact);
        $brojAbout=count($about);
        $brojAdmin=count($admin);
        $svi=$brojAdmin+$brojHome+$brojLogin+$brojContact+$brojRegister+$brojAbout;
        $procenatLogin=round((($brojLogin/$svi)*100),2);
        $procenatAdmin=round((($brojAdmin/$svi)*100),2);
        $procenatRegister=round((($brojRegister/$svi)*100),2);
        $procenatContact=round((($brojContact/$svi)*100),2);
        $procenatHome=round((($brojHome/$svi)*100),2);
        $procenatAbout=round((($brojAbout/$svi)*100),2);

        echo json_encode([
            "login"=>$procenatLogin,
            "register"=>$procenatRegister,
            "admin"=>$procenatAdmin,
            "home"=>$procenatHome,
            "contact"=>$procenatContact,
            "about"=>$procenatAbout
        ]);
    }

}
