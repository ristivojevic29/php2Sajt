<?php
namespace app\Models;
class Proizvod{

    private $db;
    const brojPoStrani=6;
    public function __construct(DB $db)
    {
        $this->db=$db;
    }
    function getAllProducts(){
        //$query="SELECT * FROM proizvodi";
        return $this->db->executeQuery("SELECT * FROM proizvodi LIMIT 8");
    }
    function getSingleProduct($id){
        $query="SELECT * FROM proizvodi WHERE idProizvoda=?";
        return $this->db->executeQueryFetch($query,[$id]);
    }
    function getAllProductsWithoutLimit(){
        return $this->db->executeQuery("SELECT * FROM proizvodi");
    }
    function getRandomProducts(){
        return $this->db->executeQuery("SELECT * FROM proizvodi WHERE novo='1' ORDER BY RAND() LIMIT 8 ");
}
    function getCategories(){
        return $this->db->executeQuery("SELECT * FROM kategorije");
    }

    function getAllProductsForPag($limit=0){


        try{

            $limit=((int)$limit)*self::brojPoStrani;
            $offset=self::brojPoStrani;
            $upit="SELECT * FROM proizvodi LIMIT $limit, $offset";
            return $this->db->executeQueryWithParams($upit,[$limit,$offset]);
        }catch(PDOException $e){
            return null;
        }
    }

    function numberOfProducts($id=null){
        if($id){
            $query="SELECT COUNT(*) AS numOfProducts FROM proizvodi WHERE idKategorija=?";
            return $this->db->executeQueryFetch($query,[$id]);
        }else{
            $query="SELECT COUNT(*) AS numOfProducts FROM proizvodi";
            return $this->db->executeQuery($query);
        }
    }
    function numberOfPages(){

        $result=$this->numberOfProducts($id=null);
        $ukupanBrojProizvoda=$result[0]->numOfProducts;
        return ceil($ukupanBrojProizvoda/self::brojPoStrani);
    }
}