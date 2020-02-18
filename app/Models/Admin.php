<?php
namespace app\Models;
class Admin{
    private $db;
    public function __construct(DB $db)
    {
        $this->db=$db;
    }

    public function allUsers(){
        $query="SELECT * FROM korisnik";
        return $this->db->executeQuery($query);
    }
    public function getOneUser($id){
        $query="SELECT * FROM korisnik k INNER JOIN uloge u ON k.uloge_id=u.idUloge WHERE idKorisnik=?";
        return $this->db->executeQueryFetch($query,[$id]);
    }
    public function updateUser($ime,$prezime,$email,$lozinka=NULL,$role,$id){
        if($lozinka==NULL) {
            $query = "UPDATE korisnik SET ime_korisnika=?, prezime_korisnika=?,email=?, uloge_id=? WHERE idKorisnik=?;";
            return $this->db->executeNonGet($query,[$ime,$prezime,$email,$role,$id]);
        }else{
            $mdLozinka=md5($lozinka);
            $query = "UPDATE korisnik SET ime_korisnika=?, prezime_korisnika=?,email=?,lozinka=?,uloge_id=? WHERE idKorisnik=?;";
            return $this->db->executeNonGet($query,[$ime,$prezime,$email,$mdLozinka,$role,$id]);
        }
    }
    public function deleteUser($id){
        $query="DELETE FROM korisnik WHERE idKorisnik=?";
        return $this->db->executeNonGet($query,[$id]);
    }
    public function getRole(){
        $query="SELECT * FROM uloge";
        return $this->db->executeQuery($query);
    }
        public function getAllProducts(){
        $query="SELECT * FROM proizvodi";
        return $this->db->executeQuery($query);
        }
        public function getOneProduct($id){
         $query="SELECT * FROM proizvodi p INNER JOIN kategorije k ON p.idKategorije=k.idKategorije WHERE idProizvoda=?";
        return $this->db->executeQueryFetch($query,[$id]);
}
        public function getCategories(){
            $query="SELECT * FROM kategorije";
            return $this->db->executeQuery($query);
        }
        public function updateProduct($naziv,$cena,$kategorija,$id)
        {
            $query = "UPDATE proizvodi SET ime_proizvoda=?, cena_proizvoda=?,idKategorije=? WHERE idProizvoda=?;";
            return $this->db->executeNonGet($query, [$naziv, $cena, $kategorija, $id]);
        }
        public function deleteProduct($id){
            $query="DELETE FROM proizvodi WHERE idProizvoda=?";
            return $this->db->executeNonGet($query,[$id]);

    }
    public function insertProduct($naziv,$slika,$cena,$novo,$kategorija){
        $query="INSERT INTO proizvodi(ime_proizvoda,cena_proizvoda,slika_proizvoda,novo,idKategorije)
                        values(?,?,?,?,?)";
        $this->db->executeNonGet($query,[$naziv,$cena,$slika,$kategorija,$novo]);
    }


}