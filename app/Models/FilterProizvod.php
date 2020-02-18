<?php
namespace app\Models;
class FilterProizvod{
    private $db;
    public function __construct(DB $db)
    {
        $this->db=$db;
    }
    function filterByCategory(Array $kategorije){
        $niz=implode(",",$kategorije);

            $query = "SELECT p.* FROM kategorije k INNER JOIN proizvodi p  ON k.idKategorije=p.idKategorije WHERE p.idKategorije IN ($niz)";
            return $this->db->executeQuery($query);



    }
    function filterByRange($vrednost){
        $query = "SELECT p.* FROM kategorije k INNER JOIN proizvodi p  ON k.idKategorije=p.idKategorije WHERE p.cena_proizvoda BETWEEN $vrednost AND 1000";
        return $this->db->executeQuery($query);
    }
    function filterBySearch($uneto){
        $query="SELECT * FROM proizvodi WHERE ime_proizvoda LIKE '%$uneto%'";
        return $this->db->executeQuery($query);
    }
    function sortByPrice($vrednost){
        $query="SELECT * FROM proizvodi";
        switch($vrednost){
            case 1:
                $query.=" ORDER BY cena_proizvoda ASC";
                break;
            case 2:
                $query.=" ORDER BY cena_proizvoda DESC";
                break;
        }
        return $this->db->executeQuery($query);
    }

}