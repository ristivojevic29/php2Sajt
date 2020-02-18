<?php
    namespace app\Models;
class DB{
    private $server;
    private $dbname;
    private $username;
    private $password;
    public $conn;
    public function __construct($server,$dbname,$username,$password)
    {
        $this->server=$server;
        $this->dbname=$dbname;
        $this->username=$username;
        $this->password=$password;
        $this->connect();
    }

    private function connect(){
        $this->conn=new \PDO("mysql:host={$this->server};dbname={$this->dbname};charset=utf8",$this->username,$this->password);
        $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE,\PDO::FETCH_OBJ);
        $this->conn->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
    }
    public function executeQuery($query){
        return $this->conn->query($query)->fetchAll();
    }

    public function executeQueryWithParams($query,$params){
       $prepare=$this->conn->prepare($query);
       $prepare->execute($params);
       return $prepare->fetchAll();
    }
    public function executeQueryFetch($query,$params){
        $prepare=$this->conn->prepare($query);
        $prepare->execute($params);
        return $prepare->fetch();
    }

    public function executeNonGet($query,$params){
        $prepared = $this->conn->prepare($query);
        $prepared->execute($params);
    }
    function zabeleziPristupStranici(){

        $open = fopen(LOG_FAJL, "a");

        if($open){
            $date=date('d-m-Y H:i:s');
            fwrite($open, "{$_SERVER['REQUEST_URI']}\t{$date}\t{$_SERVER['REMOTE_ADDR']}\n");
            fclose($open);
        }
    }
}
