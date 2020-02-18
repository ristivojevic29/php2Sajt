<?php
     session_start();
     ob_start();
     require_once "app/config/autoload.php";
     require_once "app/config/database.php";
     use app\Controllers\PageController;
     use app\Controllers\LogController;
     use app\Controllers\MenuController;
     use app\Controllers\FilterController;
     use app\Controllers\AdminController;
     use app\Controllers\ContactController;

     use app\Models\DB;
     $db=new DB(SERVER,DBNAME,USERNAME,PASSWORD);
     $db->zabeleziPristupStranici();
     $pageController=new PageController($db);
     $logController=new LogController($db);
     $meniController=new MenuController($db);
     $filterController=new FilterController($db);
     $adminController=new AdminController($db);
     $contactController=new ContactController($db);

     if(isset($_GET['page'])){
         switch ($_GET['page']){
             case 'home':
                 $pageController->home();
                 break;

             case 'proizvodi':
                 $pageController->proizvodi();
                 break;
             case 'randomProizvodi':
                 $pageController->randomProizvodi();
                 break;
             case 'register':
                 $pageController->register();
                 break;
             case 'register':
                 $logController->register();
                 break;
             case 'do-register':
                 $logController->doRegister();
                 break;
             case 'login':
                 $logController->login();
                 break;
             case 'do-login':
                 $logController->doLogin();
                 break;
             case 'logout':
                 $logController->doLogout();
                 break;
             case 'shop':
                 $pageController->shop();
                 break;
             case 'filter':
                 $filterController->filter();
                 break;
             case 'filterRange':
                 $filterController->filterRange();
                 break;
             case 'filterSearch':
                 $filterController->filterSearch();
                 break;
             case 'sort':
                 $filterController->sort();
                 break;
             case 'admin':
                 $pageController->admin();
                 break;
             case 'getUser':
                 $adminController->getUser();
                 break;
             case 'updateUser':
                 $adminController->updateUser();
                 break;
             case 'deleteUser':
                 $adminController->deleteUser();
                 break;
             case 'getProduct':
                 $adminController->getProduct();
                 break;
             case 'updateProduct':
                 $adminController->updateProduct();
                 break;
             case 'adminPagination':
                 $adminController->adminPagination();
                 break;
             case 'deleteProduct':
                 $adminController->deleteProduct();
                 break;
             case 'insertProduct';
             $adminController->insertProduct();
             break;
             case 'loggedIn':
                 $adminController->loggedIn();
                 break;
             case 'activity':
                 $adminController->activity();
                 break;
             case 'about':
                 $pageController->about();
                 break;
             case 'contact':
                 $pageController->contact();
                 break;
             case 'submitContact':
                 $contactController->submitContact();
                 break;
             case 'notFound':
                 $pageController->notFound();
                 break;

         }
     }else{
         $pageController->home();
     }