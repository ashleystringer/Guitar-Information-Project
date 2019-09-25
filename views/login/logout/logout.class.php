<?php
class Logout extends IndexView{
    public function display(){
        echo "display() in Logout";
        parent::displayHeader("Log out");
        ?>
<html>
    <head></head>
    <body>
        <h2>You are now logged out of your account</h2>
        <!--<div><a href="<?= BASE_URL?>/login/signUser">Login</a></div>
        <div><a href="<?= BASE_URL?>/welcome/index">Return</a></div>-->
    </body>
</html>
<?php
parent::displayFooter();
    }
}
