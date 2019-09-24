<?php
class Login{
    private $username, $password, $email, $role, $date;
    /*public function __construct($userName, $userPass, $userEmail){
        $this->username = $userName;
        $this->password = $userPass;
        $this->email = $userEmail; 
    }*/
    /*public function __construct($usrName, $usrPass, $usrEmail, $usrRole, $usrDate){
        $this->username = $usrName;
        $this->password = $usrPass;
        $this->email = $usrEmail;
        $this->role = $usrRole;
        $this->date = $usrDate;
    }*/
    public function setUser($usrName, $usrPass, $usrEmail, $usrRole, $usrDate){
        $this->username = $usrName;
        $this->password = $usrPass;
        $this->email = $usrEmail;
        $this->role = $usrRole;
        $this->date = $usrDate;    
    }
    public function setCreatedUser($usrName, $usrPass, $usrEmail){
        $this->username = $usrName;
        $this->password = $usrPass;
        $this->email = $usrEmail;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getRole(){
        return $this->role;
    }
    public function getDate(){
        return $this->date;
    }
}