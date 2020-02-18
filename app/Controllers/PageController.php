<?php
    namespace app\Controllers;
    use app\Models\Proizvod;
    use app\Models\Admin;
    class PageController extends Controller{
        private $db;
        public function __construct($db)
        {
            $this->db=$db;
        }
        public function home(){
            $proizvodiM=new Proizvod($this->db);
            $sviProizvodi=$proizvodiM->getAllProducts();
            $randomProizvodi=$proizvodiM->getRandomProducts();
            $this->view("home",[
                "title"=>"Home",
                "proizvodi"=>$sviProizvodi,
                "randomProizvodi"=>$randomProizvodi

            ]);
        }
        public function proizvodi(){
            header("Content-Type:application/json");
            $proizvodi=new Proizvod($this->db);
            $sviProizvodi=$proizvodi->getAllProducts();
            echo json_encode($sviProizvodi);
        }
        public function randomProizvodi(){
            header("Content-Type:application/json");
            $proizvodi=new Proizvod($this->db);
            $sviProizvodi=$proizvodi->getRandomProducts();
            echo json_encode($sviProizvodi);
        }
        public function shop(){
            $proizvodiM=new Proizvod($this->db);
            $sviProizvodi=$proizvodiM->getAllProducts();
            $randomProizvodi=$proizvodiM->getRandomProducts();
            $kategorije=$proizvodiM->getCategories();
            $this->view("shop",[
                "title"=>"Shop",
                "proizvodi"=>$sviProizvodi,
                "randomProizvodi"=>$randomProizvodi,
                "kategorije"=>$kategorije
            ]);
        }
        public function admin()
        {
            if (isset($_SESSION['user'])) {
                if ($_SESSION['user']->uloge_id != 1) {
                    header('Location: index.php');

                } else if ($_SESSION['user'] == null) {
                    header('Location: index.php');
                    echo "ne";
                } else {
                    $admin = new Admin($this->db);
                    $pr = new Proizvod($this->db);
                    $korisnici = $admin->allUsers();
                    $uloge = $admin->getRole();
                    $proizvodi = $pr->getAllProductsWithoutLimit();
                    $kategorije = $admin->getCategories();

                    $this->view("admin", [
                        "title" => "Admin",
                        "korisnici" => $korisnici,
                        "uloge" => $uloge,
                        "proizvodi" => $proizvodi,
                        "kategorijeNaocara" => $kategorije,

                    ]);
                }
            }else{
                header('Location: index.php');
            }
        }
        public function about(){
            $this->view("about",[
                "title"=>"About",


            ]);
        }
        public function contact(){
            $this->view("contact",[
                "title"=>"Contact",


            ]);
        }
        public function notFound(){
            $this->view("404",[
                "title"=>"Not Found 404"
            ]);
        }
        public function register(){
            $this->view("register",[
                "title"=>"Register"
            ]);
        }
        public function singleProduct(){
            $this->view("singleProduct",[
               "title"=>"Single Product"
            ]);
        }
    }





