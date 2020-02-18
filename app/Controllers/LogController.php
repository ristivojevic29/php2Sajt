<?php
namespace app\Controllers;
use app\Models\Korisnik;

class LogController extends Controller{
    private $db;
    public function __construct($db)
    {
        $this->db=$db;
    }

    function register()
    {
        $this->view("register");
    }function login(){
        $this->view("login",[
            "title"=>"Login"
        ]);

    }
    function doLogin(){
        if(isset($_POST['sendLog'])){
           // header("Content-type: application/json");
            $code=null;
            $email=$_POST['email'];
            $password=$_POST['password'];
            $reEmail="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/";
            $rePassword="/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!$%@#£€*?&]{8,}$/";
            $greske=[];
            if(!preg_match($reEmail,$email)){
                $greske[]="Wrong format of email";
            }
            if(!preg_match($rePassword,$password)){
                $greske[]="Password must contain minimum eight characters, at least one letter and one number";
            }
            if(count($greske)==0) {
                $user = new Korisnik($this->db);
                try {
                    $getUser = $user->login($email, $password);
                    if ($getUser) {
                        $code = 201;
                        $_SESSION['user'] = $getUser;
                        $id=$_SESSION['user']->idKorisnik;
                        $promeniAktivnost=$user->updateActivity($id);
                    } else {
                        $code=409;
                    }

                } catch (\PDOException $e) {
                    echo $e->getMessage();
                    $code = 404;
                }
            }else{
                $code=422;
            }

        }else{
            $code=404;
        }
        http_response_code($code);
        echo json_encode($getUser);
    }

    function doRegister(){

        if(isset($_POST['send'])){
            $code=null;
             header("Content-Type: application/json");
            $firstName=$_POST['ime'];
            $lastName=$_POST['prezime'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $role=2;
            $aktivan=0;
            $rePassword=$_POST['rePassword'];
            $reFirstName="/^[A-Z][a-z]{2,20}/";
            $reLastName="/^[A-Z][a-z]{2,20}/";
            $reEmail="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/";
            $regPassword="/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!$%@#£€*?&]{8,}$/";
            $greske=[];
            if(!preg_match($reFirstName,$firstName)){
                $greske[]="Wrong format of First Name";
            }
            if(!preg_match($reLastName,$lastName)){
                $greske[]="Wrong format of Last Name";
            }
            if(!preg_match($reEmail,$email)){
                $greske[]="Wrong format of Email";
            }
            if(!preg_match($regPassword,$password)){
                $greske[]="Wrong format of Password";
            }
            if($regPassword!=$password){
                $grekse[]="Passwords does not match";
            }
            if(count($greske)==0) {
                $ubaciKorisnika = new Korisnik($this->db);
                try {
                    $ubaci = $ubaciKorisnika->insertUser($firstName, $lastName, $email, $password, $aktivan, $role);
                    $code=201;
                } catch (\PDOException $e) {
                    echo $e->getMessage();
                    $code=409;
                }
            }else{
                $code=422;
            }

        }
        http_response_code($code);
        echo json_encode($ubaci);

    }

    function doLogout(){
        session_destroy();
        $user=new Korisnik($this->db);
        $id=$_SESSION['user']->idKorisnik;
        $user->logoutActivity($id);
        $this->redirect("index.php");

}
}


