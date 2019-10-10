<?php
 
class Database{
    
    private $param = array(
        "host" => "localhost",
        "login" => "root",
        "password" => "root",
        "database" => "boardpost_db",
        "tblUsers" => "users",
        "tblCat" => "categories",
        "tblPosts" => "posts",
        "tblTopics" => "topics"
    );
    private $objDBConnection = null;
    static private $_instance = null;
    private function __construct(){
        try{
            //echo "<br> try block";
            $this->objDBConnection = @new mysqli(
            $this->param["host"], $this->param["login"], $this->param["password"], $this->param["database"]);
            //echo "<br>...";
            if(mysqli_connect_errno() != 0){
                echo "<br> Connect error number is not 0";
                $message = "Error in connecting to database, error number " . mysqli_connect_errno();
                throw new DatabaseException($message);
                
                exit();
            }
         }
        catch(DatabaseException $e){
            if(mysql_connect_errno != 0){
                echo "error";
                throw new DatabaseException($message);
                exit();
            }
        }
    }
    static public function getDatabase(){
        if(self::$_instance == null){
            self::$_instance = new Database();
        }
        
        return self::$_instance;
    }
    public function getConnection(){
     return $this->objDBConnection; 
    }
    public function getUsers(){
     return $this->param["tblUsers"];   
    }
    public function getCategories(){
        return $this->param["tblCat"];
    }
    public function getPosts(){
        return $this->param["tblPosts"];
    }
    public function getTopics(){
        return $this->param["tblTopics"];
    }
}
