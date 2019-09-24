<?php
class LoginModel{
    private $db, $dbConnection, $tblUsers;
    static private $_instance = null;
    public function __construct(){
     $this->db = Database::getDatabase(); //trouble with Database class
     $this->dbConnection = $this->db->getConnection();
     $this->tblUsers = $this->db->getUsers();
     echo "Constructor in Login Model";
     
     foreach($_POST as $key => $value){
         $_POST[$key] = $this->dbConnection->real_escape_string($value);
     }
     foreach($_GET as $key => $value){
         $_GET[$key] = $this->dbConnection->real_escape_string($value);
     }
     
    }  
    public static function getLoginModel(){
        if(self::$_instance == NULL){
            self::$_instance = new LoginModel();
        }
        return self::$_instance;
    }
    public function checkUser($user){
              //  echo "error";
        $username = $user->getUsername();
        $email = $user->getEmail();
        
        $sql = "SELECT * FROM " . $this->tblUsers . " WHERE user_name='$username'";
        $sql .= " OR user_email='$email'";
        $query = $this->dbConnection->query($sql);
        if($query->num_rows > 0){
            return true;
        }else{
            return false;
        }
    }
    public function addUser($user){
        $username = $user->getUsername();
        $password = $user->getPassword();
        $email = $user->getEmail();
        $date = $user->getDate();
        $role = $user->getRole();
        $checkUser = $this->checkUser($user);
        
      //  echo "error";
        /*$sql1 = "INSERT INTO " . $this->tblUsers . " (`user_name`, `user_email`, `user_pass`, `user_date`, `user_role`) ";
        $sql1 .= "VALUES('$username', '$email', '$password', '$date', '$role')";*/
    
        if($checkUser){
           $error = new LoginError();
           $error->display("");
           return;
        }
        
        try{
 //           echo ":O";
            $sql1 = "INSERT INTO " . $this->tblUsers . " (`user_name`, `user_email`, `user_pass`, `user_date`, `user_role`) ";
            $sql1 .= "VALUES('$username', '$email', '$password', '$date', '$role')";
            $query = $this->dbConnection->query($sql1);
            if(!$query){
                $errmsg = $this->dbConnection->error;
                throw new DatabaseException($errmsg);
            }
            return $query;
        }
        catch(DatabaseException $e){
            $error = new LoginError();
            echo "error";
            $error->display($e->getMessage());
            return false;
        }
        echo ">.>";
    }
    public function authenticateUser($user){
      //  echo "Testing authenticateUser()";
        $username = $user->getUsername();
        $password = $user->getPassword();
        $email = $user->getEmail();  
        //echo "username = ", $username, " password = ", $password;
        /*$sql = "SELECT * FROM " . $this->tblUsers . " WHERE " . $this->tblUser . ".user_name='$username'" .
                " AND " . $this->tblUserss . ".user_pass='$password'";*/
        /*$sql = "SELECT * FROM " . $this->tblUsers . " WHERE " . $this->tblUsers . ".user_name='$username'" .
                " AND " . $this->tblUsers . ".user_email='$email'";*/
        $sql = "SELECT * FROM " . $this->tblUsers . " WHERE user_name='$username'";
        $query = $this->dbConnection->query($sql); 
        
         echo ".. .. ... ";
        
        Session::create();
        $_SESSION['login_status'];
        $_SESSION['username'];
        $_SESSION['password'];
        $_SESSION['user_id'];
        $_SESSION['user_email'];
        if($query && $query->num_rows > 0){
           // echo "num_rows > 0";
            while(($row = $query->fetch_assoc()) !== NULL){
                $isPassword = password_verify($password, $row["user_pass"]);
              //  echo "isPassword " . $isPassword;
                $_SESSION['login_status'] = 1;
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['user_email'] = $row['user_email'];
               // echo "Session [username] = " . $_SESSION['username'];
                
            }
        }else{
            echo "num_rows <= 0";
        }
    }
}