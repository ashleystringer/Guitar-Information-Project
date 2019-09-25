<?php
class LoginSignin extends IndexView{
    public function display(){
        parent::displayHeader();
        ?>
<div><?php echo $_SESSION["username"] . "<br>" . $_SESSION["user_email"]?></div>
<?php
        parent::displayFooter();
    }
}