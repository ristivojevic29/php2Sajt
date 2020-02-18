<?php

namespace app\Models;

class Korisnik{
    private $db;
    public function __construct(DB $db)
    {
        $this->db=$db;
    }
    public function insertUser($firstName,$lastName,$email,$password,$aktivan,$role){
        $params=[
            "ime_korisnika"=>$firstName,
            "prezime_korisnika"=>$lastName,
            "email"=>$email,
            "lozinka"=>md5($password),
            "aktivan"=>$aktivan,
            "uloge_id"=>$role

        ];
        $query="INSERT INTO korisnik(ime_korisnika,prezime_korisnika,email,lozinka,aktivan,created_on,uloge_id)
                        values(?,?,?,?,?,CURRENT_TIMESTAMP,?)";
         $this->db->executeNonGet($query,[$firstName,$lastName,$email,md5($password),$aktivan,$role]);
    }
    public function login($email,$password){
        $mdPassword=md5($password);
        $query="SELECT * FROM korisnik WHERE email=? AND lozinka=?";
        return $this->db->executeQueryFetch($query,[$email,$mdPassword]);
    }
    public function updateActivity($id){
        $query="UPDATE korisnik SET aktivan=1 WHERE idKorisnik=?";
        return $this->db->executeNonGet($query,[$id]);
    }
    public function logoutActivity($id){
        $query="UPDATE korisnik SET aktivan=0 WHERE idKorisnik=?";
        return $this->db->executeNonGet($query,[$id]);
    }
    public function loggedIn(){
        $query="SELECT * FROM korisnik WHERE aktivan=1";
        return $this->db->executeQuery($query);
    }
}