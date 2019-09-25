<?php
//lol
class HomeIndex extends IndexView{
    public function display(){
            parent::displayHeader();
        ?>
        <div>Welcome</div>
        <?php
            parent::displayFooter();
    }
}
