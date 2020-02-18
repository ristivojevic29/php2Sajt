<?php
    namespace app\Controllers;
    use app\Models\Meni;
    class MenuController extends Controller{
        public function __construct($db)
        {
            $this->db=$db;
        }
        public function menu(){
            $meni=new Meni($this->db);
           $ispisMeni=$meni->getMenu();
           if($ispisMeni){
               http_response_code(201);
               return $ispisMeni;
           }else{
               http_response_code(422);
           }

    }
    }
