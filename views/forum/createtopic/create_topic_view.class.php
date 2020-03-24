<?php
class CreateTopicView extends IndexView{
    public function display(){
        parent::displayHeader();
        self::displayForm();
        parent::displayFooter();
    }
    public function displayForm(){
        ?>
        <style>
            tr{
                margin: 10px;
            }
            
        </style>
        <div>
            <form method="post" action="<?= BASE_URL?>/forum/addtopics">
                
                <div><input type="text" value="Topic Title" id="subject" required></div>
                <table>
                    <thead>
                    <th><input type="text" value="" id=""></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                            <textarea id="" required></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><!-- for categories --></td>
                        </tr>
                        <tr>
                            <input type="hidden" value="<?= $_SESSION['username']?>" id="user">
                            <input type="hidden" name="date" value="<?php time(); ?>">
                            <td><input type="submit" value="Submit"></td>
                        </tr>
                    </tbody>
                </table>
                
            </form>
        </div>
        <?php
    }
}