<?php
namespace app\Controllers;
use app\Models\FilterProizvod;

class FilterController extends Controller{
    private $db;

    public function __construct($db)
    {
        $this->db=$db;
    }
    public function filter(){
        if(isset($_POST['send'])){
            header("Content-type: application/json");
            $nizIzabranih=$_POST['nizIzabranih'];
            $proizvodi=new FilterProizvod($this->db);

            $filtriraniProizvodi=$proizvodi->filterByCategory($nizIzabranih);
            if($filtriraniProizvodi){
                http_response_code(201);
            }else{
                http_response_code(422);
            }
            echo json_encode($filtriraniProizvodi);
        }else{
            $this->redirect("404");
        }

    }
    public function filterRange(){
        if(isset($_POST['sendRange'])){
            header("Content-type: application/json");
            $vrednost=$_POST['vrednost'];

            $proizvodi=new FilterProizvod($this->db);

            $filtriraniProizvodi=$proizvodi->filterByRange($vrednost);
            if($filtriraniProizvodi){
                http_response_code(201);
            }else{
                http_response_code(422);
            }
            echo json_encode($filtriraniProizvodi);
        }
    }
    public function filterSearch(){
        if(isset($_POST['sendSearch'])){
            header("Content-type: application/json");
            $uneto=$_POST['uneto'];

            $proizvodi=new FilterProizvod($this->db);
            $filtriraniProizvodi=$proizvodi->filterBySearch($uneto);
            if($filtriraniProizvodi){
                http_response_code(201);
            }else{
                http_response_code(422);
            }
            echo json_encode($filtriraniProizvodi);
        }
    }
    public function sort(){
        header("Content-type:application/json");
        $vrednost=$_POST['vrednost'];

        $proizvodi=new FilterProizvod($this->db);
        $sortiraniProizvodi=$proizvodi->sortByPrice($vrednost);
        if($sortiraniProizvodi){
            http_response_code(201);
        }else{
            http_response_code(422);
        }
        echo json_encode($sortiraniProizvodi);
    }
}