<?php

    namespace app\Models;
    class Meni{
        private $db;
        public function __construct(DB $db)
        {
            $this->db=$db;
        }

        public function getMenu(){
            if(isset($_SESSION['user']) && $_SESSION['user']->uloge_id=="1"){
                $query = "SELECT * FROM meni";

            }else {
                $query = "SELECT * FROM meni WHERE idMeni!='5'";
            }
            return $this->db->executeQuery($query);
    }
    }