<?php
    namespace app\Controllers;

   class Controller{
       protected function view($filename,$data=[]){
        extract($data);
           include "app/views/head.php";
           include "app/views/header.php";
           include  "app/views/nav.php";
           include "app/views/pages/$filename.php";
           include  "app/views/footer.php";
      }
      protected function redirect($page){
           header("Location: ".$page);
      }
    }