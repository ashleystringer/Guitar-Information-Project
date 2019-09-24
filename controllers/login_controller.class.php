<?php
class LoginController{
    private $login_model;
    private $index_view;
    public function __construct(){
        //$this->login_model = new LoginModel();
       // $this->index_view = new LoginIndex;
    }
    public function index(){
       // if(!isset($_SESSION["user_email"])){
            $view = new LoginIndex(); //use cookies
            $view->display();
        //}
       // $this->index_view->display();
    }
    public function signup(){
        //echo "testing";
        $view = new LoginSignup();
        $errors = array();
        if(FILTER_HAS_VAR(INPUT_POST, "user_name")){
            $user_name = filter_input(INPUT_POST, "user_name", FILTER_SANITIZE_STRING);
            //echo "user_name = " . $user_name;
        } 
          if(FILTER_HAS_VAR(INPUT_POST, "user_pass")){
            
            if($_POST['user_pass'] == $_POST['user_pass_check']){
                $user_pass = filter_input(INPUT_POST, "user_pass", FILTER_SANITIZE_STRING);
                //not yet hashed
            }else{
                $errors[] = "The two passwords do not match.";
            }
            $hashed_pw = password_hash($user_pass, PASSWORD_DEFAULT);
 
        }
         if(FILTER_HAS_VAR(INPUT_POST, "user_email")){
            //see if email is already used
            $user_email = filter_input(INPUT_POST, "user_email", FILTER_SANITIZE_EMAIL);
        } 
        $user_role = 2;
        $user_date = date("Y-m-d H:i:s"); 
        //echo "user date " . $user_date;
        $user = new Login();
        $user->setUser($user_name, $hashed_pw, $user_email, $user_role, $user_date);
        $login_model = new LoginModel();
        $login_model->addUser($user);
        
        
       // $this->login_model($user);
        $view->display();
    }
    public function signin(){
            $view = new LoginSignin();
            if(FILTER_HAS_VAR(INPUT_POST, "user_name")){
                $username = filter_input(INPUT_POST, "user_name", FILTER_SANITIZE_STRING);
            }
            if(FILTER_HAS_VAR(INPUT_POST, "user_email")){
                $user_email = filter_input(INPUT_POST, "user_email", FILTER_SANITIZE_EMAIL);
            }
            if(FILTER_HAS_VAR(INPUT_POST, "user_pass")){
                $password = filter_input(INPUT_POST, "user_pass", FILTER_SANITIZE_STRING);
            }
            
            $user = new Login();
            $user->setCreatedUser($username, $password, $user_email);
            $login_model = new LoginModel();
            echo "testing below login_model";
            $login_model->authenticateUser($user);
            
            $view->display();
            
        }
    
    public function welcome($msg){
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
        $view = new LoginWelcome();
        $view->display();
    }
    public function logout(){
        Session::destroy();
        $view = new Logout();
        $view->display();

    }
    public function error(){
        
        }
    }
